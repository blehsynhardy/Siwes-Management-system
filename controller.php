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
			/* supervisor */
		$query_supervisor = mysqli_query($con,"SELECT * FROM supervisor WHERE username='$username' AND password='$password'")or die(mysqli_error($con));
		$num_row_supervisor = mysqli_num_rows($query_supervisor);
		$row_teahcer = mysqli_fetch_array($query_supervisor);

		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['student_id'];
		header("Location: student/index.php");
				exit();	
		}
		

		else if ($num_row_supervisor > 0){
		$_SESSION['id']=$row_teahcer['supervisor_id'];
		header("Location: supervisor/index.php");
				exit();
		
		 }else{ 
				?>
		<script>
		alert('Data Does not Exist');
		window.location = "index.php";
		</script>
		<?php
		}
		
		}

		if(isset($_POST['signup']))
{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$place = $_POST['place'];
			$department_id = $_POST['department_id'];

			$query = mysqli_query($con,"select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and department_id = '$department_id'")or die(mysqli_error($con));
			$row = mysqli_fetch_array($query);
			$id = $row['student_id'];

			$count = mysqli_num_rows($query);
			if ($count > 0){
				mysqli_query($con,"update student set phone = '$phone', placement = '$place', password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error($con));
				$_SESSION['id']=$id;
				header("Location: student/index.php");
			}else{
			echo "<script>alert('student does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ', { header: 'Sign Up Failed' }); window.location='index.php'</script>";
			}
		}

		if(isset($_POST['signup_sup']))
{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$department_id = $_POST['department_id'];

			$query = mysqli_query($con,"select * from supervisor where firstname='$firstname' and lastname='$lastname' and department_id = '$department_id'")or die(mysqli_error($con));
			$row = mysqli_fetch_array($query);
			$id = $row['supervisor_id'];

			$count = mysqli_num_rows($query);
			if ($count > 0){
				mysqli_query($con,"update supervisor set username = '$username', password = '$password', supervisor_status = 'Registered' where supervisor_id = '$id'")or die(mysqli_error($con));
				$_SESSION['id']=$id;
				header("Location: supervisor/index.php");
			}else{
			echo "<script>alert('supervisor does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ', { header: 'Sign Up Failed' }); window.location='index.php'</script>";
			}
		}

				
		?>
		