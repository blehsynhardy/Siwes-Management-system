<div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($con,"select * from school_year where active_status='1'")or die(mysqli_error($con));
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>My Supervisor</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
									<?php $query = mysqli_query($con,"select * from supervisor_department_student
														LEFT JOIN supervisor ON supervisor.supervisor_id = supervisor_department_student.supervisor_id 
														LEFT JOIN department ON department.department_id = supervisor_department_student.department_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysqli_error($con));
														$count = mysqli_num_rows($query);
									?>
												<span class="badge badge-info">My Supervisor</span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
													<?php
														if ($count != '0'){
														while($row = mysqli_fetch_array($query)){
														$id = $row['supervisor_id'];	
													?>
											<li>
												<a href="my_classmates.php<?php echo '?id='.$id; ?>">
														<img src ="../admin/<?php echo $row['location'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['class_name']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"></p>
												<p class="subject"><?php echo $row['firstname']." ".$row['lastname']?></p>
													
											
											</li>
								
			
									<?php }}else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> You are currently not assign to any lecturer or you are done with your course of study.</div>
									<?php } ?>	
									</ul>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->