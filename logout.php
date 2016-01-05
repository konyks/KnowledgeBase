<?php
// logout.php - logs a user out of the system
// Written by:  Serhiy Kony, December 2015

//Start the session
session_start();

//Check if the logout was set
if(isset($_GET['logout']))
{
	//Unset the session
	 session_unset();
	//Set the global logout variable to False
	 $logon = FALSE;

	 //Redirect user to the home page, which in turn will redirect him to log in page
	 header('Location: kms.php');
}

?>