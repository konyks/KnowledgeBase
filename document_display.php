<?php
// document_display.php - displays uploaded documents
// Written by:  Serhiy Kony, December 2015

//Include functions library
require('functions.php');

//Conect to the database
include('dbconnect.php');

//Verify that the program was called from kms.php
require('landing.php');

//Create a query
$query = "SELECT title, id
		FROM documents";

//Send the query to the database to execute
$result = $db->query($query, MYSQLI_ASSOC);

//Display an upload Icon
echo "<div id='editIcon'>
			<a href='kms.php?p=document_upload'><span class='glyphicon glyphicon-upload'></span> Upload a Document</a>
	  </div>
	  <h1>Company Documents</h1>";


//Check if there are any posts in the table				
if(empty($result))
{
	//Display a warning message informing a user that there are no posts available
	echo "
		<div class='alert alert-danger'>
   			 <strong>Warning</strong> There is no documents to display.
  		</div>";
} 
else{
	//List all documents available
	echo "<ul class='list-group'>";
	while(list($title, $id) = $result->fetch_row())
	{
		//Output all posts
		echo "
			<li class='list-group-item' align='center'><a href='kms.php?p=document_view&id=$id'><h3>$title</h3></a></li>
			";
	}
	echo "</ul>";

}
?>