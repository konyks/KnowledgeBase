<?php 
// signin.php - signs a user into the system
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');

if(!empty($_POST))
{
   $username = $db->real_escape_string($_POST['username']);
   $password = $db->real_escape_string($_POST['password']);

   $query = "SELECT * FROM users WHERE username='$username'";
   $row = mysqli_fetch_array(mysqli_query($db, $query));

   if ($row['state'] == 1){
      if($row['password']==md5($password))
     {
        $_SESSION['user'] = $row['user_id'];
        $_SESSION['name'] = $row['username'];
        $_SESSION['type'] = $row['user_type'];
        $logon = TRUE;

        //Redirect a user to the home page
        header('Location: kms.php?p=home');
     }
     else
     {
      //Display a erorr message
         echo "
            <div class='alert alert-danger'>
                 <strong>Ooops: </strong> Your password or username did not match our system. Please try again!
            </div>";
     }
   }
   else{
        //Display a erorr message
       echo "
          <div class='alert alert-danger'>
               <strong>Error </strong> Your user account is inactive. Please conntect your administrator!
          </div>";
   }
}

//Output the sign in form
echo "
    <h2>Log In</h2>
      <form method='POST' data-toggle='validator' role='form'>
        <div class='form-group'>
          <label for='inputName' class='control-label'>Username</label>
          <input type='text' name='username' class='form-control' id='username' placeholder='Enter User' required>
        </div>
        <div class='form-group'>
              <label for='pwd'>Password:</label>
              <input type='password' name='password' data-minlength='6' class='form-control' id='password' placeholder='Password' required>
        </div>
        <div class='form-group'>
        <button type='submit' name='btn-login' class='btn btn-success'>Sign In</button>
        </div>
      </form>
      <h4>Dont Have an Account Yet?   <a href='kms.php?p=signup' class='btn btn-primary' role='button'>Sign Up</a></h4>";
?>