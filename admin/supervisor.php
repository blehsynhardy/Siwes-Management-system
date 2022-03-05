
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
                                <div class="muted pull-left">Add Supervisor</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="controller.php">
										<div class="control-group">
                                          <div class="controls">
                                            <select  name="title" class="" required>
                                             	<option></option>
											<option value="Mr.">Mr</option>
											<option value="Mrs.">Mrs</option>
											<option value="Dr.">Dr</option>
                                            </select>
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
												<button name="save_supervisor" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

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
                                <div class="muted pull-left">Supervisor List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="controller.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-toggle="modal" href="#department_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
													<?php include('modal_delete.php'); ?>
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
									<thead>
										  <tr>
													<th></th>
													<th>Title</th>
													<th>Supervisor Name</th>
													<th>Department Name</th>
													<th>Picture</th>
													<th></th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$supervisor_query = mysqli_query($con,"select * from supervisor LEFT JOIN department ON supervisor.department_id = department.department_id ORDER BY supervisor.supervisor_id DESC")or die(mysqli_error($con));
										while($supervisor_row = mysqli_fetch_array($supervisor_query)){
										$id = $supervisor_row['supervisor_id'];
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $supervisor_row['title']; ?></td>
											<td><?php echo $supervisor_row['firstname']; ?> <?php echo $supervisor_row['lastname']; ?></td>
											<td><?php echo $supervisor_row['department_name']; ?></td>
											<td width="40"><a href="edit_class.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                     
                               
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