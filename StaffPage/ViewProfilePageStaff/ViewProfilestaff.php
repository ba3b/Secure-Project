<?php
    session_start();
    require_once('../../backendPart/config.php');
    // if(!isset($_SESSION["Login"])){
    //   header("HTTP/1.1 401 Unauthorized");
    //   header("Location: ../../401Page.php");
    //     exit;
    // }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
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
        <li class="nav-item"><a class="nav-link" href="../orderPage.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li class="nav-item"><a class="nav-link active"></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="../cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="../../Logout.php">Logout</a></li>
      </ul>
    </div>
  </div>

  <!-- ####### MAIN PROFILE SECTION ####### -->
  <div class="container-fluid ">
    <div class="row justify-content-center">
      <div class="col-md-5 p-5 border border-danger shadow-lg">
        <div class="text-center">
          <h3 class="text-primary">Profile</h3>
          <a><img src="../../Images/profile-user.png" class="w-25"></a><br>
        </div>
        <?php 

                           
                 $mysql = "SELECT Fname, LName, sEmail, PhoneNumber, St_UserName
                FROM staff
                WHERE StaffID = ?";
                $state = $conn->prepare($mysql);
                $state->bind_param("i",$_SESSION['STAFFID']);

                    $state->execute();

            //    $result = mysqli_query($conn, $mysql);
            //   $row = mysqli_fetch_array($result);

               ?>

        <form action="update.php" method="POST">
          <div class="form-group mb-3">
            <label for="Fname">First Name</label>
            <input type="text" class="input form-control" name="fname" value="<?php echo $_SESSION["FIRSTNAME"]?>">
            </input>
          </div>
          <div class="form-group mb-3">
            <label for="Lname">Last Name</label>
            <input type="text" class="input form-control" name="lname" value="<?php echo $_SESSION["LASTNAME"]?>">
            </input>
          </div>
          <div class="form-group mb-3">
            <label for="Uname">User Name</label>
            <input type="text" class="input form-control" name="userName" value="<?php echo $_SESSION["USERNAME"] ?>"
              readonly>
            </input>
          </div>
          <div class="form-group mb-3">
            <label for="Email">Email</label>
            <input type="email" class="input form-control" name="email" value="<?php echo $_SESSION["EMAIL"]?>"
              readonly>
            </input>
          </div>
          <div class="form-group mb-3">
            <label for="PhoneNo"> Phone Number</label>
            <input type="text" class="input form-control" name="phoneNo" value="<?php echo $_SESSION["PHONENUMBER"]?>">
            </input>
          </div>

          <button type="submit" value="Update" class="update btn btn-primary w-100">Update</button>

        </form>

      </div>
    </div>
  </div>




</body>

</html>