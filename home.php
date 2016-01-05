<?php 
// home.php - displays home page with all blog articles
// Written by:  Serhiy Kony, December 2015

//Connect to the databse
include('dbconnect.php');

//Verify that the program was called from kms.php
require('landing.php');

//Create a query
$query = "SELECT title, id
		FROM posts";

//Send the query to the database to execute
$result = $db->query($query, MYSQLI_ASSOC);

//Display Add Article button
echo "<div id='editIcon'>
			<a href='kms.php?p=article_modify&action=Add'><span class='glyphicon glyphicon-plus'></span> Add Article</a>
	  </div>
	  <h1>Company Blog Articles</h1>";


//Check if there are any posts in the table				
if(empty($result))
{
	//Display a warning message
	echo "
		<div class='alert alert-danger'>
   			 <strong>Warning</strong> There is no posts to display.
  		</div>";
} 
else{
	echo "<ul class='list-group'>";
	while(list($title, $id) = $result->fetch_row())
	{
		//Output all posts
		echo "
			<li class='list-group-item' align='center'><a href='kms.php?p=blog&id=$id'><h3>$title</h3></a></li>
			";
	}
	echo "</ul>";
}

?>