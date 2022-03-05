
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($con,"select * from supervisor_department_student
				LEFT JOIN department ON department.department_id = supervisor_department_student.department_id LEFT JOIN supervisor ON supervisor.supervisor_id = supervisor_department_student.supervisor_id")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										$department_id = $class_row['department_id'];
										$supervisor_id = $class_row['supervisor_id'];
										$school_year = $class_row['school_year'];
										?>
				
					     <ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['department_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Upload Log/Activities</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 	$query = mysqli_query($con,"select * FROM files where department_id = '$department_id' order by fdatein DESC ")or die(mysqli_error($con));
									$count = mysqli_num_rows($query);
							?>
                                <div id="" class="muted pull-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<div class="pull-right">
							Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
								<?php
									$query = mysqli_query($con,"select * FROM files where department_id = '$department_id' order by fdatein DESC ")or die(mysqli_error($con));
									$count = mysqli_num_rows($query);	
								if ($count == '0'){ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> No downloadable material currently uploaded.</div>
								<?php
								}else{
								?>
								
									<form action="copy_file_student.php" method="post">
								
									<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-info" name=""><i class="icon-copy"></i> </a>
									
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
						
										<thead>
										        <tr>
												<th></th>
												<th>Date Upload</th>
												<th>Week</th>
												<th>Description</th>
												<th></th>
												
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($con,"select * FROM files where department_id = '$department_id' order by fdatein DESC ")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['file_id'];
									?>                              
										<tr>
										<td width="30">
											<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                             
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['name']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>
                                         <td width="30">
										 <a  data-placement="bottom" title="Download" id="<?php echo $id; ?>Download" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>
										 </td>            
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Download').tooltip('show');
															$('#<?php echo $id; ?>Download').tooltip('hide');
														});
														</script>										 
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
									</form>
						 <?php } ?>		
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- /block -->
                        <div class="span3" id="">
	<div class="row-fluid">
				      <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Log / Activity</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="" action="controller.php" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">
				
									
								<input name="file"  class="input-file uniform_on" id="fileInput" type="file" required>
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="student_id" value="<?php echo $session_id ?>"/>
                               <input type="hidden" name="department_id" value="<?php echo $department_id; ?>">
                                <input type="hidden" name="supervisor_id" value="<?php echo $supervisor_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                      
                            <div class="controls">
                            	<select name="name" class="input" required >
                            		<option>--Select Week--</option>
                            		<option value="Week One">Week One</option>
                            		<option value="Week Two">Week Two</option>
                            		<option value="Week Three">Week Three</option>
                            </div>
                        </div>
                        <div class="control-group">
                          
                            <div class="controls">
                                <input type="text" name="desc" Placeholder="Description"  class="input" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="upload_activity" type="submit" value="Upload" class="btn btn-info" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>			
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>