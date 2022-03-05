<?php 
$content='dashboard_student.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'Login' :	
		$content='login.php';		
		break;
		case 'Register' :	
		$content='register.php';		
		break;
		case 'Message' :	
		$content='student_message.php';		
		break;
		case 'Send_Messages' :	
		$content='send_messages.php';		
		break;
		case 'Activity' :	
		$content='log_activity.php';		
		break;
		case 'Notification' :	
		$content='notification.php';		
		break;
		case 'changePassword' :	
		$content='change_password_student.php';		
		break;
		
	default :
	    $active_home='active';
	    $title="Dashboard";	
		$content ='dashboard_student.php';		
}
require_once("template.php");
?>