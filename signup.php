<?php 
// signup.php - signes a user up for an accountß
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');

if(!empty($_POST))
{
   $username = $db->real_escape_string($_POST['username']);
   $email = $db->real_escape_string($_POST['email']);
   $password = md5($db->real_escape_string($_POST['password']));

   //User_type 0 is a regular user (Administrator user type = 1)
   $user_type = 0;

   //Active user is 1 and not active is 0
   $state = 1;
   
   if($db->query("INSERT INTO users(username,email,password,user_type, state) VALUES('$username','$email','$password', '$user_type', '$state')"))
   {
       //Redirect a user to log in page
       header('Location: kms.php');
   }
   else
   {
      //Display a erorr message
       echo "
          <div class='alert alert-danger'>
               <strong>Ooops: </strong> You are already registered!
          </div>";
   }
}

//Display Registration form
echo "
  <h2>Sign Up</h2>
  <form method='POST' data-toggle='validator' role='form'>
    <div class='form-group'>
      <label for='username' class='control-label'>Username</label>
      <input type='text' name='username' class='form-control' id='username' placeholder='Enter Username' required>
    </div>
    <div class='form-group'>
      <label for='email' class='control-label'>Email</label>
      <input type='email' name='email' class='form-control' id='email' placeholder='Enter Email' data-error='Email address is invalid' required>
      <div class='help-block with-errors'></div>
    </div>
    <div class='form-group'>
          <label for='pwd'>Password:</label>
          <input type='password' name='password' data-minlength='6' class='form-control' id='password' placeholder='Password' required>
          <span class='help-block'>Minimum of 6 characters</span>
    </div>
    <div class='form-group'>
    <button type='submit' name='btn-register' class='btn btn-success'>Register</button>
    </div>
  </form>
";
?>

