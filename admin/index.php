<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>
	                	<div class="widgeds-List">
                                <div class="widgets">
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
                                </div>
                                <div class="widgets">
                                  <div class="title">
                                    <span class="name">Total Users</span>
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
                                </div>
                                <div class="widgets">
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
                                </div>
                                <div class="widgets">
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
                                </div>
                          </div><!---End widged-List-->

	                </section>
	                     <div class="display-content">
                                <div class="userDispay">
                                      <div class="headerSec">
                                          <span>Letest Product</span>
                                          <a href="product.php">View all Question</a>
                                      </div>
                                      <div class="viewContent">
                                          <table id="table">
                                                       <thead>
                                                         <tr>
                                                           <th>Image</th>
                                                           <th>Title</th>
                                                           <th>Price</th>
                                                           <th>Quantity</th>
                                                           <th>Status</th>
                                                           <th>Action</th>
                                                         </tr>
                                                       </thead>
                                                       <tbody>
                                                         <?php
                                                         $conn=mysqli_connect("localhost","root","","greenleaf");
                                                                 if($conn){

                                                                 }else {
                                                                     die("connection failed" .mysqli_connect_error());
                                                                 }
                                                                 $query= "SELECT * FROM product LIMIT 4";
                                                                 $result=mysqli_query($conn,$query);

                                                                 while($row=mysqli_fetch_assoc($result)){
                                                                     $p_id = $row['productID'];
                                                                     $p_name = $row['productName'];
                                                                     $p_price = $row['productPrice'];
                                                                     $p_quantity = $row['productQuantity'];
                                                                     $p_img = $row['image'];
                                                          ?>
                                                         <tr>

                                                           <td> <img src="images/<?php echo $p_img; ?>" width="30px" height="30px"> </td>
                                                           <td><?php echo $p_name; ?></td>
                                                           <td><?php echo $p_price; ?></td>
                                                           <td><?php echo $p_quantity; ?></td>
                                                           <td></td>
                                                           <td>
                                                             <a href="details.php?productID=<?php echo $p_id; ?>">view</a>
                                                             <a href="edit.php?editID=<?php echo $p_id; ?>">Edit</a>
                                                             <a href="delete.php?product_delete_id=<?php echo $p_id; ?>">Delete</a>
                                                           </td>
                                                         </tr><!--End tr tag here-->
                                                       <?php } ?>
                                                       </tbody>
                                              </table>
                                      </div>
                                </div>
                                <div class="QuestionDispay">
	                                  <div class="headerSec2">
	                                      <span>Letest Orders</span>
	                                      <a href="allorders.php">View all Users</a>
	                                  </div>
	                                  <div class="viewContent">
                                            <table id="table">
                                             <thead>
                                               <tr>
                                                 <th>Order No</th>
                                                 <th>Due Amount</th>
                                                 <th>Invoice No</th>
                                                 <th>Total Product</th>
                                                 <th>Order Date</th>
                                                 <th>paid/unpaid</th>
                                                 <th>Status</th>
                                               </tr>
                                             </thead>
                                          <tbody>
                                           <?php
                                            $conn=mysqli_connect("localhost","root","","greenleaf");
                                                       if($conn){

                                                       }else {
                                                           die("connection failed" .mysqli_connect_error());
                                                       }
                                                       $query= "SELECT * FROM orders ";
                                                       $result=mysqli_query($conn,$query);

                                                       while($row=mysqli_fetch_assoc($result)){
                                                           $OrderId = $row['orderID'];
                                                           $DueAmount = $row['DueAmount'];
                                                           $invoiceNo = $row['invoiceNo'];
                                                           $totalProduct = $row['totalProduct'];
                                                           $orderDate  = $row['orderDate'];
                                                           $orderStatus= $row['orderStatus'];
                                                ?>
                                               <tr>
                                                 <td><?php echo $OrderId; ?></td>
                                                 <td> <?php echo $DueAmount; ?> </td>
                                                 <td><?php echo $invoiceNo; ?></td>
                                                 <td><?php echo $totalProduct; ?></td>
                                                 <td><?php echo $orderDate; ?></td>
                                                 <td><?php echo "Unpaid"; ?></td>
                                                 <td>
                                            <a href="confirm.php">ACTION</a>
                                                 </td>
                                               </tr><!--End tr tag here-->
                                         <?php } ?>
                                         </tbody>
                                    </table>
	                                  </div>
                                </div>
                          </div><!--End Display Content On Admin index page-->

	<?php include("footer.php");?>
