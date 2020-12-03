<?php
  $conn=mysqli_connect("localhost","root","","greenleaf");

  function getIp() {
    global $conn;
      $ip = $_SERVER['REMOTE_ADDR'];

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }

      return $ip;
  }//END IP FUNCTION

  function cart(){
    if (isset($_GET['addcart'])) {
        global $conn;
        $ip=getIp();
        $productid=$_GET['addcart'];
        $check_query="SELECT * FROM cart WHERE IpAddess='$ip' AND pID='$productid'";
        $run_query=mysqli_query($conn,$check_query);
        if (mysqli_num_rows($run_query)>0) {
          // code...
          echo "";
        }
        else {

          $insert="INSERT INTO cart(pID,IpAddess,quantity)VALUES('$productid','$ip',1)";
          $run=mysqli_query($conn,$insert);
        }

    }//END IF STATEMENT
  }//End Cart Function

//Getting  Total Item...
    function total_Item(){
      if (isset($_GET['addcart'])) {
          global $conn;
          $ip=getIp();
          $query="SELECT * FROM cart WHERE IpAddess='$ip'";
          $run_query=mysqli_query($conn,$query);
          $count=mysqli_num_rows($run_query);
        }
        else {
          global $conn;
          $ip=getIp();
          $query="SELECT * FROM cart WHERE IpAddess='$ip'";
          $run_query=mysqli_query($conn,$query);
          $count=mysqli_num_rows($run_query);
        }

      echo $count;
    }
//Getting The Total Price...
function totalPrice(){
    global $conn;
    $ip=getIp();
    $total=0;
    $QueryForPrice="SELECT * FROM cart WHERE IpAddess='$ip'";
    $run_query=mysqli_query($conn,$QueryForPrice);
    while ($reccord=mysqli_fetch_assoc($run_query)) {

        $pID=$reccord['pID'];
        $QueryForProduct="SELECT * FROM `product`WHERE productID='$pID'";
        $pro_query=mysqli_query($conn,$QueryForProduct);

        while ($row=mysqli_fetch_assoc($pro_query)) {
            $price=array($row['productPrice']);
            $value=array_sum($price);
            $total +=$value;
        }
    }
    echo $total;
}


//GETing the defauls for customer

function getData(){
      global $conn;
      $cEmail= $_SESSION['Email'];

      $C_getQuery="SELECT * FROM `customers` WHERE Email='$cEmail'";
      $C_run_query=mysqli_query($conn,$C_getQuery);
      while ($row_C=mysqli_fetch_assoc($C_run_query)) {
          $C_ID=$row_C['customerID'];
            if (!isset($_GET['customer_panel'])) {
              // code...
                if (!isset($_GET['cProfile'])) {
                // code...
                  if (!isset($_GET['my_orders'])) {
                    // code...
                    if (!isset($_GET['logout'])) {
                      // code...
                        $GetOrder="SELECT * FROM orders WHERE customerID='$C_ID' AND orderStatus='pending'";
                        $order_query=mysqli_query($conn,$GetOrder);
                        $count_orders=mysqli_num_rows($order_query);

                        if ($count_orders>0) {
                          echo "
                              <div style='margin-left:24.5%;'>
                                  <h1 style='color:#F1467A;font-size:90px; font-family: 'Aldrich', sans-serif;'>Important!</h1>
                                  <h1 style='color:#08B; font-size:50px; font-family: 'Aldrich', sans-serif;'>You Have $count_orders Pending Orders</h1>
                              </div>

                          ";
                        }else{
                          echo "
                              <div style='margin-left:24.5%;'>
                                  <h1 style='color:#F1467A;font-size:90px; font-family: 'Aldrich', sans-serif;'>Important!</h1>
                                  <h1 style='color:#08B; font-size:50px; font-family: 'Aldrich', sans-serif;'>You Have No Pending Orders</h1>
                              </div>

                          ";
                        }
                    }

                }
              }
            }


      }//End While bracket



}
// ENd function










 ?>
