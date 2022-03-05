<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($con,"update school_year set active_status = '0' where school_year_id = '$get_id'");
header('location:index.php?q=School');
?>