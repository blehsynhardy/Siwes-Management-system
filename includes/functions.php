<?php
	$base_url = "http://localhost/siwes";

	function get_student_id($username, $db, $sql) {
		$query = "SELECT * FROM student WHERE username='$username'";
		$return = $db->selectDB($sql,$query);
		if ($return->rowCount() > 0) {
			while($r = $return->fetch()){
				return $r->id;
			}
		}
		else{
			return NULL;
		}	
	}

	function get_student_fname($username, $db, $sql) {
		$query = "SELECT * FROM student WHERE username='$username'";
		$return = $db->selectDB($sql,$query);
		if ($return->rowCount() > 0) {
			while($r = $return->fetch()){
				return $r->firstname;
			}
		}
		else{
			return NULL;
		}	
	}

	function get_student_lname($username, $db, $sql) {
		$query = "SELECT * FROM student WHERE username='$username'";
		$return = $db->selectDB($sql,$query);
		if ($return->rowCount() > 0) {
			while($r = $return->fetch()){
				return $r->lastname;
			}
		}
		else{
			return NULL;
		}	
	}

	
?>
