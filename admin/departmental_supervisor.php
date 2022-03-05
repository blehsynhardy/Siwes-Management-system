<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span9" id="content">
                     <div class="row-fluid">
                     	<div class="pull-right">
							<a href="index.php?q=Assign" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
						</div>
					    <!-- breadcrumb -->
									
					     <?php 
					     $query = mysqli_query($con,"select * from department
					where department_id = '$get_id'
					")or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
					$id = $row['department_id'];	
					?>
					     <ul class="breadcrumb">
					     	<?php
						$school_year_query = mysqli_query($con,"select * from school_year order by school_year DESC")or die(mysqli_error($con));
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><b><a href="#"><?php echo $row['department_name']; ?></a> <span class="divider">/</span></b></li>
							<li><a href="#"><b>List of Supervisors</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?> </a> </li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
                                	<?php $query = mysqli_query($con,"SELECT *
														FROM supervisor where department_id = '$get_id'
														")or die(mysqli_error($con));
														$count = mysqli_num_rows($query);
									?>
									
												<span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
													<?php
										 
										 
														$my_supervisor = mysqli_query($con,"SELECT *
														FROM supervisor where department_id = '$get_id' order by lastname ")or die(mysqli_error($con));
														
														while($row = mysqli_fetch_array($my_supervisor)){
														$id = $row['supervisor_id'];
														$dept_id = $row['department_id'];
														?>
											<li>
												<a href="index.php?q=Assigned_Student&<?php echo 'id='.$id; ?>&<?php echo 'ref='.$dept_id; ?>">
														<img src ="../admin/<?php echo $row['location'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"><?php echo $row['lastname'];?></p>
												<p class="subject"><?php echo $row['firstname']; ?></p>
											</li>
									<?php } ?>	
									</ul>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>