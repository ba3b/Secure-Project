<?php

session_start();
require('../../backendPart/config.php');
if (isset($_POST['old'])) {
  $_SESSION["Sorting"] ="old"; 
}else if (isset($_POST['new'])){
 $_SESSION["Sorting"] ="new"; 
}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<link rel="stylesheet" href="../../frontEndCssFiles/ManagerPageStyles.css">

</head>
<body>

<div class="navbar">
    <a class="active" href="../mainAdminPage.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a>Admin - Leave Applications List</a>
</div>

 <br>
<h2><span class="title">Leave Applications List</span></h2>
<br>
<br>

<div class="dropdown">
  
  <button onclick="myFunction()" class="dropbtn" >Sort by</button>
  <div id="myDropdown" class="dropdown-content">
    <form method="post">
    <button name ="new" style="border : none; background-color: #f1f1f1; 
    font-size: 17px; border-bottom: solid 1px black; margin-top : 3px; width: 100%;">New request</button>
    <button name ="old"  style="border : none; background-color: #f1f1f1; 
    font-size: 17px; border-bottom: solid 1px black; margin-top : 3px; width: 100%;" >Old request</button>
    </form>
  </div>
</div>

<table id="myTable">
  <tr>

    <th>Application ID</th>
    <th>Employe Name</th>
    <th>Leaving  Reason</th>
    <th onclick="myFunction()">Requesting Date</th>
    <!-- <th>Details</th> -->
  </tr>


  <?php
if ($_SESSION["Sorting"] =="new" ){
  $records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
   leavingapplication.leavingReason,
   leavingapplication.RequestTime,leavingapplication.applicationStatus, leavingapplication.applicationDescription
  FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
  ORDER BY leavingapplication.RequestTime DESC"); // fetch data from database
  }
  if ($_SESSION["Sorting"] =="old"){
    $records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
     leavingapplication.leavingReason,
     leavingapplication.RequestTime,leavingapplication.applicationStatus, leavingapplication.applicationDescription
    FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
    ORDER BY leavingapplication.RequestTime ASC"); // fetch data from database
    }
// $records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
//  leavingapplication.leavingReason,
//  leavingapplication.RequestTime,leavingapplication.applicationStatus
// FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
// ORDER BY leavingapplication.RequestTime ASC"); // fetch data from database

while($data = mysqli_fetch_array($records))
{

?>

  <tr>
     <td> <b><?php echo $data['AppID']; ?></b></td>
     <td><?php echo $data['fullName'];?></td>
     <td><?php echo $data['leavingReason'];?><</td>
     <td><?php echo $data['RequestTime'];?></td>
           <!-- <td><a href="leave-details.php?leaveid=10" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a></td> -->
  </tr>
  <?php
  }
  ?>

</table>

<script>


function myFunction1() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}


function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}





</script>
<?php  mysqli_close($conn);?>
</body>
</html>
