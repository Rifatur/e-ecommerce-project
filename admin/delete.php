<?php include("header.php");?>

<?php
  $conn=mysqli_connect("localhost","root","","greenleaf");
    if (isset($_GET['product_delete_id'])) {
      // code...
      $delete=$_GET['product_delete_id'];

      $query= "DELETE  FROM product WHERE productID='$delete'";
      $result=mysqli_query($conn,$query);
          if($result){
         echo "<script> alert('Product ADD Successfully !')</script>";
         echo "<script> window.open('product.php','_self')</script>";
        }
    }




 ?>



<?php include("footer.php");?>
