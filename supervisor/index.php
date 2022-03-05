<?php 
$content='dashboard_supervisor.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'Login' :	
		$content='../login.php';		
		break;
		case 'Register' :	
		$content='register.php';		
		break;
		case 'Message' :	
		$content='supervisor_message.php';		
		break;
		case 'Activity' :	
		$content='supervisor_activity.php';		
		break;
		case 'Notification' :	
		$content='notification.php';		
		break;
		
	default :
	    $active_home='active';
	    $title="Dashboard";	
		$content ='dashboard_supervisor.php';		
}
require_once("template.php");
?>