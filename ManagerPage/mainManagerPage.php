<?php 

session_start(); 
require('../backendPart/config.php');

  if (isset($_POST['old'])) {
    $_SESSION["Sorting"] ="old"; 
  }else if (isset($_POST['new'])){
   $_SESSION["Sorting"] ="new"; 
  }

  if(isset($_POST['searchWord'])){
    $_SESSION['Search'] = $_POST['searchWord'];
  }
  else{
    $_SESSION['Search'] = null;
  }

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body class="bg-light">
 
    <!-- SIDE MENU BAR BUTTON -->
    <button class="btn btn-warning m-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        <i class="bi bi-list fa-2x" style="font-size: 30px"></i>
    </button>

    <!-- SIDE MENU -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-light">
            <ul class="nav flex-column" style="font-size:30px;">
                <li class="nav-item"><a class="nav-link active" href="/mainManagerPage.php">Home</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="ViewProfilePageManager/ViewProfile.php"></i>Profile</a></li>
           
                <li class="nav-item"><a class="nav-link" href="../Logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

         <div class="container">     
 
  
<h2 class="text-center text-primary">Latest Leave Applications</h2>
<br>
<br>
 <form method="post">
<input type="text" name ="searchWord" id="myInput" onkeyup="myFunction1()" placeholder="Search for names..." title="Type in a name">
<button name ="search" style="border : none; background-color: #f1f1f1; 
    font-size: 17px; border-bottom: solid 1px black; margin-top : 3px; width: 10%;">Search</button>
</form>

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
    <th>Leave Type</th>
    <th onclick="myFunction()">Requesting Date</th>
    <th>Status</th>
    <th>Action</th>
    <th>Description</th>
  </tr>


  <?php
if ($_SESSION["Sorting"] =="new" && $_SESSION["Search"] == null){
$records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
 leavingapplication.leavingReason,
 leavingapplication.RequestTime,leavingapplication.applicationStatus, leavingapplication.applicationDescription
FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
ORDER BY leavingapplication.RequestTime DESC"); // fetch data from database
}
else if($_SESSION["Sorting"] =="new" && isset($_SESSION["Search"])){
  $search = $_SESSION['Search'];
  $records = mysqli_query($conn,"SELECT CONCAT_WS(' ', staff.FName , staff.LName)AS fullName, leavingapplication.AppID, leavingapplication.leavingReason, leavingapplication.RequestTime,leavingapplication.applicationStatus
  , leavingapplication.applicationDescription
  FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID WHERE UPPER(CONCAT_WS(' ', staff.FName , staff.LName)) LIKE UPPER('%$search%')
  ORDER BY leavingapplication.RequestTime DESC");

}

if ($_SESSION["Sorting"] =="old" && $_SESSION['Search'] == null){
  $records = mysqli_query($conn,"SELECT leavingapplication.AppID , CONCAT_WS(' ', staff.FName , staff.LName) AS fullName,
   leavingapplication.leavingReason,
   leavingapplication.RequestTime,leavingapplication.applicationStatus, leavingapplication.applicationDescription
  FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
  ORDER BY leavingapplication.RequestTime ASC"); // fetch data from database
  }
  else if ($_SESSION["Sorting"] =="old" && isset($_SESSION['Search'])){
    $search = $_SESSION['Search'];
    $records = mysqli_query($conn,"SELECT CONCAT_WS(' ', staff.FName , staff.LName)AS fullName, leavingapplication.AppID, leavingapplication.leavingReason, leavingapplication.RequestTime,leavingapplication.applicationStatus
    , leavingapplication.applicationDescription
    FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID WHERE UPPER(CONCAT_WS(' ', staff.FName , staff.LName)) LIKE UPPER('%$search%')
    ORDER BY leavingapplication.RequestTime ASC");
  
    }


while($data = mysqli_fetch_array($records))
{
  if(isset( $data['applicationStatus']) && $data['applicationStatus'] =="approved")
  {
    $colorOfstauts = "blue";
    $statusVariable = $data['applicationStatus'];
  }
  else if (isset( $data['applicationStatus']) && $data['applicationStatus'] =="Not Approve"){
    $colorOfstauts = "red";
    $statusVariable = $data['applicationStatus'];
  }
  else{
    $colorOfstauts = "black";
    $statusVariable = "waiting descision";
  }
?>

  <tr>
     <td> <b><?php echo $data['AppID']; ?></b></td>
     <td><?php echo $data['fullName'];?></td>
     <td><?php echo $data['leavingReason'];?><</td>
     <td><?php echo $data['RequestTime'];?></td>    
      <td><span style="color: <?php echo $colorOfstauts;?>"><?php echo $statusVariable;?></span></td>
         <td><button class="btn btn-primary">Approve</button>
           <button class="btn btn-primary">Not Approve</button></td>
           <td><?php echo $data['applicationDescription'];?></td>  
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

</div>
</body>
</html>
 