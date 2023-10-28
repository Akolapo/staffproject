<?php

   require_once "guards/admin_guard.php";
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='fontawesome/css/all.min.css'>
    <link href="animate.css" rel='stylesheet' type="text/css">
    <style type="text/css">
        .main {
            background-image: url("assets/images/realty.jpg");
            background-size: cover;
        }

        .inside {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="height:100%;">
        <!-- first row -->
        <div class="row bg-dark">
        <ul>
          <li><a href="login.php">Home</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
            <div class="col-md-12 col-12 text-center py-3">
                <h1 class="text-light" style="font-family: 'Stencil';">Makos Real Estate</h1>
            </div>
            
        </div>
        <!--first row end here-->

        <!--second row -->
        <div class="row justify-content-center main">
            <div class="col-md-5 col-12 inside animate__bounceInLeft">
<?php
             if(isset($_SESSION["login_error"])){
              ?>
             <p class="text-danger text-center bg-white mt-5 py-2"> <?php echo $_SESSION["login_error"]; ?></p>

              <?php unset($_SESSION["login_error"]); ?>
              <?php   
             }
             ?>
                <form action="process/login_process.php" method="post" class="p-5 mt-5 bg-white rounded">
                    <h1 class="text-center" style="color:black; font-size:1.5em; font-family: Bodoni MT Black;">Admin Login</h1>
                   
                    <input type="email" id="email" name="email" class="form-control my-2" placeholder="Email">
                    <input type="password" id="pass" name="password" class="form-control my-2" placeholder="Password">
                    <button type="submit" name="loginbtn" class="rounded-circle btn btn-danger d-block mx-auto" onclick="perform()">→</button>
                </form>
            </div>
            
        </div>
      
        <!--second row end here-->

        <!--third row start here-->
        <div class="row bg-dark text-light text-center py-3">
            <div class="col-md-12 col-12" style="height:55px;">
                <h3 class="animate_animated animate_zoomInDown" style="font-family:'Copperplate Gothic Bold';">Makos Real Estate</h3>
                <p>Developed by &copy; 2023 Akolapo</p>
            </div>
        </div>
        <!--third row end here-->
    </div>

    <script src='jquery.min.js'></script>
    <script type="text/javascript">
        function perform() {
            var x = document.getElementById('pass').value;
            if (x == '') {
                alert("Please enter Password");
            } else {
                alert("You are welcome");
            }
        }
    </script>
</body>

</html>