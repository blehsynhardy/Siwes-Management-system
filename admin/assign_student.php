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
							<a href="index.php?q=Assigned_Student&<?php echo 'id='.$get_id; ?>&<?php echo 'ref='.$get_ref; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
						</div>
					    <!-- breadcrumb -->
									
									     <?php $class_query = mysqli_query($con,"select * from supervisor_department
					LEFT JOIN department ON department.department_id = supervisor_department.department_id
					where supervisor_department_id = '$get_id'")or die(mysqli_error($con));
					$class_row = mysqli_fetch_array($class_query);
					?>
					<!-- 			
					<ul class="breadcrumb">
						<li><a href="#"><?php //echo $class_row['department_name']; ?></a> <span class="divider">/</span></li>
						<li><a href="#">School Year: <?php// echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><b>Supervisor's Students</b></a></li>
	</ul> -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form method="post" action="">

							
										<button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Add Student</button>
												<br>
												<br>
                           
							 <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                          
						 <thead>
		
                                <tr>
                               
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Course Year and Section</th>
                  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
					
                                         <?php
							
							
										$a = 0 ;
										$query = mysqli_query($con,"select * from supervisor 
									LEFT JOIN department on department.department_id = supervisor.department_id
									LEFT JOIN student on student.department_id = supervisor.department_id
									where supervisor_id = '$get_id' and assign_status = 0") or die(mysqli_error($con));
										while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['student_id'];
										$a++;
									
                                        ?>
								
										<tr>
										<input type="hidden" name="test" value="<?php echo $a; ?>">
                                        <td width="70"><img  class="img-rounded" src="admin/<?php echo $row['location']; ?>" height="50" width="40"></td>
                                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
										<td><?php echo $row['department_name']; ?></td> 
								
										<td width="80">
										<select name="add_student<?php echo $a; ?>" class="span12">
										<option></option>
										<option>Add</option>
										</select>
										
										<input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $id; ?>">
										<input type="hidden" name="department_id<?php echo $a; ?>" value="<?php echo $row['department_id']; ?>">
										<input type="hidden" name="supervisor_id<?php echo $a; ?>" value="<?php echo $get_id; ?>">
										
										</td>
									
                                   <?php } ?>    
										
                                </tr>
                         
                            </tbody>
                        </table>
					
						</form>
						<?php
						if (isset($_POST['submit'])){

	$test = $_POST['test'];
	for($b = 1; $b <=  $test; $b++){

	$test1 = "student_id".$b;
	$test2 = "department_id".$b;
	$test3 = "supervisor_id".$b;
	$test4 = "add_student".$b;
	
	$id = $_POST[$test1];
	$department_id = $_POST[$test2];
	$supervisor_id = $_POST[$test3];
	$Add = $_POST[$test4];
	
 	$query = mysqli_query($con,"select * from supervisor_department_student where student_id = '$id' and department_id = '$department_id' ")or die(mysqli_error($con));
	$count = mysqli_num_rows($query); 
	
 	if ($count > 0){ ?>
	<script>
	 alert('Student Already Assigned'); 
	</script>
	<script>
	window.location = "index.php?q=Assign_Student&<?php echo 'id='.$get_id; ?>"; 
	</script>
	
	<?php
	}else  
	if($Add == 'Add'){
	
	
	mysqli_query($con,"insert into supervisor_department_student (student_id,department_id,supervisor_id) values('$id','$department_id','$supervisor_id') ")or die(mysqli_error($con));
	mysqli_query($con,"update student set assign_status = '1' where student_id = '$id' ")or die(mysqli_error($con));
	
	
	}else{
	}
?>
<script>
 window.location = "index.php?q=Assign_Student&<?php echo 'id='.$get_id; ?>"; 
</script>
	
	<?php
	}
}
?>
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