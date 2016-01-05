<?php
// session.php - starts a session and sets session variables
// Written by:  Serhiy Kony, December 2015

//Start session
session_start();

//Check if session is present with values
if (isset($_SESSION['user'])) {
	//user id 
	$user_id =	$_SESSION['user'];
	//user name
	$username = $_SESSION['name'];
	//user type
	$type = $_SESSION['type'];
	//logoon variable that is used to check if user is logged in
	$logon = TRUE;
	}
else {
	$user= NULL;
	$username = NULL;
	$logon = FALSE;
	}
?>