<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Form</title>
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
                <li class="nav-item"><a class="nav-link active" href="../staffMainPage.php">Home</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="ViewProfilePageStaff/ViewProfilestaff.php"></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="../Logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <script src="leaveFormV.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 shadow-lg p-5">

            <h1 class="text-center">Leave Form</h1>
           <hr>
        
        <div id="theForm">
            <form action="leaveForm.php" method="post" name="leaveForm" onsubmit="return VerifyForm()">


                <label for="timeOff" class="w-25">Request Date: </label>
                <input type="date" name="timeOff" id="timeOff">
                <br>
                <br>
                <label for="beginOn" class="w-25">Begining on: </label>
                <input type="date" name="beginOn" id="beginOn">
                <br>
                <br>
                <label for="endOn" class="w-25">Ending on: </label>
                <input type="date" name="endOn" id="endOn">
                <br>
                <br>
                <label for="leave" class="w-25">reason for Leave:</label>
                <select name="leaveReason" id="leave">
                    <option disabled selected value> -- select an option -- </option>
                    <option value="vacation">Vacation</option>
                    <option value="personal">Personal Leave</option>
                    <option value="funeral">Funeral</option>
                    <option value="family">Family reason</option>
                    <option value="medical">Medical</option>
                    <option value="other">Others</option>
                </select>
                <br>
                <label for="description">Description: </label>
                <br>
                <textarea name="description" id="description" cols="50" rows="6"></textarea>
                <br>
                <br>
                <button type="submit" value="submit">Submit</button>


        </div>
    </div>
</div>
</div>
    </form>

</body>

</html>