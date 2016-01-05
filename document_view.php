<?php
// document_view.php - view for a document to be displayed
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');

//Verify that the program was called from kms.php
require('landing.php');

//Chedk if id is set
if(empty($_GET['id'])){
	$page = false;
}
else{
	$id = $_GET['id'];
	//Query for a specific article
	$query = "
		SELECT title, doc_path, created
		FROM documents
		WHERE id = '$id'
		";
	$result = $db->query($query, MYSQLI_ASSOC);
}

//Check if there are any posts in the table				
if(empty($result))
{
	//Display a warning message
	echo "
		<div class='alert alert-danger'>
   			 <strong>Warning</strong> No documents found
  		</div>";
} 
else{
	//Display an article 
	while(list($title, $doc_path, $created) = $result->fetch_row())
	{
	  // Body
	  echo "<h2>$title</h2>
	  <p class='faded'>Posted on $created</p>
	  <table width='$width' align='center' bgcolor='white' cellspacing='10' class='text'>
			<tr><td align='center'>
			<p><embed src='$doc_path' width='850' height='1076'>
			</td></tr></table>";
	}
}
?>