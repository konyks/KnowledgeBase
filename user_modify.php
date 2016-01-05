<?php
// user_modify.php - modifies a user state (sets a user to be active or inactive)
// This option is only available for the admin user
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');
require('landing.php');

if(isset($_GET['id'])){
  $id=$_GET['id'];
}

if(isset($_GET['action'])){
  $action=$_GET['action'];
}

if ($action == "Disable"){
  $query = "UPDATE users SET state='0' WHERE user_id='$id'";
}
else{
  $query = "UPDATE users SET state='1' WHERE user_id='$id'";
}

 if($db->query($query))
      {
          header('Location: kms.php?p=users');

      }else{
          //Display an error message
          echo "
              <div class='alert alert-danger'>
                <strong>Ooops: </strong> Something went wrong. System is expiriencing technical dificalties. Please try again!
              </div>";
      }
?>