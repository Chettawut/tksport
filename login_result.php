<?php

include_once('backend/conn.php');
session_start();

if ($stmt = $conn->prepare('SELECT percode,password,firstname,lastname,type FROM person WHERE username = ?')) {
	
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();	
	$stmt->store_result();


}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($percode,$password,$firstname,$lastname,$type);
	$stmt->fetch();

	if (password_verify($_POST['password'], $password)) {

			session_regenerate_id();
			$_SESSION['checklogin'] = TRUE;
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['percode'] = $percode;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
					
			
			if($type=='admin')
			$_SESSION['type'] = 'Admin';
			else if($type=='นักเรียน')
			$_SESSION['type'] = 'นักเรียน';
			else if($type=='คุณครู')
			$_SESSION['type'] = 'คุณครู';
			
			
			header( "Location: backend");
		
	} else {
		echo 'Incorrect password!';
		header( "Location: ..?log=password");
	}
} else {
	echo 'Incorrect username!';
	header( "Location: ..?log=username");
}


?>