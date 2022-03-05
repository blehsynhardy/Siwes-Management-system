<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $get_ref = $_GET['ref']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span9" id="content">
                     <div class="row-fluid">
                     	<div class="pull-right">
                     		<a href="index.php?q=Departmental_Supervisor&<?php echo 'id='.$get_ref; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
							<a href="index.php?q=Assign_Student&<?php echo 'id='.$get_id; ?>&<?php echo 'ref='.$get_ref; ?>" class="btn btn-info"><i class="icon-plus-sign"></i> Assign Student</a>
						</div>
					    <!-- breadcrumb -->
									
									     <?php $class_query = mysqli_query($con,"select * from supervisor_department
					LEFT JOIN supervisor ON supervisor.supervisor_id = '$get_id'")or die(mysqli_error($con));
					$class_row = mysqli_fetch_array($class_query);
					?>
								
					<ul class="breadcrumb">
						<li><a href="#"><b><?php echo $class_row['firstname']; ?> <?php echo $class_row['lastname']; ?></b></a> <span class="divider">/</span></li>
						<li><a href="#"><b>List of Assigned Student</b></a><span class="divider">/</span></li>
						<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> </li>
	</ul>
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
                                	<?php 
                                	$my_student = mysqli_query($con,"SELECT * FROM supervisor_department_student
														LEFT JOIN student ON student.student_id = supervisor_department_student.student_id 
														INNER JOIN department ON department.department_id = student.department_id where supervisor_id = '$get_id' order by lastname ")or die(mysqli_error($con));
								$count_my_student = mysqli_num_rows($my_student);?>
									
												<span class="badge badge-info"><?php echo $count_my_student; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
													<?php
										 
										 
														$my_supervisor = mysqli_query($con,"SELECT * FROM supervisor_department_student
														LEFT JOIN student ON student.student_id = supervisor_department_student.student_id 
														INNER JOIN department ON department.department_id = student.department_id where supervisor_id = '$get_id' order by lastname ")or die(mysqli_error($con));

														while($row = mysqli_fetch_array($my_supervisor)){
														$id = $row['student_id'];
														?>
											<li>
												<a href="assigned_student.php<?php echo '?id='.$id; ?>">
														<img src ="../admin/<?php echo $row['location'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"><?php echo $row['lastname'];?></p>
													<p class="subject"><?php echo $row['firstname']; ?></p>
													<a  href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>
											</li>
													<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form action="controller.php" method="post">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Remove Student</h3>
	</div>
		<div class="modal-body">
		<div class="alert alert-danger">
			Are you sure you want to Remove <?php echo $row['lastname'];?> <?php echo $row['firstname'];?>?
		</div>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
		<button class="btn btn-danger remove" name="remove_student"><i class="icon-check icon-large"></i> Yes</button>
	</div>
	</form>
</div>
				
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