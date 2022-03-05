
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
                                <div class="muted pull-left">Add Department</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="controller.php">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="department_name" class="input focused" id="focusedInput" type="text" placeholder = "Department Name" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                            <input name="hod" class="input focused" id="focusedInput" type="text" placeholder = "HOD Name" required>
                                          </div>
                                        </div>
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="save_department" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

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
                                <div class="muted pull-left">Department List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="controller.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-toggle="modal" href="#department_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
													<?php include('modal_delete.php'); ?>
									<thead>
										  <tr>
													<th></th>
													<th>Department Name</th>
													<th>HOD</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$department_query = mysqli_query($con,"select * from department")or die(mysqli_error($con));
										while($department_row = mysqli_fetch_array($department_query)){
										$id = $department_row['department_id'];
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $department_row['department_name']; ?></td>
											<td><?php echo $department_row['hod']; ?></td>
											<td width="40"><a href="index.php?q=Edit_Department&<?php echo 'id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                     
                               
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