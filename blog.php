<?php 
// blog.php - lists all blog articles
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');
require('landing.php');

//Check if id was set
if(empty($_GET['id'])){
	$page = false;
}
else{
	//Query the database for an article with a specified id
	$id = $_GET['id'];

	$query = "
		SELECT title, body, created, updated
		FROM posts
		WHERE id = '$id'
		";
	$result = $db->query($query, MYSQLI_ASSOC);
}

//Check if there are any posts in the table				
if(empty($result))
{
	//Display a warning message, informing a user that there are no posts available
	echo "
		<div class='alert alert-danger'>
   			 <strong>Warning</strong> No page found.
  		</div>";
} 
else{
	//Display all articles available in the database
	while(list($title, $text, $date, $updated) = $result->fetch_row())
	{
		//Only display delete and edit for admin
		if($type == 1){
		echo "
			<div id='editIcon'>
				<a href='kms.php?p=article_modify&id=$id&action=Edit'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
				<a href='kms.php?p=article_modify&id=$id&action=Delete'><span class='glyphicon glyphicon-trash'></span> Delete</a>
		  	</div>
			  ";
		}
		
		//Display title of an article
		echo "<h2>$title</h2>";
		
		//If the Update filed is set, display when the article was updated
		if($updated!=NULL){
			echo "<p class='faded'>Updated on $updated</p>";
		}
		
		//Display when the article was posted
		echo "
			<p class='faded'>Posted on $date</p>
			<p>$text</p>
			";
	}
	
	//Query for all available comments for a specific article
	$queryComents = "
		SELECT c.comment, u.username, c.created
		FROM comments c
		INNER JOIN users u
		ON c.user_id = u.user_id
		WHERE article_id = '$id'
		ORDER BY c.created
		";
	
	$commentsResult = $db->query($queryComents, MYSQLI_ASSOC);

	//Display all coments
	echo  "<table class='table table-striped'>
		    <thead>
		      <tr>
		        <th><b>Comments</b></th>
		      </tr>
		    </thead>
		    <tbody>";
	
	while(list($comment, $name, $created) = $commentsResult->fetch_row())
	{
	    echo "
	      <tr class='info'>
	        <td><p>$comment</p>
	        <h6>Posted by: $name</h6>
	        <h6>Posted on: $created</h6>
	        </td>
	      </tr>";
	}
	
	echo "</tbody>
			 </table>";

	//Display the input comment form on each page of an article		
	include('posts.php');
}

?>