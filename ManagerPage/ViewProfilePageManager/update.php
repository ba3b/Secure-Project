<?php
    session_start();
    require_once('../../backendPart/config.php');

            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $phoneNo =$_POST["phoneNo"];


 
       if(!empty($fname) && !empty($lname) && !empty( $email) && !empty($phoneNo)) {
            
               $query =  "UPDATE Staff
                     SET FName = '$fname',
                         LName= '$lname' ,
                         sEmail ='$email' ,
                         PhoneNumber ='$phoneNo'
                         WHERE St_UserName = '{$_SESSION['USERNAME']}'";

                        
                         $_SESSION["FIRSTNAME"] = $fname;
                         $_SESSION["LASTNAME"] = $lname;
                         $_SESSION["EMAIL"]= $email;
                         $_SESSION["PHONENUMBER"] = $phoneNo;
                        

                         
            
                         if (mysqli_query($conn, $query)) {
                            echo "<br> Data Updated successfully";
                          
                          }
                           else 
                          {
                            echo "Error Update Data!" . mysqli_error($conn);
                          }


                          header("refresh:2; url = ViewProfile.php");
          

                        }
         else{
             echo "All Fields Required!";
             header("refresh:2; url = ViewProfile.php");
         }


    ?>