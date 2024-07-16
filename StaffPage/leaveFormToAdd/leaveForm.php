<!DOCTYPE html>
<html lang="en">
<head>
    <title>leave Form</title>
</head>
<body>
    <?php
    session_start();
    require("../../backendPart/config.php");
    
    $reqDate = $_POST['timeOff'];
    $begDate = $_POST["beginOn"];
    $endDate = $_POST["endOn"];
    $leaveReason = $_POST["leaveReason"];
    $description = $_POST["description"];
    $username = $_SESSION["USERNAME"];

    $sql = "INSERT INTO leavingapplication(RequestTime,BeginingDate,EndingDate,leavingReason,applicationDescription,StaffID)
     VALUES ('$reqDate','$begDate','$endDate','$leaveReason','$description',(SELECT StaffID FROM staff  WHERE St_UserName = '$username'))";
   

  //here will be directed to another page will display message then after a period of time it will tranfer him 
  //to the main page
    if (mysqli_query($conn, $sql)) {
    echo "<br> application inserted successfully";
    echo "<br> Wait a second we will direct you to the main page";
    header( "refresh:2;url=../staffMainPage.php" );
  
  }
   else 
  {
    echo "Error insert application: " . mysqli_error($conn);
    header( "refresh:5;url=../staffMainPage.php" );
  }

    ?>
    
</body>
</html>