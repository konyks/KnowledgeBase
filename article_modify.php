<?php
// arrticle_modify.php - modify articles page
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');

//Verify that the program was called from kms.php
require('landing.php');

//Check if id of an article is set
if(isset($_GET['id'])){
  $id=$_GET['id'];
}

//Check if action for an article is set
if(isset($_GET['action'])){
  $action=$_GET['action'];
}

//If action is Delete
if($action == "Delete"){
	//Delete an article form a database
	$query = "DELETE FROM posts WHERE id='$id'";

	 if($db->query($query))
      {
      	  //redirect a user to a home page
          header('Location: kms.php?p=home');

      }else{
          //Display an error message
		  display_error();
      }

	 //Delete all comments associated with the deleted article     
	 $query = "DELETE FROM comments WHERE article_id='$id'";

	 if($db->query($query))
	  {
	  	  //Redirect a user to a home page
	      header('Location: kms.php?p=home');

	  }else{
	      //Display an error message
		  display_error();
	  }
}

//If action is Edit
if($action == "Edit"){
	//Get current value field from an article to be prepopulated in the form
	$query = "SELECT id, title, body FROM posts WHERE id='$id'";
	$result = mysqli_fetch_array(mysqli_query($db, $query));

	$title = $result['title'];
	$body = $result['body'];

	if(!empty($_POST))
	{
       $title= $_POST['title'];
       $body = $_POST['body'];
       $id = $_POST['id'];

    	//DO UPDATE Statement
      if($db->query("UPDATE posts SET title='$title', body='$body', updated=NOW() WHERE id='$id'"))
      {
          //Redirect a user to log in page
          header('Location: kms.php?p=home');
      }else{
          //Display an error message
		  display_error();
      }
	}
	//Output the edit form
	echo "
	    <h2>Edit Article</h2>
	      <form method='POST' data-toggle='validator' role='form'>
	        <div class='form-group'>
	          <label for='inputTitle' class='control-label' >Title</label>
	          <input type='text' name='title' class='form-control' id='title' value='$title' required>
	        </div>
	        <div class='form-group'>
	          <label for='def'>Body</label>
	          <textarea class='form-control' name='body' rows='5' id='body'>$body</textarea>
	        </div>
	        <div class='form-group'>
	          <input type='hidden' name='id' class='form-control' id='id' value='$id'>
	        </div>
	        <div class='form-group'>
	          <button type='submit' name='btn-record' class='btn btn-success'>Edit</button>
	        </div>
	      </form>";
}

//If action is Add
if($action == "Add"){
	if(isset($_POST['btn-record']))
	{
		//Insert a new article into the database
       $title = $_POST['title'];
       $body = $_POST['body'];

           if($db->query("INSERT INTO posts(title,body,created) VALUES('$title','$body', NOW())"))
            {
               //Redirect a user to log in page
               header('Location: kms.php?p=home');
            }else{
              //Display an error message
			   display_error();
            }
	}


	//Output the add form
	echo "
	    <h2>New Post Article</h2>
	      <form method='POST' data-toggle='validator' role='form'>
	        <div class='form-group'>
	          <label for='inputTitle' class='control-label'>Title</label>
	          <input type='text' name='title' class='form-control' id='title' placeholder='Enter Title' required>
	        </div>
	        <div class='form-group'>
	          <label for='def'>Body</label>
	          <textarea class='form-control' name='body' rows='5' id='body'></textarea>
	        </div>
	        <div class='form-group'>
	          <button type='submit' name='btn-record' class='btn btn-success'>Record</button>
	        </div>
	      </form>";
}

?>