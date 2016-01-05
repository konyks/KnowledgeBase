<?php
// kms.php - starting page of the webapplication
// Written by:  Serhiy Kony, December 2015

// Set Default PHP Options
error_reporting('E_ALL');
ob_start();
date_default_timezone_set('America/New_York');
  
//Get session variables
include('session.php');

include('variables.php');
  
// Configuration Variables
  $landing = TRUE;        // Set variable for page authentication

if (isset($_GET['p'])){
  $p = $_GET['p'];
} 
//Display Header and Nav Bar
include(ROOT.'/templates/header.php');

if($logon == TRUE){

  //Assign a page
  $page = $p.".php";

  //Check if the page exists
  if (!file_exists($page)){
      //Display Error Page
      $page = "error.php";
  }
} 
else{ //User is not signed in
  if ($p == "signup")
  {
      $page = "signup.php";
  }
  else{
      //Redirect a user to sign in page
      $page = "signin.php";
  }
}

//Display Page content
include($page); 

//Dispay Footer
include(ROOT.'/templates/footer.php'); 

?>