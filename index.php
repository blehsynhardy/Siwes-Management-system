<?php 
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'Signup_Student' :	
		$content='signup_student.php';		
		break;
		case 'Signup_Supervisor' :	
		$content='signup_supervisor.php';		
		break;
		
		
	default :
	    $active_home='active';
		$content ='home.php';		
}
require_once("template.php");
?>