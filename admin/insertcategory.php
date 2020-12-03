<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>
<div class="navOptions">
   <div class="link"><a href="product.php">Back To product</a></div>
</div>
<div class="insert-data"><!-- css in product.css file-->
        <form class="" action="insertcategory.php" method="post" enctype="multipart/form-data">
			<table class="table-box">
                <tr>
                    <td>Category Name</td><td> <input type="text" name="Cname" value=""> </td>
                </tr>
                <tr>
                    <td></td><td> <input type="submit" name="add" value="ADD Category">  </td>
                </tr>
            </table>
        </form>
</div>
	<div class="QuesDisplayContent">
		<table id="table">
	           <thead>
	             <tr>
	               <th>ID</th>
	               <th>Title</th>
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
	                     $query= "SELECT * FROM `category`";
	                     $result=mysqli_query($conn,$query);

	                     while($row=mysqli_fetch_assoc($result)){
	                         $c_id = $row['categoryID'];
	                         $c_name = $row['categoryName'];
	              ?>
	             <tr>
	               <td><?php echo $c_id; ?></td>
	               <td><?php echo $c_name; ?></td>
	               <td>
	                 <a href="edit.php?editID=<?php echo $c_id; ?>">Edit</a>
	                 <a href="delete.php?category_delete_id=<?php echo $c_id; ?>">Delete</a>
	               </td>
	             </tr><!--End tr tag here-->
	           <?php } ?>
	           </tbody>
		</table>



	</div>

<?php include("footer.php");?>

<?php
  $conn=mysqli_connect("localhost","root","","greenleaf");
          if($conn){
          }else {
              die("connection failed" .mysqli_connect_error());
          }

          //inserting data..
          if (isset($_POST['add'])) {
            $name=$_POST["Cname"];

            $query="INSERT INTO `category` ( `categoryName`)
            VALUES ('$name' )";
            mysqli_query($conn,$query);

            header('location:insertcategory.php');
}

?>
