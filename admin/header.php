<?php
    @session_start();
    $conn=mysqli_connect("localhost","root","","greenleaf");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/product.css">
	<link rel="stylesheet" type="text/css" href="css/order.css">
		<link rel="stylesheet" type="text/css" href="css/report.css">

</head>
<body>
	<main class="main">
	            <header>
	                  <div class="logo">
	                      <a href=""> GreenLeaf</a>
	                  </div>
	                  <div class="user-info">
	                          <div class="user-ctn">
	                              <span class="username"> <a href="index.php"> UserName</a></span>
	                              <span class="email">
                                  <?php
                                    if (!isset($_SESSION['Email'])) {
                                       echo'Somthis@gmail.com';
                                    }
                                    else{
                                      echo $_SESSION['Email'];
                                    }
                                  ?>
                                            </span>
	                          </div>
	                          <div class="user-img">
	                              <img src="image/profile2.png" alt="">
	                          </div>
	                  </div>
	            </header>
	            <div class="mainWrapper">
	                <section class="menu-section">
	                      <li><a href="index.php">DASHBOARD</a></li>
	                        <li><a href="product.php">Manage Product</a></li>
	                          <li><a href="allorders.php">Mange Orders</a></li>
	                          <li><a href="customers.php">Mange customers</a></li>
	                          <li><a href="adminreport.php">Reports</a></li>
	                          <li><a href="logout.php">logout</a></li>
	                </section>
	                <section class="mainContent-section">
