
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($con,"select * from school_year where active_status='1'")or die(mysqli_error($con));
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>List of Departments</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
									<?php $query = mysqli_query($con,"select * from department
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
														if ($count != '0'){
														while($row = mysqli_fetch_array($query)){
														$id = $row['department_id'];	
													?>
											<li>
												<a href="index.php?q=Departmental_Supervisor&<?php echo 'id='.$id; ?>">
														<img src ="uploads/thumbnails.jpg" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['department_name']; ?></p>
													
													</span>
													</div>
												</a>
												<p><a href="index.php?q=Departmental_Supervisor&<?php echo 'id='.$id; ?>"><?php echo $row['department_name']; ?></a></p>
											</li>
								
			
									<?php }}else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> Department not available</div>
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