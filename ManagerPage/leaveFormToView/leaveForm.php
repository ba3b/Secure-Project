<!DOCTYPE html>
<html lang="en">
<head>
    <title>leave Form</title>
</head>
<body>
    <?php
    session_start();
    require_once ("config.php");

    $reqDate = $_POST["timeOff"];
    $begDate = $_POST["beginOn"];
    $endDate = $_POST["endOn"];
    $leaveReason = $_POST["leaveReason"];
    $username = $_SESSION["USERNAME"];

    $sql = "INSERT INTO leavingapplication(RequestTime,BeginingDate,EndingDate,leavingReason,StaffID)
     VALUES ('$reqDate','$begDate','$endDate','$leaveReason',(SELECT StaffID FROM staff  WHERE St_UserName = '$username'))";
   

  //here will be directed to another page will display message then after a period of time it will tranfer him 
  //to the main page
    if (mysqli_query($conn, $sql)) {
    echo "<br> application inserted successfully";
  }
   else 
  {
    echo "Error insert application: " . mysqli_error($conn);
  }
    ?>
    
</body>
</html>