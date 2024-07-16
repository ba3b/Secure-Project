<?php
session_start(); 
require('../../backendPart/config.php');

$userType =$_POST["userType"];
$firstName = $_POST["firstName"];
$lastName =  $_POST["lastName"];
$email= $_POST["email"];
$phonenumber = $_POST["phoneNumber"];
$userName = $_POST["userName"];
$password= $_POST["password"];
$department = $_POST["department"];
$managerName= "Bobby";
$currentSessionUserName = $_SESSION["USERNAME"];

if ($userType == "manager")
{

$sql = "INSERT INTO staff(FName ,LName,sEmail,PhoneNumber,St_UserName,St_Password,Department,AdminID)
VALUES ('$firstName',' $lastName','$email','$phonenumber','$userName','$password'
,'$department',(SELECT admin.AdminID FROM admin WHERE admin.A_UserName ='$currentSessionUserName'))";

if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records created successfully manager</h3>";
    header("Location: usersList.php"); 
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}
 if ($userType == "employee")
{

$sql = "INSERT INTO staff(FName ,LName,sEmail,PhoneNumber,St_UserName,St_Password,Department,AdminID)
VALUES ('$firstName',' $lastName','$email','$phonenumber','$userName',
'$password','$department',(SELECT Admin.AdminID FROM  Admin WHERE A_UserName = '$currentSessionUserName'))";

$sql1="INSERT INTO manager(manager_ID,StaffID)
VALUES ((SELECT staffID FROM staff WHERE St_UserName  = '$managerName')
,(SELECT StaffID FROM staff WHERE St_UserName = '$userName'))";

if (mysqli_multi_query($conn, $sql)) {
    echo "<h3>New records created successfully employee employee</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  if (mysqli_multi_query($conn, $sql1)) {
    echo "<h3>New records created successfully manager table</h3>";
    header("Location: usersList.php"); 
  } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
  }

}


mysqli_close($conn);

?>