
<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>

    <div class="navOptions">
            <div class="link"><a href="orderdetails.php">Details Orders</a></div>

    </div>
	<div class="QuesDisplayContent">
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
								<a href="confirm.php">ACTION</a>
			               </td>
			             </tr><!--End tr tag here-->
	           <?php } ?>
	           </tbody>
	      </table>


	</div>

<?php include("footer.php");?>
