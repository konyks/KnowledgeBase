<?php
// posts.php - allows a user to post comments for a specific article
// Written by:  Serhiy Kony, December 2015

// Conect to the database
include('dbconnect.php');

//Check if id of an article is set
if(isset($_GET['id'])){
  $a_id = $_GET['id'];
}
//Asign user_id variable to user id
$u_id = $user_id;

if(!empty($_POST))
{
  //Assign all post variables
   $comment = $_POST['comment'];
   $article_id = $_POST['a_id'];
   $user_id = $_POST['u_id'];

//DO UPDATE Statement here
  if($db->query("INSERT INTO comments(article_id,user_id,comment, created) VALUES('$article_id','$user_id','$comment', NOW())"))
  {
      //Keep the user on the same page
	  header("Location: kms.php?p=blog&id=$article_id");
  }else{
      //Display an error message
		display_error();
  }
}

//User comments form
echo "<div class='container'>
  <h2>Leave a Comment</h2>
  <form role='form' action='posts.php' method='post' id='commentform'>
    <div class='form-group'>
      <label for='comment'>Comment:</label>
      <textarea class='form-control' rows='5' name='comment' id='comment'></textarea>
    </div>
    <div class='form-group'>
      <input type='hidden' name='u_id' class='form-control' id='u_id' value='$u_id'>
    </div>
    <div class='form-group'>
      <input type='hidden' name='a_id' class='form-control' id='a_id' value='$a_id'>
    </div>
   	<div class='form-group'>
	 <input name='submit' type='submit' class='btn btn-success' value='Post a Comment' />
	</div>
  </form>
</div>"; 

?>