<?php 
session_set_cookie_params(time()+600,'/','localhost',false,true);

session_start(); // Start up your PHP Session
 session_regenerate_id(true);
require('backendPart/config.php');


$_SESSION['token'] = md5(uniqid(mt_rand(), true));


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $name = $_POST['userName'];
    $email = $_POST['email'];
    $SecCode = $_POST['SecCode'];

    $sql = "SELECT `A_Password` FROM `admin` where `A_UserName`='$name' AND `sEmail`='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo "<script> alert( 'Your Password is : ".$row["A_Password"]."');</script>";
    $conn->close();
    }
    else
    {
        echo "<script>alert('No Record found or invalid data.');</script>";
    }
}
else
{
    echo "fresh";
}


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
    <title>Log In Page</title>


</head>

<body class="bg-light">

    <div class="container-fluid mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 p-5 border border-danger shadow-lg">

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginForm">
                    <h5 class="text-center text-danger">Recover Password</h5>
                    <div class="form-group mb-3">
                        <label id="UserLable" class="mb-2">User Name:</label>
                        <input type="text" class="userNameInput form-control mb-3" name="userName"
                            placeholder="userName" required>
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Email: </label>
                        <input type="email" class="form-control" name="email"
                            placeholder="Enter Your Email ID" required>
                    </div>

                    <div class="form-group clearfix mt-3">
                        <label class="mb-3">Your Pincode: </label>
                        <input type="password" class="mb-3 form-control" name="SecCode"
                            placeholder="Enter Your Pin Code :" required>
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                    </div>

                    <input type="submit" value="submit" class="btn btn-primary w-100 mb-5" id="subnitButton" />

                </form>

                <div class="text-center">

                    <a href="Signup_screen.php"> Sign In</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="Signup_screen.php"> Sign
                        Up </a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>