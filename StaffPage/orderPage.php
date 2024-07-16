<?php 

session_start(); 
session_regenerate_id(true);
require('../backendPart/config.php');

 if(!isset($_SESSION["Login"])){
   header("HTTP/1.1 401 Unauthorized");
   header("Location: ../401Page.php");
     exit;
 }

?>
<!DOCTYPE>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>orderPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../frontEndCssFiles/orderPageStyle.css"> 
    <script type="text/javascript">
    function openulr(newurl) {
          if (confirm("Are you sure you want to confirm your Choice ?")) {
                  document.location = newurl;  }}
                  
                //  
                  </script>
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
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="ViewProfilePageStaff/ViewProfilestaff.php"></i>Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="../Logout.php">Logout</a></li>
      </ul>
    </div>
  </div>

      <?php
    $sql = "select * from Pizza;";
    $records = mysqli_query($conn,$sql);
    while($data = mysqli_fetch_array($records))
{
    ?>
    <div class="row">
    <div class="col-md-10 col-sm-6">
        <div class="product-grid">
            <div class="product-image">
                <a href="" class="image">
                   
                    <img class='pic-1' src="<?php echo $data['Img1'];?>">
                    <img class="pic-2" src="<?php echo $data['Img2'];?>">
                </a>
                <span class="product-sale-label">sale</span>
                <ul class="product-links">
                    <li><a href="addToCart.php?id=<?php echo $data['PizzaID'];?>"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href=""><i class="fa fa-heart"><</i></a></li>
                    <li><a href=""><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content">
                <h3 class="title"><a href=""><?php echo $data['Name']?></a></h3>
                <div class="price"><b>MYR<?php echo $data['Price']?></b></div>
            </div>
        </div>
    </div>
</div>
<?php
}

?>

      


</body>
</html>