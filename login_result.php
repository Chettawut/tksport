<?php

include('conn.php');


if ( !isset($_POST['username'], $_POST['password']) ) {

	exit('Please fill both the username and password fields!');
}



if ($_POST['username']=='test') {
	if ($_POST['password']=='test') {

			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = 'test';
			$_SESSION['firstname'] = 'test';
			$_SESSION['lastname'] = 'test';
		
		
			
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