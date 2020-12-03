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
         <form class="" action="insertproduct.php" method="post" enctype="multipart/form-data">
			   <table class="table-box">
                 <tr>
                    <td>Name</td><td> <input type="text" name="ptname" value="" required=""> </td>
                 </tr>
                 <tr>
                    <td>SKU</td><td> <input type="text" name="sku" value="" required=""> </td>
                  </tr>
                  <tr>
                    <td>Price</td><td> <input type="text" name="price" value="" required=""> </td>
                  </tr>
                  <tr>
                    <td>productQuantity</td><td> <input type="text" name="quantity" value=""> </td>
                  </tr>
                  <tr>
                    <td>Size</td><td> <select class="" name="size">
                        <option value="Large">Large</option>
                        <option value="Medium">Medium</option>
                        <option value="Small">Small</option>
                    </select> </td>
                  </tr>
                  <tr>
                    <td> Origins</td><td> <select class="" name="slcorg">
                        <option value="MENS">MENS</option>
                        <option value="GIRLS">GIRLS</option>
                        <option value="KIDS">KIDS</option>
                    </select> </td>
                  </tr>
                  <tr>
                    <td>Category</td><td> <select class="" name="categoty">
                        <option>---Select Category---</option>
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
                                     echo "<option value='$c_id'> $c_name</option>";
                                   }
                          ?>
                  <?php  ?>
                    </select> </td>
                  </tr>
                  <tr>
                    <td>Image</td><td> <input type="file"id="file"  name="pimg" value=""><label for="file" >Choose a Photo..</label> </td>
                  </tr>
                  <tr>
                    <td>Discription</td><td> <textarea name="disc" rows="10" cols="80"></textarea>   </td>
                  </tr>
                   <tr>
                    <td>Product Keywords:</td><td> <input type="text" name="keywords" value=""> </td>
                  </tr>
                   <tr>
                    <td></td><td> <input type="submit" name="add" value="insert product ">  </td>
                  </tr>

                </table>
              </form>
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
            $name=$_POST["ptname"];
            $sku=$_POST["sku"];
            $price=$_POST["price"];
            $quantity=$_POST["quantity"];
            $size=$_POST["size"];
            $origin=$_POST["slcorg"];
            $categoty=$_POST["categoty"];
            $keywords=$_POST["keywords"];
            $desc=$_POST["disc"];

                        $product_image = $_FILES['pimg']['name'];
                        $product_image_tmp = $_FILES['pimg']['tmp_name'];
                        $target = "images/".basename($product_image);
                        move_uploaded_file($product_image_tmp,$target);

            $query="INSERT INTO `product` ( `productName`, `SKU`, `productPrice`, `productQuantity`, `productOrigin`, `productSizes`, `image`, `discription`, `categoryID`,`productDate`,`keyword`)
            VALUES ('$name', '$sku', '$price', '$quantity', '$origin', '$size', '$product_image', '$desc', '$categoty',CURDATE(),'$keywords')";
           $run=mysqli_query($conn,$query);
    if($run){
         echo "<script> alert('Product ADD Successfully !')</script>";
         echo "<script> window.open('product.php','_self')</script>";
        }
}

?>
