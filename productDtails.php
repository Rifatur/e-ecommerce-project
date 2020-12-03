<?php include('header.php'); ?>
<div class="product-view" id="view">
  <?php
      $conn=mysqli_connect("localhost","root","","greenleaf");
      if (isset($_GET['productID'])) {

          $productid=$_GET['productID'];

          $query= "SELECT * FROM product WHERE productID='$productid'";
          $result=mysqli_query($conn,$query);

          while($row=mysqli_fetch_assoc($result)){
              $p_id = $row['productID'];
              $p_name = $row['productName'];
              $p_price = $row['productPrice'];
              $p_quantity = $row['productQuantity'];
              $p_img = $row['image'];
    ?>
      <div class="product-prasantation">
            <div class="product-image">
                <img src="admin/images/<?php echo $p_img; ?>" >
            </div>
            <div class="selections-box">
                <div class="product-name">
                  <p class="title"><?php echo $p_name; ?> </p>
                  <p class="price">$ <?php echo $p_price; ?> </p>
                  <p class="wish"> <a href="#"> ADD WISHLIST </a> </p>
                </div>

                <div class="product-disc">
                  <p class="d-title">Discription</p>
                  <p class="discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                    sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="selection-bar">
                    <select class="sizeinfo" name="" >
                      <option value="">SIZE</option>
                    </select>
                    <select class="colorinfo" name="">
                        <option value="">COLOR</option>
                    </select>

                </div>
                <div class="addcart-bar">
                  <div class="quantity">
                    <input type="number" name="quantity" value="1" min="1" max="10">
                  </div>
                  <div class="addcart">
                      <p>Add To CART</p>
                  </div>
                </div>


            </div>
    </div><!--End product prasentation-->
  <?php }  } ?>
</div><!--End product-view-->




<?php include('footer.php'); ?>
