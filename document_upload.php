<?php
// document_upload.php - upload documents
// Written by:  Serhiy Kony, December 2015

//Include functions library
require('functions.php');

//Conect to the database
include('dbconnect.php');

//Check if anything was posted from a form
if(!empty($_POST))
{
  //Set all of the post variables
  $title = $_POST['title'];

  //Assign variables to be called by the upload funtion
  $postname   = "doc";
  $directory  = "documents/";
  $filename = $title;
  $extensions = array(".txt", ".doc", ".docx", ".pdf");
  $size     = 10000000;

  //Call the upload function
  list($errno, $docfile) = upload($postname, $directory, $filename, $extensions, $size);
    //Insert a title and file and document name into the database  
   if($db->query("INSERT INTO documents(title,doc_path,created) VALUES('$title','$docfile', NOW())"))
    {
       //Redirect a user to log in page
       header('Location: kms.php?p=document_display');
    }else{
      //Display an error message
       display_error();
    }
}

//Display document upload from
echo "<h2>Add Documents</h2>
          <form action='document_upload.php' method='POST' enctype='multipart/form-data'>
            <div class='form-group'>
              <label for='inputTitle' class='control-label'>Title</label>
              <input type='text' name='title' class='form-control' id='title' required>
            </div>
            <div class='alert alert-warning alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <strong>Attention!</strong> Please upload only PDF documents. 
            </div>
            <div class='form-group'>
              <label for='file' class='control-label'>Document</label>
              <input type='file' name='doc' required>
            </div>
            <div class='form-group'>
              <input type='hidden' name='user_id' class='form-control' id='user_id' value='$user_id'>
            </div>
            <div class='form-group'>
              <button type='submit' name='btn-record' class='btn btn-success'>Upload</button>
            </div>
        </form>";   
?>