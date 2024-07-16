<?php 
session_start(); // Start up your PHP Session
 
require('config.php');//read up on php includes https://www.w3schools.com/php/php_includes.asp

$myusername=htmlspecialchars($_POST["userName"]);
$mypassword=hash('sha256', htmlspecialchars($_POST["password"]));
$fName=htmlspecialchars($_POST["FName"]);
$lName=htmlspecialchars($_POST["LName"]);
$email=htmlspecialchars($_POST["Email"]);
$mySecret=hash('sha256', htmlspecialchars($_POST["SecCode"]));


$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
if($_SESSION['_token'] == $token){

    $sql = "Insert into staff (AdminID, St_UserName, St_Password, FName, LName, sEmail, SecureCode) Values (1, ?, ?, ?, ?, ?, ?)";
    $state = $conn->prepare($sql);
    $state->bind_param("ssssss", $myusername, $mypassword, $fName, $lName, $email, $mySecret);

        $state->execute();

        mysqli_close($conn);
        header("location: ../System_logIn.php");

}
else{
    echo "no CSRF";
}

?>