 <?php
 include('../admin/dbcon.php');
 include('../session.php');
 
 
                            if (isset($_POST['change'])) {
                               

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/uploads/" . $_FILES["image"]["name"]);
                                $location = "uploads/" . $_FILES["image"]["name"];
								
								mysqli_query($con,"update  supervisor set location = '$location' where supervisor_id  = '$session_id' ")or die(mysqli_error($con));
								 echo "<script type='text/javascript'>document.location='index.php'</script>";
							}

							//upload activity
							if (isset($_POST['upload_activity'])){
							$student_id = $_POST['student_id'];
							$department_id = $_POST['department_id'];
							$supervisor_id = $_POST ['supervisor_id'];
							$desc = $_POST['desc'];
							$name = $_POST['name'];
							$name_notification = 'Logbook';

							$file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                                $file_name = addslashes($_FILES['file']['name']);
                                $file_size = getimagesize($_FILES['file']['tmp_name']);

                                move_uploaded_file($_FILES["file"]["tmp_name"], "../admin/uploads/" . $_FILES["file"]["name"]);
                                $location = "uploads/" . $_FILES["file"]["name"];

							$query = mysqli_query($con,"select * from files where student_id = '$student_id' and name = '$name'")or die(mysqli_error($con));
							$count = mysqli_num_rows($query);

							if ($count > 0){ ?>
							<script>
							alert('You have already uploaded file for this $name');
							window.location = "index.php?q=Activity";
							</script>
							<?php
							}else{
							mysqli_query($con,"insert into files (floc, fdatein, name, fdesc, supervisor_id, department_id, student_id) values('$location', NOW(), '$name', '$desc', '$supervisor_id', '$department_id', '$student_id')")or die(mysqli_error($con));
							mysqli_query($con,"insert into supervisor_notification (supervisor_id,notification,date_of_notification,link,student_id) value('$supervisor_id','$name_notification',NOW(),'downloadable_student.php','$student_id')")or die(mysqli_error($con));
							?>
							<script>
							window.location = "index.php?q=Activity";
							</script>
		<?php
		}
		}
								
								?>
 
								
