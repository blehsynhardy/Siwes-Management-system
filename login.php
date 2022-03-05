<?php
		include('admin/dbcon.php');
		session_start();
		if(isset($_POST['login']))
{
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
			$query = mysqli_query($con,"SELECT * FROM student WHERE username='$username' AND password='$password'")or die(mysqli_error($con));
			$num_row = mysqli_num_rows($query);
			$row = mysqli_fetch_array($query);
			/* teacher */
		$query_supervisor = mysqli_query($con,"SELECT * FROM supervisor WHERE username='$username' AND password='$password'")or die(mysqli_error($con));
		$num_row_supervisor = mysqli_num_rows($query_supervisor);
		$row_supervisor = mysqli_fetch_array($query_supervisor);

		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['student_id'];
		header("Location: student_notification.php");
				exit();	
		}
		

		else if ($num_row_supervisor > 0){
		$_SESSION['id']=$row_supervisor['teacher_id'];
		header("Location: dasboard_teacher.php");
				exit();
		
		 }else{ 
				echo 'false';
		}
		
		}	

				
		?>
		