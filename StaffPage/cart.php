<?php 

session_start(); 
session_regenerate_id(true);
require('../backendPart/config.php');
 if(!isset($_SESSION["Login"])){
     header("HTTP/1.1 404 Unauthorized");
     header("Location: ../404Page.php");
       exit;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
    <title>Pizza order</title>
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
        <li class="nav-item"><a class="nav-link " href="orderPage.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="ViewProfilePageStaff/ViewProfilestaff.php"></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="../Logout.php">Logout</a></li>
      </ul>
    </div>
  </div>


<div class="container mt-5 mb-5">
        <label for="table"><h3>Your Products</h3></label>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col"></th> -->
                    <th scope="col">Pizza Name</th>
                    <th scope="col">Pizza ID</th>
                    <th scope="col">Total Price</th>
                    <!-- <th scope="col">Status</th>
                    <th scope="col">Complete</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $staff = $_SESSION["STAFFID"];
                $sql = 'SELECT * from cart inner join pizza using (PizzaID) where StaffID = '.$staff.';';

                $resultOrder = mysqli_query($conn, $sql);

                $counter = 1;
                $totalPrice = 0;

                while ($rowOrder = mysqli_fetch_assoc($resultOrder)) {
                ?>              
                    <tr>
                            <th scope="row"><?php echo $counter; ?></th>
                            <!-- <td><?php echo $rowOrder['CartID']; ?></td> -->
                            <td><?php echo $rowOrder['Name']; ?></td>
                            <td><?php echo $rowOrder['PizzaID']; ?></td>
                            <td><?php echo $rowOrder['Price']; ?> RM</td>
                        
                <?php
                    $totalPrice = $totalPrice + $rowOrder['Price'];
                    $counter = $counter + 1;
                }
                ?>
            </tbody>
        </table>
    </div>
<!-- <?php
$_SESSION['_token'] = md5(uniqid(mt_rand(), true));

?> -->
<!-- <input type="button" class="button_active" value="Create an order" onclick="location.href='addToOrders.php?staffId='<?php echo $rowOrder['StaffID']; ?>'';"/> -->
    
    <form action="pay.php?order_id=<?php echo $rowOrder['StaffID']; ?>" method="POST" class="text-center">
                
            <input type="hidden" name="token" value="<?php echo $_SESSION['_token']; ?>">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51K9vnAAUbfc5DcOgzs67p5rSAY2BmyG4KThw3WatBr4Op8ploxRsAh6lCXJuQZUuCnFIX3znAFR14dyNX6rlDkMx006oQnvHqa" data-amount="<?php echo $totalPrice * 100; ?>" data-currency="AED" data-name="Pay for order <?php echo $rowOrder['StaffID'];?>" data-locale="auto">
                </script>
                
    </form>
</body>
</html>