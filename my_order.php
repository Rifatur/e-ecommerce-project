<?php include('header.php'); ?>

<?php 
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>

	<div class="customerWrapper">
		<div class="panelHead">
		</div>
		<!--displayContent Start-->
		<div class="displayContent">

			<div class="leftSideContent">
						<div class="leftheader">
								<div class="profileimage" id="propisc">
											<img src="image/avatar.png" alt="">
								</div>
								<span class="C-name">
									<?php
											$customer_session=$_SESSION['Email'];
											$get_user="SELECT * FROM customers WHERE Email='$customer_session'";
											$run=mysqli_query($conn,$get_user);
											while ($row=mysqli_fetch_array($run)) {
												$cunstomer=$row['customerID'];
												$Fname=$row['FirstName'];
												$lname=$row['LastName'];
											}
											echo $Fname." ".$lname;
											?>
								 </span>
						</div>
						<div class="InformationBar">
							<a href="customer_panel.php">Deshboard</a>
							<a href="customer_panel.php?">Profile</a>
							<a href="my_order.php?customer=<?php echo$cunstomer?>">Orders</a>
							<a href="logout.php">Log Out</a>

						</div>
			</div>
			<div class="rightSideContent">

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
			                     $query= "SELECT * FROM orders WHERE customerID='$cunstomer'";
			                     $result=mysqli_query($conn,$query);

			                     while($row=mysqli_fetch_assoc($result)){
			                         $OrderId = $row['orderID'];
			                         $DueAmount = $row['DueAmount'];
			                         $invoiceNo = $row['invoiceNo'];
			                         $totalProduct = $row['totalProduct'];
			                         $orderDate	 = $row['orderDate'];
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
								<a href="confirm.php">Confirm If paid</a>
			               </td>
			             </tr><!--End tr tag here-->
	           <?php } ?>
	           </tbody>
			          

				</table>		
			</div>
		</div>

	</div>


<?php include('footer.php'); ?>


  