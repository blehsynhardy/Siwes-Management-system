
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span3" id="adduser">
				   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Student</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="controller.php">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="username" class="input focused" id="focusedInput" type="text" placeholder = "Matric No" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                            <input name="firstname" class="input focused" id="focusedInput" type="text" placeholder = "firstname" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                            <input name="lastname" class="input focused" id="focusedInput" type="text" placeholder = "lastname" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="department_id" class="" required>
                                             	<option></option>
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
                                            <select  name="school_year" class="" required>
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
												<button name="save_student" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
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
									<form action="controller.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
										<div class="pull-right">
			    <ul class="nav nav-pills">
				<li class="active">
					<a href="students.php">All</a>
				</li>
				<li class="">
					<a href="unreg_students.php">Unregistered</a>
				</li>
				<li class="">
				<a href="reg_students.php">Registered</a>
				</li>
				</ul>
	</div>
													<?php include('modal_delete.php'); ?>
									<thead>
										  <tr>
													<th></th>
													<th>Matric No</th>
													<th>Student Name</th>
													<th>Department</th>
													<th>Session</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$student_query = mysqli_query($con,"select * from student LEFT JOIN department ON student.department_id = department.department_id ORDER BY student.student_id DESC")or die(mysqli_error($con));
										while($student_row = mysqli_fetch_array($student_query)){
										$id = $student_row['student_id'];
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $student_row['username']; ?></td>
											<td><?php echo $student_row['firstname']; ?> <?php echo $student_row['lastname']; ?></td>
											<td><?php echo $student_row['department_name']; ?></td>
											<td><?php echo $student_row['school_year']; ?></td>
											<td width="40"><a href="index.php?q=Edit_Student&<?php echo 'id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                     
                               
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