<?php
// profile.php - displays user`s profile
// Written by:  Serhiy Kony, December 2015

//Conect to the database
include('dbconnect.php');

//Verify that the program was called from kms.php
require('landing.php');

//Use only for admin to view other profiles of other users
if(isset($_GET['user'])){
  $user=$_GET['user'];
  $query = "SELECT * FROM users WHERE username='$user'";
}
else{
	$query = "SELECT * FROM users WHERE user_id='$user_id'";
	$user = $username;
}

$result = mysqli_fetch_array(mysqli_query($db, $query));

//Asign variables
$id = $result['user_id'];
$name = $result['full_name'];
$email = $result['email'];
$department = $result['department'];
$position = $result['position'];
$pic_path = $result['pic'];

//Display update icon
echo "<div id='editIcon'>
				<a href='kms.php?p=profile_update&id=$id'><span class='glyphicon glyphicon-edit'></span> Update</a>
	  </div>";
//Check if there is picture uploaded
if (!is_null($pic_path)) {
    $path = './'.$pic_path;
} else {
	//Get the path of a default picture
    $path = './img/default_ava.jpg';
}

//Display a profile picture
echo "<div class='row'>
  <div class='col-xs-6 col-md-3'>
      <img src='$path' alt='avatar' class='img-circle'>
    <div class='caption'>
        <h3>$user</h3>
      </div>
  </div>
</div>";

//Display profile information
echo "<div class='panel panel-info'>
  <div class='panel-heading'>Your Profile</div>
	<table class='table table-hover'>
	    <thead>
	      <tr>
	        <th> </th>
	        <th> </th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td>Name</td>
	        <td>$name</td>
	      </tr>
	      <tr>
	        <td>Email</td>
	        <td>$email</td>
	      </tr>
	      <tr>
	        <td>Department</td>
	        <td>$department</td>
	      </tr>
	      <tr>
	        <td>Position</td>
	        <td>$position</td>
	      </tr>
	    </tbody>
	  </table>
</div>";
?>