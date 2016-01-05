<?php
// header.php - displays a consistant header
// Written by:  Serhiy Kony, December 2015

echo "<!DOCTYPE html>
<html lang='en'>
	<head>
    <title>Knowledge Base</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
		<link rel='stylesheet' type='text/css' href='http://localhost/KnowledgeBase/css/styles.css'>
</head>
<body>
<nav class='navbar navbar-default' id='navBar'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>                        
      </button>
      <a class='navbar-brand' href='kms.php?p=home'><span class='glyphicon glyphicon-check'></span> Knowlege Base</a>
    </div>
    <div class='collapse navbar-collapse'>
      <ul class='nav navbar-nav'>";
          //Check if user is logged on
          if($logon)
            {
              //Display navigation bar options available only for authonticated user
              echo "
               <li class='active'><a href='kms.php?p=home'><span class='glyphicon glyphicon-home'></span> Home</a></li>
               <li><a href='kms.php?p=glossary'><span class='glyphicon glyphicon-th-list'></span> Glossary</a></li>
               <li><a href='kms.php?p=document_display'><span class='glyphicon glyphicon-leaf'></span> Documents</a></li>";
            }
echo "
      </ul>
      <ul class='nav navbar-nav navbar-right'>";
           //Check if user is logged on
          if($logon)
            {
              //If a user is administrator display list of user option
              if($type == 1){
                echo "<li><a href='kms.php?p=users'><span class='glyphicon glyphicon-user'></span> Users</a></li> ";
              }
              //Display Log Out button
              echo "
               <li><a href='kms.php?p=profile'> Hi, $username </a></li>
               <li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Sign Out</a></li>";
            }
            else{
              //Display Log in and Sign Up buttons
              echo "
                <li><a href='kms.php?p=signup'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                <li><a href='kms.php?p=signin'><span class='glyphicon glyphicon-log-in'></span> Sign In</a></li>
              ";
            }
echo "
      </ul>
    </div>
  </div>
</nav>
<div class='wrapper'>";