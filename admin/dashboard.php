<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Numbers</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query_reg_supervisor = mysqli_query($con,"select * from supervisor where supervisor_status = 'Registered' ")or die(mysqli_error($con));
								$count_reg_supervisor = mysqli_num_rows($query_reg_supervisor);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_reg_supervisor; ?>"><?php echo $count_reg_supervisor; ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Supervisor</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_supervisor = mysqli_query($con,"select * from supervisor")or die(mysqli_error($con));
								$count_supervisor = mysqli_num_rows($query_supervisor);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_supervisor; ?>"><?php echo $count_supervisor ?></div>
                                    <div class="chart-bottom-heading"><strong>Supervisors</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_student = mysqli_query($con,"select * from student where status='Registered'")or die(mysqli_error($con));
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Students</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_student = mysqli_query($con,"select * from student")or die(mysqli_error($con));
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Students</strong>

                                    </div>
                                </div>
								
								
								
								
							
								
									<?php 
								$query_department = mysqli_query($con,"select * from department")or die(mysqli_error($con));
								$count_department = mysqli_num_rows($query_department);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_department; ?>"><?php echo $count_department; ?></div>
                                    <div class="chart-bottom-heading"><strong>Department</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_file = mysqli_query($con,"select * from files")or die(mysqli_error($con));
								$count_file = mysqli_num_rows($query_file);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_file; ?>"><?php echo $count_file; ?></div>
                                    <div class="chart-bottom-heading"><strong>Uploaded Log / Activities</strong>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                
                
                 
                 
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

