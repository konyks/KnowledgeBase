<?php
// profile_update.php - updates user profile
// Written by:  Serhiy Kony, December 2015

//Include functions library
require('functions.php');

//Conect to the database
include('dbconnect.php');


//Use only for admin to view other pages
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query = "SELECT * FROM users WHERE user_id='$id'";
}
else{
  $query = "SELECT * FROM users WHERE user_id='$user_id'";
  $id = $user_id;
}

$result = mysqli_fetch_array(mysqli_query($db, $query));

//asign variables
$name = $result['full_name'];
$email = $result['email'];
$department = $result['department'];
$position = $result['position'];

if(!empty($_POST))
{
    //Update variables
    $uName = $_POST['name'];
    $uEmail = $_POST['email'];
    $uDepartment = $_POST['department'];
    $uPosition = $_POST['position'];
    $userID = $_POST['user_id'];

   	//Picture Uploade
  	$postname 	= "pic";
		$directory	= "img/profile";
		$filename	= $userID;
		$extensions = array(".gif", ".jpg", ".jpeg", ".png");
		$size 		= 1024*1024;
		list($errno, $picfile) = upload($postname, $directory, $filename, $extensions, $size);
    
    $query = "UPDATE users SET full_name='$uName', email='$uEmail', department='$uDepartment', position='$uPosition', pic='$picfile' WHERE user_id='$userID'";

    if($db->query($query))
    {
      if ($id == $user_id){
        //Redirect a user to profile
        header('Location: kms.php?p=profile'); 
      }
      else{
        //Redirect a user to profile
        header('Location: kms.php?p=users'); 
      }

    }else{
        //Display an error message
        display_error();
    }
    
}

//Update user profile form 
echo "<h2>Update Your Profile</h2>
          <form action='profile_update.php' method='POST' enctype='multipart/form-data'>
            <div class='form-group'>
              <label for='inputName' class='control-label'>Name</label>
              <input type='text' name='name' class='form-control' id='name' value='$name' required>
            </div>
            <div class='form-group'>
      			<label for='email' class='control-label'>Email</label>
      			<input type='email' name='email' class='form-control' id='email' value='$email' data-error='Email address is invalid' required>
      			<div class='help-block with-errors'></div>
    		    </div>
            <div class='form-group'>
              <label for='inputDepartment' class='control-label'>Department</label>
              <input type='text' name='department' class='form-control' id='department' value='$department' required>
            </div>
            <div class='form-group'>
              <label for='inputPosition' class='control-label'>Position</label>
              <input type='text' name='position' class='form-control' id='position' value='$position' required>
            </div>
            <div class='form-group'>
              <label for='file' class='control-label'>Profile Picture</label>
              <input type='file' name='pic' required>
            </div>
            <div class='form-group'>
              <input type='hidden' name='user_id' class='form-control' id='user_id' value='$id'>
            </div>
            <div class='form-group'>
              <button type='submit' name='btn-record' class='btn btn-success'>Update</button>
            </div>
        </form>";  
?>