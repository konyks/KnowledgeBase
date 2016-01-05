<?php
// users.php - lists all users for the system
// THis option is only available for administrator
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');
require('landing.php');

//Create a query
$query = "SELECT user_id, state, username
		FROM users
		WHERE user_type != 1
		ORDER BY username AND state";

//Send the query to the database to execute
$result = $db->query($query, MYSQLI_ASSOC);

echo "<h1>Comany Users</h1>";

//Check if there are any terms in the table				
if(empty($result))
{
	//Display a warning message
	echo "
		<div class='alert alert-danger'>
   			 <strong>Warning</strong> You have no users in the system
  		</div>";
} 
else{
	echo "
	<table class='table table-striped'>
    <thead>
      <tr>
		<th>Username</th>
		<th>User Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>";

	while(list($id, $state, $username) = $result->fetch_row())
	{
		//Output all users
		echo "<tr>
		       	<th><a href='kms.php?p=profile&user=$username'>$username</a></th>";
		if($state == 1){
			//<font color="red">This is some text!</font>
			echo "<th><font color='green'><span class='glyphicon glyphicon-ok-circle'></span> Active</font></th>";
		}
		else{
			echo "<th><font color='red'><span class='glyphicon glyphicon-remove-circle'></span> Inactive</font></th>";
		}
		if($state == 1){
			echo "<th><a href='kms.php?p=user_modify&id=$id&action=Disable'><font color='red'><span class='glyphicon glyphicon-remove'></span> Disable</font></a></th>";
		}
		else{
			echo "<th><a href='kms.php?p=user_modify&id=$id&action=Enable'><font color='green'><span class='glyphicon glyphicon-ok'></span> Enable</font></a></th>";
		}
       	echo "
      		  </tr>";
	}

	echo "
	</tbody>
  	</table>";
}


?>