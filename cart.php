<?php include('header.php'); ?>
            <div class="cart-view">
                  <table>
                        <thead>
                          <tr>
                            <th>Remove</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <?php

                              $conn=mysqli_connect("localhost","root","","greenleaf");
                              global $conn;
                              $ip=getIp();
                              $total=0;
                              $QueryForPrice="SELECT * FROM cart WHERE IpAddess='$ip'";
                              $run_query=mysqli_query($conn,$QueryForPrice);
                              while ($reccord=mysqli_fetch_assoc($run_query)) {

                                  $pID=$reccord['pID'];
                                  $p_quantity=$reccord['quantity'];
                                  $QueryForProduct="SELECT * FROM `product`WHERE productID='$pID'";
                                  $pro_query=mysqli_query($conn,$QueryForProduct);

                                  while ($row=mysqli_fetch_assoc($pro_query)) {
                                      $productname=$row['productName'];
                                      $p_image=$row['image'];
                                      $p_price=$row['productPrice'];
                                      $price=array($row['productPrice']);
                                      $value=array_sum($price);
                                      $total +=$value;


                              //echo $total;


                         ?>


                        <tbody>
                          <tr>
                            <td><a href="cart.php?removeitem=<?php echo $pID ?>"> Remove </a> </td>
                            <td> <img src="admin/images/<?php echo $p_image; ?> " width="70px" height="60px" alt=""> </td>
                            <td> <?php echo $productname ;?> </td>
                            <td> <?php echo$p_quantity ; ?> </td>
                            <td> <?php  echo $p_price ;?> </td>
                          </tr>

                      <?php }} ?>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Sub Total</td>
                              <td> $ <?php echo $total ; ?></td>
                            </tr>

                        </tbody>
                  </table>
                  <div class="navsection">
                    <div class="nav1-ctn">
                      <input type="submit" name="" value="Continue Shopping">
                    </div>
                    <div class="nav3-ctn">
                        <a href="cheakout.php">CheakOut</a>
                    </div>
                  </div>
            </div>

            <?php
              $conn=mysqli_connect("localhost","root","","greenleaf");
                if (isset($_GET['removeitem'])) {
                  // code...
                  $delete=$_GET['removeitem'];

                  $query= "DELETE  FROM cart WHERE pID='$delete'";
                  $result=mysqli_query($conn,$query);
                      if($result){
                     echo "<script> alert('remove Successfully !')</script>";
                     echo "<script> window.open('cart.php','_self')</script>";
                    }
                }

             ?>


<?php/*
      global $conn;
        $ip=getIp();
      if (isset($_POST['upadte'])) {
        // code...
        foreach ($_POST['remove[]'] AS $removeid) {
          $deleteitm="DELETE FROM cart WHERE pID='$removeid'AND IpAddess='$ip'";
          $run_query=mysqli_query($conn,$deleteitm);
        }

      }
*/
 ?>




<?php include('footer.php'); ?>
