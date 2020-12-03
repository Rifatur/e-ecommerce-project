<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>
    <div class="navOptions">
    		<div class="link"><a href="allorders.php">Back To Orders </a></div>
        <div class="link">
              <form class="" action="ordersearch.php" method="get" enctype="multipart/form-data">
                        <input type="text" name="psearch" value="" placeholder="Search by id">
                        <input type="submit" name="search" value="Search">
              </form>
        </div>
    </div>
	<div class="QuesDisplayContent">
			<table id="table">
			           <thead>
			             <tr>
			               <th>Details number </th>
			               <th>customerID</th>
			               <th>Invoice No</th>
			               <th>productID</th>
			               <th>Quantity</th>
			               <th>Order Date</th>
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
                          if(isset($_GET['search'])){
                               $userQuery=$_GET['psearch'];
			                     $query= "SELECT * FROM ordersdetails WHERE customerID='$userQuery'OR invoiceNo='$userQuery'";
			                     $result=mysqli_query($conn,$query);

			                     while($row=mysqli_fetch_assoc($result)){
			                         $OD_id = $row['OD_id'];
			                         $customerID = $row['customerID'];
			                         $invoiceNo = $row['invoiceNo'];
			                         $productID = $row['productID'];
			                         $qtn = $row['qtn'];
			                         $orderDate	 = $row['orderDate'];
			                         $orderStatus= $row['orderStatus'];
			              ?>
			             <tr>
			               <td><?php echo $OD_id ; ?></td>
			               <td> <?php echo $customerID; ?> </td>
			               <td><?php echo $invoiceNo; ?></td>
			               <td><?php echo $productID; ?></td>
			               <td><?php echo $qtn; ?></td>
			               <td><?php echo $orderDate; ?></td>
			               <td><?php
			               			if($orderStatus=='pending'){
			               				echo $orderStatus='pending';
			               			}else{
			               				echo $orderStatus='Complete';
			               			}

			                ?></td>
			               <td>
								<a href="confirm.php">ACTION</a>
			               </td>
			             </tr><!--End tr tag here-->
	           <?php } }?>
	           </tbody>
	      </table>


	</div>

<?php include("footer.php");?>
