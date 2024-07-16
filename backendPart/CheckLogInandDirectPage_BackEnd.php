<?php 
session_start(); // Start up your PHP Session
 
require('config.php');//read up on php includes https://www.w3schools.com/php/php_includes.asp

// username and password sent from form
$myusername=htmlspecialchars($_POST["userName"]);
$mypassword=hash('sha256', htmlspecialchars($_POST["password"]));
$mySecret=hash('sha256', htmlspecialchars($_POST["SecCode"]));


//this part is to check if there is exsiting row for these table (employee && admin)
//for the admin table
$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
if($_SESSION['token'] == $token){

//  this is for employee table 
// this will only return the employee who is not managers
$employeeTable="SELECT * FROM staff
WHERE St_UserName = ? AND St_Password = ? AND SecureCode = ?";

$stmt = $conn->prepare($employeeTable); 
$stmt->bind_param("sss", $myusername, $mypassword, $mySecret);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$employeeTableRows = $result->fetch_assoc();

$employeeTableCount= mysqli_num_rows($result);



if ($employeeTableCount==1)
{
    
    echo "test successful"; 
    $_SESSION["Login"] = true;
    $_SESSION["USERNAME"] = isset($employeeTableRows['St_UserName']) ? $employeeTableRows['St_UserName']:'UnKnown';
    $_SESSION["FIRSTNAME"] =isset($employeeTableRows['FName']) ? $employeeTableRows['FName']:'UnKnown'; 
    $_SESSION["LASTNAME"] = isset($employeeTableRows['LName']) ? $employeeTableRows['LName']:'UnKnown';
    $_SESSION["EMAIL"] = isset($employeeTableRows['sEmail']) ? $employeeTableRows['sEmail']:'UnKnown';
    $_SESSION["PHONENUMBER"] = isset($employeeTableRows['PhoneNumber']) ? $employeeTableRows['PhoneNumber']:'UnKnown';
    $_SESSION["LEVEL"] =3;
    $_SESSION["STAFFID"] = $employeeTableRows["StaffID"];

    //this will be for the staff main page
    header("Location: ../StaffPage/orderPage.php");
}
else{
    
    $_SESSION["Login"] = false;

    echo '<script type ="text/JavaScript">';  
echo 'alert("Wrong email or password")'; 
echo '</script>';  
    
    header("Location: ../System_logIn.php");
}
}
else
{
    echo '<script type ="text/JavaScript">';  
echo 'alert("No CSRF")'; 
echo '</script>';  

    header("Location: ../System_logIn.php");
}



	

 mysqli_close($conn);

?>
