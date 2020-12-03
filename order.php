<?php include('header.php'); ?>

        <?php
                $conn=mysqli_connect("localhost","root","","greenleaf");

                $ip=getIp();
                //Getting customers ID
                if (isset($_GET['cid'])) {
                  // code...
                  $customerid=$_GET['cid'];
                  }
                //End If statement
                //Getting product price
                $ip=getIp();
                $total=0;
                $status='pending';
                $invoiceNo= mt_rand(100000,140000);

                $QueryForPrice="SELECT * FROM cart WHERE IpAddess='$ip'";
                $run_query=mysqli_query($conn,$QueryForPrice);
                while ($reccord=mysqli_fetch_assoc($run_query)) {
                	$count_p=mysqli_num_rows($run_query);
                    $pID=$reccord['pID'];
                    $QueryForProduct="SELECT * FROM `product`WHERE productID='$pID'";
                    $pro_query=mysqli_query($conn,$QueryForProduct);

                    while ($row=mysqli_fetch_assoc($pro_query)) {
                        $price=array($row['productPrice']);
                        $value=array_sum($price);
                        $total +=$value;
                    }
                  }
                  //Getting Quantity From The Cart

                    $getQuery="SELECT * FROM cart";
                    $run_getQuery=mysqli_query($conn,$getQuery);
                    $getQty=mysqli_fetch_assoc($run_getQuery);
                    $qty=$getQty['quantity'];
                    if ($qty==0) {
                      // code...
                      $qty=1;
                      $subTotal=$total;
                    }else {
                      $qty=$qty;
                      $subTotal=$total*$qty;
                    }
                  //Insert Order Query Start HERE
                  $orderInsert="INSERT INTO `orders` (`orderID`, `customerID`, `DueAmount`, `invoiceNo`, `totalProduct`, `orderDate`, `orderStatus`) VALUES (NULL, '$customerid', '$subTotal', '$invoiceNo', '$count_p', CURDATE(), '$status')";
                  $runInsertQuery=mysqli_query($conn,$orderInsert);
                  if ($runInsertQuery) {
                    echo "<script>alert('Order successfully Submitted')</script>";
                    echo "<script>window.open('customer_panel.php','_self')</script>";
                    $insertPendingOrders="INSERT INTO ordersdetails(customerID,invoiceNo,productID,qtn,orderStatus,orderDate)values('$customerid','$invoiceNo','$pID','$qty','$status',CURDATE())";
                    $runPendingOrders=mysqli_query($conn,$insertPendingOrders);
                    $emptyCart="DELETE FROM cart WHERE IpAddess='$ip'";
                    $runemptyCart=mysqli_query($conn,$emptyCart);
                  }



             ?>
<?php include('footer.php'); ?>
