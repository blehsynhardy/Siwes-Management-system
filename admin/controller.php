<?php
		include('dbcon.php');
		session_start();
		if(isset($_POST['login']))
{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query=mysqli_query($con,"select * from users where username='$username' and password='$password'")or die(mysqli_error($con));
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['user_id'];
		
		echo 'true';
		
		mysqli_query($con,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_error($con));
		 }else{ 
		echo 'false';
		}
		 echo "<script type='text/javascript'>document.location='index.php?q=Dashboard'</script>";
		}

//Post department
		if (isset($_POST['save_department'])){
		$department_name = $_POST['department_name'];
		$hod = $_POST['hod'];

		$query = mysqli_query($con,"select * from department where department_name  =  '$department_name' ")or die(mysqli_error($con));
		$count = mysqli_num_rows($query);

		if ($count > 0){ ?>
		<script>
		alert('Department Name Already Exist');
		</script>
		<?php
		}else{
		mysqli_query($con,"insert into department (department_name, hod) values('$department_name', '$hod')")or die(mysqli_error($con));
		?>
		<script>
		window.location = "index.php?q=Department";
		</script>
		<?php
		}
		}

		//Post student
		if (isset($_POST['save_student'])){
		$username = $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST ['lastname'];
		$department_id = $_POST['department_id'];
		$school_year = $_POST['school_year'];

		$query = mysqli_query($con,"select * from student where username = '$username' ")or die(mysqli_error($con));
		$count = mysqli_num_rows($query);

		if ($count > 0){ ?>
		<script>
		alert('Student Already Exist');
		window.location = "index.php?q=Student";
		</script>
		<?php
		}else{
		mysqli_query($con,"insert into student (username, firstname, lastname, department_id, location, school_year) values('$username', '$firstname', '$lastname', '$department_id', 'uploads/NO-IMAGE-AVAILABLE.jpg', '$school_year')")or die(mysqli_error($con));
		?>
		<script>
		window.location = "index.php?q=Student";
		</script>
		<?php
		}
		}
		//Post Supervisor
		if (isset($_POST['save_supervisor'])){
		$title = $_POST['title'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST ['lastname'];
		$department_id = $_POST['department_id'];

		$query = mysqli_query($con,"select * from supervisor where firstname = '$firstname' ")or die(mysqli_error($con));
		$count = mysqli_num_rows($query);

		if ($count > 0){ ?>
		<script>
		alert('Supervisor Already Exist');
		window.location = "index.php?q=Supervisor";
		</script>
		<?php
		}else{
		mysqli_query($con,"insert into supervisor (title, firstname, lastname, department_id) values('$title', '$firstname', '$lastname', '$department_id')")or die(mysqli_error($con));
		?>
		<script>
		window.location = "index.php?q=Supervisor";
		</script>
		<?php
		}
		}
//post admin
		if (isset($_POST['save_admin'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];


			$query = mysqli_query($con,"select * from users where username = '$username' and password = '$password' and firstname = '$firstname' and password = '$password' ")or die(mysqli_error($con));
			$count = mysqli_num_rows($query);

			if ($count > 0){ ?>
			<script>
			alert('Data Already Exist');
			window.location = "index.php?q=Admin";
			</script>
			<?php
			}else{
			mysqli_query($con,"insert into users (username,password,firstname,lastname) values('$username','$password','$firstname','$lastname')")or die(mysqli_error($con));

			mysqli_query($con,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')")or die(mysqli_error($con));
			?>
			<script>
			window.location = "index.php?q=Admin";
			</script>
			<?php
			}
			}
//post admin
		if (isset($_POST['remove_student'])){
			$id = $_POST['id'];
			
			mysqli_query($con,"DELETE FROM supervisor_department_student where student_id='$id'")or die(mysqli_error($con));

			mysqli_query($con,"update student set assign_status = '0' where student_id = '$id' ")or die(mysqli_error($con));
			?>
			<script>
			window.location = "index.php?q=Admin";
			</script>
			<?php
			}
//save school
			if (isset($_POST['save_school'])){
$school_year = $_POST['school_year'];



$query = mysqli_query($con,"select * from school_year where school_year = '$school_year'")or die(mysqli_error($con));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
window.location = "index.php?q=School";
</script>
<?php
}else{
mysqli_query($con,"insert into school_year (school_year) values('$school_year')")or die(mysqli_error($con));

mysqli_query($con,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add School Year $school_year')")or die(mysqli_error($con));
?>
<script>
window.location = "index.php?q=School";
</script>
<?php
}
}


                           

//Delete department
		if (isset($_POST['delete_department'])){
			$id=$_POST['selector'];
			$N = count($id);
			for($i=0; $i < $N; $i++)
			{
				$result = mysqli_query($con,"DELETE FROM department where department_id='$id[$i]'");
			}
			header("location: index.php?q=Department");
			}

			if (isset($_POST['delete_student'])){
			$id=$_POST['selector'];
			$N = count($id);
			for($i=0; $i < $N; $i++)
			{
				$result = mysqli_query($con,"DELETE FROM student where student_id='$id[$i]'");
			}
			header("location: index.php?q=Student");
			}
				
		?>