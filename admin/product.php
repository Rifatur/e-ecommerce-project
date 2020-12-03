
<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>
    <div class="navOptions">
            <div class="link"><a href="insertproduct.php">add product</a></div>
            <div class="link"><a href="insertcategory.php">add category</a></div>
            <div class="link"><a href="displaycategory.php">view category</a></div>
            <div class="link">
                  <form class="" action="productsearch.php" method="get" enctype="multipart/form-data">
                            <input type="text" name="psearch" value="" placeholder="Search by id">
                            <input type="submit" name="search" value="Search">
                  </form>
            </div>

    </div>
	<div class="QuesDisplayContent">
		<table id="table">
	           <thead>
	             <tr>
	               <th>ID</th>
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
	                     $query= "SELECT * FROM product";
	                     $result=mysqli_query($conn,$query);

	                     while($row=mysqli_fetch_assoc($result)){
	                         $p_id = $row['productID'];
	                         $p_name = $row['productName'];
	                         $p_price = $row['productPrice'];
	                         $p_quantity = $row['productQuantity'];
	                         $p_img = $row['image'];
	              ?>
	             <tr>
	               <td><?php echo $p_id; ?></td>
	               <td> <img src="images/<?php echo $p_img; ?>" width="25px" height="25px"> </td>
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

<?php include("footer.php");?>
