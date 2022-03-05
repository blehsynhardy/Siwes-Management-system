<?php
include('dbcon.php');
$get_id = $_GET['id'];
$query = mysqli_query($con,"select * from school_year where active_status  =  '1' ")or die(mysqli_error($con));
		$count = mysqli_num_rows($query);

		if ($count > 0){ ?>
		<script>
		alert('A year is already activated');
		window.location = "index.php?q=School";
		</script>
		<?php
		}else{
mysqli_query($con,"update school_year set active_status = '1' where school_year_id = '$get_id'");
header('location:index.php?q=School');
}
?>