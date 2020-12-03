<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>
  <div class="insert-data">
  <form class="" action="edit.php" method="post" enctype="multipart/form-data">
      <?php
        $conn=mysqli_connect("localhost","root","","greenleaf");
        if (isset($_GET['editID'])) {
          // code...
          $Editid=$_GET['editID'];
          $query= "SELECT * FROM product WHERE productID='$Editid'";
          $result=mysqli_query($conn,$query);

          $row=mysqli_fetch_array($result);
              $update=$row['productID'];
              $p_name = $row['productName'];
              $p_sku = $row['SKU'];
              $p_price = $row['productPrice'];
              $p_quantity = $row['productQuantity'];
              $p_img = $row['image'];
              $p_origin = $row['productOrigin'];
              $p_size = $row['productSizes'];
              $p_desc = $row['discription'];
              $p_catego= $row['categoryID'];
              $keyword= $row['keyword'];
    ?>


         <table class="table-box">
           <tr>
             <td>Name</td><td> <input type="text" name="ptname" value="<?php echo $p_name ;?>"> </td>
           </tr>
           <tr>
             <td>SKU</td><td> <input type="text" name="sku" value="<?php echo $p_sku ;?>"> </td>
           </tr>
           <tr>
             <td>Price</td><td> <input type="text" name="price" value="<?php echo $p_price ;?>"> </td>
           </tr>
           <tr>
             <td>productQuantity</td><td> <input type="text" name="quantity" value="<?php echo $p_quantity ;?>"> </td>
           </tr>
           <tr>
             <td>Size</td><td> <select class="" name="size">
                 <option value="<?php echo $p_size; ?>">Large</option>
                 <option value="Medium">Medium</option>
                 <option value="Small">Small</option>
             </select> </td>
           </tr>
           <tr>
             <td> Origins</td><td> <select class="" name="slcorg">
                 <option value="<?php echo $p_origin ;?>">MENS</option>
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

             </select> </td>
           </tr>
           <tr>
             <td>Image</td><td> <input type="file"id="file"  name="pimg" value="<?php echo $p_img ;?>"><label for="file" >Choose a Photo..</label> </td>
           </tr>
           <tr>
             <td>Discription</td><td> <textarea name="disc" rows="10" cols="80" <?php echo $p_desc ;?> ></textarea>   </td>
           </tr>
           <tr>
            <td>Product Keywords:</td><td> <input type="text" name="keywords" value="<?php echo $keyword ?>"> </td>
          </tr>
           <tr>
             <td></td><td> <input type="submit" name="update" value="insert product ">  </td>
           </tr>

         </table>
         <?php }  ?>


         <?php

         $conn=mysqli_connect("localhost","root","","greenleaf");
           if (isset($_POST['update'])) {

                     $name=$_POST["ptname"];
                     $sku=$_POST["sku"];
                     $price=$_POST["price"];
                     $quantity=$_POST["quantity"];
                     $size=$_POST["size"];
                     $origin=$_POST["slcorg"];
                     $categoty=$_POST["categoty"];
                     $desc=$_POST["disc"];
                     $keyword= $_POST['keywords'];

                     $product_image = $_FILES['pimg']['name'];
                     $product_image_tmp = $_FILES['pimg']['tmp_name'];
                     $target = "images/".basename($product_image);
                     move_uploaded_file($product_image_tmp,$target);

                 $updateProduct="UPDATE `product` SET `productName` = '$name', `SKU` = '$sku', `productPrice` = '$price', `productQuantity` = '$quantity',`productOrigin`='$origin',`productSizes`='$size',`image`='$product_image', `discription` ='$desc',
                 `categoryID`='$categoty',`productDate`=CURDATE(), `keyword`= $keyword' WHERE ";
                 $runupdate=mysqli_query($conn,$updateProduct);
                if($runupdate){
                       echo "<script> alert(' Update Successfully !')</script>";
                       echo "<script> window.open('product.php','_self')</script>";
                }

              }

          ?>


       </form>
   </div>





<?php include("footer.php");?>
