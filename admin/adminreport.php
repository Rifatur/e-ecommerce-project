
<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>

    <div class="navOptions">
            <div class="link"><a href="orderdetails.php">Back To dashBoard</a></div>
    </div>
<div class="QuesDisplayContent">

    <div class="report-cnt">

      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Total Product</span>
          <span class="qty">
             <?php
                $conn=mysqli_connect("localhost","root","","greenleaf");
                $query= "SELECT count(productID) AS total FROM product";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_assoc($result);
                $totalNum=$row['total'];
                echo $totalNum;
             ?>
          </span>
        </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Today add Product</span>
          <span class="qty">
            <?php
                $conn=mysqli_connect("localhost","root","","greenleaf");
                $query= "SELECT count(productID) AS total FROM product WHERE productDate=CURDATE()";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_assoc($result);
                $totalNum=$row['total'];
                echo $totalNum;
             ?>
          </span>
        </div>
      </div><!--Tab End-->

      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Today  Orders</span>
          <span class="qty">
                <?php
                    $conn=mysqli_connect("localhost","root","","greenleaf");
                    $query= "SELECT count(orderID) AS total FROM orders WHERE orderDate=CURDATE()";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $totalNum=$row['total'];
                    echo $totalNum;
                 ?>

          </span>
        </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Total Orders</span>
          <span class="qty">
                <?php
                    $conn=mysqli_connect("localhost","root","","greenleaf");
                    $query= "SELECT count(orderID) AS total FROM orders";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $totalNum=$row['total'];
                    echo $totalNum;
                 ?>

          </span>
        </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
          <div class="title">
            <span class="name">Total Sales</span>
            <span class="qty">
                  <?php
                      $conn=mysqli_connect("localhost","root","","greenleaf");
                      $query= "SELECT SUM(DueAmount) AS total FROM orders";
                      $result=mysqli_query($conn,$query);
                      $row=mysqli_fetch_assoc($result);
                      $totalNum=$row['total'];
                      echo $totalNum;
                   ?>
            </span>
          </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Today Sales</span>
          <span class="qty">

             <?php
                 $conn=mysqli_connect("localhost","root","","greenleaf");
                 $query= "SELECT SUM(DueAmount) AS total FROM orders WHERE orderDate=CURDATE()";
                 $result=mysqli_query($conn,$query);
                 $row=mysqli_fetch_assoc($result);
                 $totalNum=$row['total'];
                 echo $totalNum;
              ?>

          </span>
        </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Last week Sales</span>
          <span class="qty">

             <?php
                 $conn=mysqli_connect("localhost","root","","greenleaf");
                 $query= "SELECT SUM(DueAmount) AS total FROM orders WHERE orderDate =( CURDATE() - INTERVAL 2 DAY )";
                 $result=mysqli_query($conn,$query);
                 $row=mysqli_fetch_assoc($result);
                 $totalNum=$row['total'];
                 echo $totalNum;
              ?>

          </span>
        </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Total Customer</span>
          <span class="qty">
            <?php
               $conn=mysqli_connect("localhost","root","","greenleaf");
               $query= "SELECT count(customerID) AS total FROM customers";
               $result=mysqli_query($conn,$query);
               $row=mysqli_fetch_assoc($result);
               $totalNum=$row['total'];
               echo $totalNum;
            ?>
          </span>
        </div>
      </div><!--Tab End-->
      <div class="report-tab"><!--Tab Start -->
        <div class="title">
          <span class="name">Total Admin</span>
          <span class="qty">
             <?php
                $conn=mysqli_connect("localhost","root","","greenleaf");
                $query= "SELECT count(adminID) AS total FROM admin";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_assoc($result);
                $totalNum=$row['total'];
                echo $totalNum;
             ?>
          </span>
        </div>
      </div><!--Tab End-->




    </div><!---End ctn-->




  </div><!---End QuesDisplayContent-->





<?php include("footer.php");?>
