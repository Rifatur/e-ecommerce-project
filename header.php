<?php
    @session_start();
    $conn=mysqli_connect("localhost","root","","greenleaf");
 ?>
<!DOCTYPE html>
<?php
  include("function.php");
 ?>
<html>
<head>
	<title>Welcome Greenleaf fashion</title>

    <link rel="stylesheet" type="text/css" href="css/cpanel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/customer.css">
  <link rel="stylesheet" type="text/css" href="css/cart.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/product.css">

</head>
<body>
      <header>
            <!--DIv class Start Here-->
            <div class="top-header-col">
              <?php
                  if (!isset($_SESSION['Email'])) {
                     echo' <a href="cheakout.php">Log In </a>--->';
                  }
                  else{
                    echo' <a href="logout.php">Logout </a>--->';
                  }

                ?>
                <a href="customer_panel.php">My Account </a>--->
                <a href="signup.php"> SignUp </a>
            </div>
            <div class="top-mid-col" id="mid-col">
                <span id="welcome">               <?php
                  if (!isset($_SESSION['Email'])) {
                     echo'Hello !<a href="cheakout.php">Log In</a>';
                  }
                  else{
                    echo $_SESSION['Email'];
                  }
                ?>


                  Welcome To GreenLeaf Fashion </span>
                <span class="logo-name">GreenLeaf</span>
                <div class="search-col">
                  <form class="" action="searchresult.php" method="get" enctype="multipart/form-data">

                    <input type="text" name="getQuery" value="" placeholder="Search Product">
                    <input type="submit" name="submit" value="Search">

                  </form>

                </div>
            </div>
            <div class="nav-content">
                  <div class="nav-col-1"><!--Logo section-->
                    <li> <a href="index.php">HOME</a> </li>
                    <li> <a href="allproduct.php">SHOP</a> </li>
                    <li> <a href="mens.php">MEN</a> </li>
                    <li> <a href="girls.php">WOMEN</a> </li>
                    <li> <a href="kids.php">KIDS</a> </li>
                    <li> <a href="#">BLOG</a> </li>
                  </div>
                  <!--content section nav -->
                  <div class="nav-col-2">
                      <a href="cart.php">Go To Cart </a>
                      <a >Items:  <?php echo total_Item(); ?>  </a>
                      <a href=""> ৳  <?php echo totalPrice(); ?></a>
                  </div>
            </div>
      </header>
      <!---END HERDER SECION HERE --->
      <main>
