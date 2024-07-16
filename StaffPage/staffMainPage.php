<?php 

session_start(); 
require('../backendPart/config.php');

?>


<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>    
      <title>Staff Main Page</title>           
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>orderPage</title>
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
      <li class="nav-item"><a class="nav-link active" href="staffMainPage.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="ViewProfilePageStaff/ViewProfilestaff.php"></i>Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
      <li class="nav-item"><a class="nav-link" href="../Logout.php">Logout</a></li>
    </ul>
  </div>
</div>
                
                           
<div class="container">
  
<h2><span class="text-center title">Orders History</span></h2>
 <table id="example" class="table table-border responsive-table ">
 <thead>
<tr>
    <th width="50">Application ID</th>
    <th width="120">Leave Type</th>
    <th width="120">From</th>
    <th width="120">To</th>
    <th width="120">Requesting Date </th>
    <th width="120">Status</th>
    </tr>
    </thead>
                                 
    <tbody>
    <?php


    $temp = $_SESSION["USERNAME"];
    $tempdata= "SELECT leavingapplication.AppID,leavingapplication.leavingReason, 
    leavingapplication.BeginingDate, leavingapplication.EndingDate, leavingapplication.RequestTime, 
    leavingapplication.applicationStatus FROM leavingapplication INNER JOIN staff ON staff.StaffID = leavingapplication.StaffID
    WHERE staff.St_UserName ='$temp'";

$records = mysqli_query($conn,$tempdata); // fetch data from database


while($dataset = mysqli_fetch_array($records) )
{
  if(isset( $dataset['applicationStatus']) && $dataset['applicationStatus'] =="approved")
  {
    $colorOfstauts = "blue";
    $statusVariable = $dataset['applicationStatus'];
  }
  else if (isset( $dataset['applicationStatus']) && $dataset['applicationStatus'] =="Not Approve"){
    $colorOfstauts = "red";
    $statusVariable = $dataset['applicationStatus'];
  }
  else{
    $colorOfstauts = "black";
    $statusVariable = "waiting descision";
  }
?>
    <tr>
    <td><?php echo $dataset['AppID'];?></td>
    <td><?php echo $dataset['leavingReason'];?></td>
    <td><?php echo $dataset['BeginingDate'];?></td>
    <td><?php echo $dataset['EndingDate'];?></td>
    <td><?php echo $dataset['RequestTime'];?></td>
     
    <td><span style="color: <?php echo $colorOfstauts;?>"><?php echo $statusVariable;?></span></td>
          
    </tr>
                                           
<?php }?>
 
</tbody>
</table>

<form action="leaveFormToAdd/leaveFormfrontend.php">
<button class="button button1">Add New Application</button>  
</form>

      
</div>
      
<?php  
mysqli_close($conn);?>
</body>
</html>