<div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($con,"select * from school_year where active_status='1'")or die(mysqli_error($con));
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>My Student</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
									<?php $query = mysqli_query($con,"select * from supervisor_department_student
														LEFT JOIN student ON student.student_id = supervisor_department_student.student_id 
														LEFT JOIN department ON department.department_id = supervisor_department_student.department_id
														where supervisor_id = '$session_id' and student.school_year = '$school_year'
														")or die(mysqli_error($con));
														$count = mysqli_num_rows($query);
									?>
												My Students: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
													<?php
														if ($count != '0'){
														while($row = mysqli_fetch_array($query)){
														$id = $row['student_id'];	
													?>
											<li>
												<a href="index.php?q=Activity&<?php echo 'id='.$id; ?>">
														<img src ="../admin/<?php echo $row['location'] ?>" width="143" height="140" class="img-polaroid">
													<div>
													<span>
													<p><p>View Activity</p></p>
													</span>
													</div>
												</a>
												<p class="class">Name:<?php echo $row['firstname']." ".$row['lastname']?></p>
												<h6 class="class">I.T Place:<?php echo $row['placement']?></h6>
												<h6 class="class"><b><?php echo $row['phone']?></b></h6>
											</li>
								
			
									<?php }}else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> You are currently not assign to any lecturer or you are done with your course of study.</div>
									<?php } ?>	
									</ul>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->