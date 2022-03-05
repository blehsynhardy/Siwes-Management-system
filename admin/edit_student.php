
<?php $get_id = $_GET['id']; ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span3" id="adduser">
				   <div class="row-fluid">
       <a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Student</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Student</div>
                            </div>
                            <div class="block-content collapse in">
							<?php
							$query = mysqli_query($con,"select * from student LEFT JOIN department ON department.department_id = student.department_id where student_id = '$get_id'")or die(mysqli_error($con));
							$row = mysqli_fetch_array($query);
							?>
                                <div class="span12">
								<form method="post">
								
								        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="cys" class="" required>
                                             	<option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
											<?php
											$cys_query = mysqli_query($con,"select * from department order by department_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['department_id']; ?>"><?php echo $cys_row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
								
										<div class="control-group">
                                          <div class="controls">
                                            <input name="un" value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "ID Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input name="fn"  value="<?php echo $row['firstname']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Firstname" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="ln"  value="<?php echo $row['lastname']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Lastname" required>
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <div class="controls">
                                            <select  name="sy" class="" required>
											<?php
											$cys_query = mysqli_query($con,"select * from school_year where active_status=1");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['school_year']; ?>"><?php echo $cys_row['school_year']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
								
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
		
	      <?php
                            if (isset($_POST['update'])) {
                               
                                $un = $_POST['un'];
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $cys = $_POST['cys'];
                                $sy = $_POST['sy'];
                      

								mysqli_query($con,"update student set username = '$un' , firstname ='$fn' , lastname = '$ln' , department_id = '$cys', school_year = '$sy' where student_id = '$get_id' ")or die(mysqli_error($con));

								?>
 
								<script>
								window.location = "index.php?q=Student"; 
								</script>

                       <?php     }  ?>
			   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Student List</div>
                            </div>
                            <div class="block-content collapse in">
									<div class="span12">
									<form action="delete_student.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												    <th></th>
												
													<th>Name</th>
													<th>ID Number</th>
											
													<th>Course Yr & Section</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
											
                                         <?php
                                    $query = mysqli_query($con,"select * from student LEFT JOIN department ON department.department_id = student.department_id ORDER BY student.student_id DESC") or die(mysqli_error($con));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['student_id'];
                                        ?>

										<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
         
                                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
										<td><?php echo $row['username']; ?></td> 
								 
										<td width="100"><?php echo $row['department_name']; ?></td> 

										<td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
									 
										</tr>
                                   <?php } ?>    
                              
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>