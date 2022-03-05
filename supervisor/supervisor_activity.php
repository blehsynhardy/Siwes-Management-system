<?php $get_id = $_GET['id']; ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($con,"select * from supervisor_department_student
				LEFT JOIN department ON department.department_id = supervisor_department_student.department_id LEFT JOIN student ON student.student_id = supervisor_department_student.student_id where supervisor_department_student.student_id='$get_id'")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										$department_id = $class_row['department_id'];
										$student_id = $class_row['student_id'];
										$school_year = $class_row['school_year'];
										?>
				
					     <ul class="breadcrumb">
							<li><a href="index.php"><b>My Students</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b><?php echo $class_row['firstname']." ".$class_row['lastname']?></b></a></li>
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
										$query = mysqli_query($con,"select * FROM files where department_id = '$department_id' and student_id='$get_id' order by fdatein ASC ")or die(mysqli_error($con));
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
                        
						

	</div>
</div>