<?php 

session_start(); 
require('../../backendPart/config.php');



?>

<!DOCTYPE html>

<head>

    <title>Users List</title>
    <link rel="stylesheet" href="../../frontEndCssFiles/AdminStatffusersList.css">

</head>

<script>
 
 function validate()
 {
    if( document.addStaff.firstName.value == "" )
    {
      alert( "Please provide first name!" );
      document.addStaff.firstName.focus() ;
      return false;
    }
    if( document.addStaff.lastName.value == "" )
    {
      alert( "Please provide last name!" );
      document.addStaff.lastName.focus() ;
      return false;
    }
    if( document.addStaff.email.value == "" )
    {
      alert( "Please provide email!" );
      document.addStaff.email.focus() ;
      return false;
    }
    if( document.addStaff.phoneNumber.value == "" )
    {
      alert( "Please provide phoneNumber!" );
      document.addStaff.phoneNumber.focus() ;
      return false;
    }
    if( document.addStaff.department.value == "" )
    {
      alert( "Please provide department!" );
      document.addStaff.department.focus() ;
      return false;
    }
    if( document.addStaff.userName.value == "" )
    {
      alert( "Please provide userName!" );
      document.addStaff.userName.focus() ;
      return false;
    }
    if( document.addStaff.password.value == "" )
    {
      alert( "Please provide password!" );
      document.addStaff.password.focus() ;
      return false;
    }
    if( document.addStaff.userType.value == "" )
    {
      alert( "Please provide user Type!" );
      document.addStaff.userType.focus() ;
      return false;
    }
    return( true );
 }
  
 </script>

<body>


 <div class="navbar">
    
     <a class="active" href="../mainAdminPage.php"><i class="fa fa-fw fa-home"></i> Home</a>
     <a>List of staff </a>
 </div>
 <br>
 <br>
 <br>

 <h2><span class="title">List of staff</span></h2>


   <form name="list_form" action="post">
       <table width="400" id="theList">
       <tbody id="listBody">
           <tr>
               <th align="center">First Name</th><th align="center">Last Name</th><th align="center">E-mail</th>
               <th align="center">Phone Number</th><th align="center">Department</th><th align="center">User Name</th>
               <th align="center">Password</th>
           </tr>
  
  
  <?php
$records = mysqli_query($conn,"
SELECT StaffID , FName,LName,sEmail,PhoneNumber,Department,St_UserName,St_Password 
FROM staff"); // fetch data from database

while($data = mysqli_fetch_array($records))
{

?>
           <tr>

             <td><info><?php echo $data['FName'];?></info></td>
             <td><info><?php echo $data['LName'];?></info></td>
             <td><info><?php echo $data['sEmail'];?></info></td>
             <td><info><?php echo $data['PhoneNumber'];?></info></td>
             <td><info><?php echo $data['Department'];?></info></td>
             <td><info><?php echo $data['St_UserName'];?></info></td>
             <td><info><?php echo $data['St_Password'];?></info></td>
             <td></td>
           </tr>
           <?php
  }
  ?>
       </tbody>
       </table>
   </form>

   <form name="addStaff" action = "addStaffBackEnd.php"method="post" onsubmit="return(validate());">
       <br><br><br><br>
       <h2><span class="title">Add new staff</span></h2>
       <table width="400" id="thatlist">
       <tbody id="addTable">
           <tr>
               <th align="center">First Name</th>
               <th align="center">Last Name</th>
               <th align="center">E-mail</th>
               <th align="center">Phone Number</th>
               <th align="center">Department</th>
               <th align="center">User Name</th>
               <th align="center">Password</th>
               <th align="center">User Type</th>
           </tr>
           <tr id="hi">
             <td><input type="text" maxlength="10" size="15" name ="firstName"></td>
             <td><input type="text" maxlength="10" size="15" name ="lastName"></td>
             <td><input type="email" maxlength="20" size="20" name ="email" placeholder="example@xds.com"></td>
             <td><input type="number" maxlength="10" size="15" name ="phoneNumber"></td>
             <td><input type="text" maxlength="10" size="15" name ="department"></td>
             <td><input type="text" maxlength="10" size="15" name ="userName"></td>
             <td><input type="text" maxlength="10" size="15" name ="password"></td>
             <td><input type="text" maxlength="10" size="15" name ="userType" placeholder="manager/employee"></td>
             <td><input type="submit" value="Add new Staff" ></td>
           </tr>
           </tbody>
           </table>

   </form>



   </div>
</div>
<?php  mysqli_close($conn);?>
</body>
