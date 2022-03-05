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
                                <div class="muted pull-left">Add School Year</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="controller.php">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="school_year" id="focusedInput" type="text" placeholder = "School Year" required>
                                          </div>
                                        </div>
										
										
											<div class="control-group">
                                          <div class="controls">
												<button name="save_school" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

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
                                <div class="muted pull-left">School Year List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_sy.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>School Year</th>
												<th>Status</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($con,"select * from school_year")or die(mysqli_error($con));
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['school_year_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['school_year']; ?></td>
												<td><?php if($row['active_status']==1){ ?> Currently Activated  <?php } else { ?> Inactive <?php } ?></td>
	
												
											
												<td width="40"><?php if ($row['active_status']==1) {?>
												<a href="de_activate.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-danger">Deactivate</a><?php } else { ?>
												<a href="activate.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success">Activate</a> <?php } ?>
												</td>
		
									
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