<?php include('header.php'); ?>
      <!---END HERDER SECION HERE --->
      <div class="sliderContent">
      		<img src="image/banner2.jpg">
      </div>
		<div class="product-container">
              <div class="container-header">

              </div>
              <!--container Header END -->
              <div class="product-content container">
                  <?php cart(); ?>
                  <!--Product Item Show & product presentation start here -->
                  <?php
                  	$conn=mysqli_connect("localhost","root","","greenleaf");
                          if($conn){
                          }else {
                              die("connection failed" .mysqli_connect_error());
                          }
                          $query= "SELECT * FROM product LIMIT 10";
                          $result=mysqli_query($conn,$query);

                          while($row=mysqli_fetch_assoc($result)){
                              $p_id = $row['productID'];
                              $p_name = $row['productName'];
                              $p_price = $row['productPrice'];
                              $p_quantity = $row['productQuantity'];
                              $p_img = $row['image'];
                   ?>
                    <div class="product-presentation">
                          <div class="header-presentation">
                              <img src="admin/images/<?php echo $p_img; ?>" width="100%" height="100%">
                          </div>
                          <div class="bottom-presentation">
                                <div class="product-title">
                                    <a href="product-details.php?productID=<?php echo $p_id; ?>"><?php echo $p_name; ?></a>
                                </div>
                                <div class="product-price">
                                  <span> $<?php echo $p_price; ?></span>
                                  <span> In stock</span>
                                </div>
                                <div class="product-widget">
                                    <div class="Cart-btn">
                                            <a href="index.php?addcart=<?php echo $p_id; ?>">ADD TO CART</a>
                                    </div>
                                    <div class="view-btn">
                                          <a href="productDtails.php?productID=<?php echo $p_id;?>">SHOP NOW</a>
                                    </div>
                                </div>
                          </div>
                    </div><!--End presentation-->
                <?php } ?>

              </div>
              <!--Product content conatainer  END -->
        </div>
          <!--Product container -->
<?php include('footer.php'); ?>
