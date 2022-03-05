<?php 
$content='login.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'Login' :	
		$content='login.php';		
		break;
		case 'Activity' :	
		$content='activity_log.php';		
		break;
		case 'Admin' :	
		$content='admin_user.php';		
		break;
		case 'Assign' :	
		$content='assign.php';		
		break;
		case 'Assign_Student' :	
		$content='assign_student.php';		
		break;
		case 'Assigned_Student' :	
		$content='assigned_student.php';		
		break;
		case 'Register' :	
		$content='register.php';		
		break;
		case 'Dashboard' :	
		$content='dashboard.php';		
		break;
		case 'Department' :	
		$content='department.php';		
		break;
		case 'Departmental_Supervisor' :	
		$content='departmental_supervisor.php';		
		break;
		case 'Edit_Student' :	
		$content='edit_student.php';		
		break;
		case 'Edit_Department' :	
		$content='edit_department.php';		
		break;
		case 'School' :	
		$content='school_year.php';		
		break;
		case 'Supervisor' :	
		$content='supervisor.php';		
		break;
		case 'Student' :	
		$content='student.php';		
		break;
		
	default :
	    $active_home='active';
		$content ='login.php';		
}
require_once("template.php");
?>