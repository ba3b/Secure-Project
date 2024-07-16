<?php 
session_start(); // Start up your PHP Session
 
require('backendPart/config.php');

$_SESSION['_token'] = md5(uniqid(mt_rand(), true));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

  <title>Sginup Page</title>

  <script>
    function validate1() {

      if (document.forms["signupForm"]["userName"].value == "") {
        alert("Please provide your Username!");
        document.forms["signupForm"]["userName"].email.focus();
        return false;
      }
      if (document.forms["signupForm"]["password"].value == "") {
        alert("Please Enter your Password!");
        document.forms["signupForm"]["password"].focus();
        return false;
      }
      if (document.forms["signupForm"]["ConPass"].value != document.forms["signupForm"]["password"].value || document
        .forms["signupForm"]["ConPass"].value == "") {
        alert("Please Enter the same Password!");
        document.forms["signupForm"]["ConPass"].focus();
        return false;
      }


      return (true);
    }
  </script>
</head>

<body class="bg-light">

  <div class="container-fluid mt-5 ">
    <div class="row justify-content-center">
      <div class="col-md-5 p-5 border border-danger shadow-lg">

        <form action="backendPart/CheckSignup.php" method="POST" name="signupForm" onsubmit="return(validate1());">
        <h5 class="text-center text-primary">Sign Up</h5>  
        <div class="form-group mb-3">
            <label id="UserLable">First Name:</label>
            <input type="text" class="userNameInput form-control mb-3" name="FName" placeholder="First Name">
          </div>
          <div class="form-group mb-3">
            <label id="UserLable">Last Name:</label>
            <input type="text" class="userNameInput form-control mb-3" name="LName" placeholder="Last Name">
          </div>
          <div class="form-group mb-3">
            <label id="UserLable">E-Mail id:</label>
            <input type="text" class="userNameInput form-control mb-3" name="Email" placeholder="E-Mail">
          </div>
          <div class="form-group mb-3">
            <label id="UserLable">User Name:</label>
            <input type="text" class="userNameInput form-control mb-3" name="userName" placeholder="userName">
          </div>
          <div class="form-group mb-3">
            <label>Password:</label>
            <input type="password" class="PasswordInput form-control mb-3" name="password" placeholder="Enter Your Password">
          </div>
          <div class="form-group mb-3">
            <label>Confirm password:</label>
            <input type="password" class="PasswordInput form-control mb-3" name="ConPass" placeholder="Confirm Your password">
          </div>
          <div class="form-group mb-3">
            <label>Your Pin Code:</label>
            <input type="text" class="form-control mb-3" name="SecCode" placeholder="Enter your pin code">
          </div>
          <input type="hidden" name="token" value="<?php echo $_SESSION['_token'] ?? '' ?>">

          <input type="submit" value="Submit" class="btn btn-primary w-100" id="subnitButton" />

        </form>

      </div>
    </div>
  </div>
</body>

</html>