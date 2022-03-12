 <?php
 include('../admin/dbcon.php');
 include('../session.php');
 
 
                            if (isset($_POST['change'])) {
                               

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/uploads/" . $_FILES["image"]["name"]);
                                $location = "uploads/" . $_FILES["image"]["name"];
								
								mysqli_query($con,"update  student set location = '$location' where student_id  = '$session_id' ")or die(mysqli_error($con));
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

							
							alert('You have already uploaded file for this');
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
					
					if (isset($_POST['send_message'])){	
					$supervisor_id = $_POST['supervisor_id'];
					$my_message = $_POST['my_message'];


					$query = mysqli_query($con,"select * from supervisor where supervisor_id = '$supervisor_id'")or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
					$name = $row['firstname']." ".$row['lastname'];

					$query1 = mysqli_query($con,"select * from student where student_id = '$session_id'")or die(mysqli_error($con));
					$row1 = mysqli_fetch_array($query1);
					$name1 = $row1['firstname']." ".$row1['lastname'];



mysqli_query($con,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$supervisor_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error($con));
 echo "<script type='text/javascript'>document.location='index.php?q=Send_Messages'</script>";

}
// read messages	
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"update message set message_status = 'read' where message_id='$id[$i]'");
}
header("location: index.php?q=Send_Messages");
}
?>

<?php
if (isset($_POST['reply'])){
$sender_id = $_POST['sender_id'];
$sender_name = $_POST['name_of_sender'];
$my_name = $_POST['my_name'];
$my_message = $_POST['my_message'];

mysqli_query($con,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error($con));
mysqli_query($con,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error($con));
?>
<script>
alert('Message Sent');
window.location ="student_message.php";
</script>
<?php

}	
								?>


<?php 


		if (isset($_POST['changePass'])) {
			
				if (count($_POST) > 0) {
					$sql = "SELECT * from student WHERE student_id ='$session_id'";
					$result = $con->query($sql);
				  //  $result = mysqli_query($con, "SELECT * from student WHERE student_id ='session_id'");
				    $row = mysqli_fetch_array($result);
				    if ($_POST["op"] == $row["password"]) {
				        mysqli_query($con, "UPDATE student set password='" . $_POST["cp"] . "' WHERE student_id='$session_id'");
				        
				        	echo "<script> alert('pass channged successfully'); window.location='index.php'; </script>";
				    } else
				       echo "<script> alert('password not channged successfully'); window.location='index.php?q=changePassword'; </script>";
				}
		}

 ?>
 
								
