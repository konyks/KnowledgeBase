<?php
// term_modify.php - modifies a particular term
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');
require('landing.php');

if(isset($_GET['id'])){
  $id=$_GET['id'];
}

if(isset($_GET['action'])){
  $action=$_GET['action'];
}

if($action == "Delete"){
  $query = "DELETE FROM glossary WHERE id='$id'";

 if($db->query($query))
      {
          header('Location: kms.php?p=glossary');

      }else{
          //Display an error message
          echo "
              <div class='alert alert-danger'>
                <strong>Ooops: </strong> Something went wrong. System is expiriencing technical dificalties. Please try again!
              </div>";
      }

}

if($action == "Edit"){
    $query = "SELECT id, term, definition FROM glossary WHERE id='$id'";
    $result = mysqli_fetch_array(mysqli_query($db, $query));

    $term = $result['term'];
    $def = $result['definition'];

    if(!empty($_POST))
    {
           $term = $_POST['term'];
           $def = $_POST['def'];
           $id = $_POST['id'];
           echo $term;

        //DO UPDATE State ment here
          if($db->query("UPDATE glossary SET term='$term', definition='$def' WHERE id='$id'"))
          {
            //TODO: Figure out the way to display a message to a user that it was recordedsssssssss
              //Redirect a user to log in page
              header('Location: kms.php?p=glossary');
          }else{
              //Display an error message
              echo "
                  <div class='alert alert-danger'>
                    <strong>Ooops: </strong> Something went wrong. System is expiriencing technical dificalties. Please try again!
                  </div>";
          }
    }

    //Output the edit form
    echo "
        <h2>Enter New Term</h2>
          <form method='POST' data-toggle='validator' role='form'>
            <div class='form-group'>
              <label for='inputTerm' class='control-label'>Term</label>
              <input type='text' name='term' class='form-control' id='term' value='$term' required>
            </div>
            <div class='form-group'>
              <label for='def'>Definition</label>
              <textarea class='form-control' name='def' rows='5' id='def'>$def</textarea>
            </div>
            <div class='form-group'>
              <input type='hidden' name='id' class='form-control' id='id' value='$id'>
            </div>
            <div class='form-group'>
              <button type='submit' name='btn-record' class='btn btn-success'>Edit</button>
            </div>
          </form>";  

}

if($action == "Add"){
    if(isset($_POST['btn-record']))
    {
           $term = $_POST['term'];
           $def = $_POST['def'];

           $query = "SELECT * FROM glossary 
                     WHERE term = '$term'";
           $result = $db-> query($query);

           if($result->num_rows === 0){
               if($db->query("INSERT INTO glossary(term,definition) VALUES('$term','$def')"))
                {
                   header('Location: kms.php?p=glossary');
                }else{
                  //Display an error message
                   echo "
                      <div class='alert alert-danger'>
                           <strong>Ooops: </strong> Something went wrong. System is expiriencing technical dificalties. Please try again!
                      </div>";
                }

           }else{
                  //Display an erorr message
               echo "
                  <div class='alert alert-danger'>
                       <strong>Ooops: </strong> Term '$term' is already in the system Glossary!
                  </div>";
           }
    }


    //Output the sign in form
    echo "
        <h2>Enter New Term</h2>
          <form method='POST' data-toggle='validator' role='form'>
            <div class='form-group'>
              <label for='inputTerm' class='control-label'>Term</label>
              <input type='text' name='term' class='form-control' id='term' placeholder='Enter Term' required>
            </div>
            <div class='form-group'>
              <label for='def'>Definition</label>
              <textarea class='form-control' name='def' rows='5' id='def'></textarea>
            </div>
            <div class='form-group'>
              <button type='submit' name='btn-record' class='btn btn-success'>Record</button>
            </div>
          </form>";
}
?>