<?php 
session_set_cookie_params(time()+600,'/','localhost',false,true);

session_start(); // Start up your PHP Session
 session_regenerate_id(true);
require('backendPart/config.php');


$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Log In Page</title>

    <script>
 
        function validate()
        {
            
           if( document.forms["loginForm"]["userName"].value == "" )
           {
             alert( "Please provide your username!" );
             document.forms["loginForm"]["userName"].focus() ;
             return false;
           }
           if( document.forms["loginForm"]["password"].value == "" )
           {
             alert( "Please Enter your Password!" );
             document.forms["loginForm"]["password"].focus() ;
             return false;
           }
       
          
           return( true );
        }
         
        </script>
</head>
<body class="bg-light">
    
    <div class="container-fluid mt-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-md-4 p-5 border border-danger shadow-lg">

      
        <form action="backendPart/CheckLogInandDirectPage_BackEnd.php" method="POST" name = "loginForm" onsubmit="return(validate());" >
        <h5 class="text-center text-primary">Sign In</h5>    
        <div class="form-group mb-3">
          <label id="UserLable" class="mb-2">User Name:</label>
          <input type="text" class="userNameInput form-control mb-3" name="userName" placeholder="userName">
          </div>
          
           <div class="form-group">  
          <label class="mb-2">Password: </label> 
          <input type="password" class="PasswordInput form-control" name="password" placeholder="Enter Your Password">
          <a href="recover_password.php" class="mb-3 text-end float-end">Recover Password</a>
          </div>     
        
          <div class="form-group clearfix mt-3"> 
          <label class="mb-3">Your Pincode: </label> 
          <input type="password" class="mb-3 form-control" name="SecCode" placeholder="Enter Your Pin Code :">
          <input type="hidden" name = "token" value = "<?php echo $_SESSION['token'] ?? '' ?>">
          </div> 
           
          <input type="submit" value="Submit" class="btn btn-primary w-100" id="subnitButton"/>
          
        </form>

        <div>
          <p class="mb-2 mt-5">If you don't have account please signup through below link</p>
          <a href="Signup_screen.php"> Create new account </a>
        </div>

       </div>
      </div>
      </div>
</body>

</html>