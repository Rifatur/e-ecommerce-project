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
							<a href="profile.php">Profile</a>
							<a href="my_order.php?customer=<?php echo$cunstomer?>">Orders</a>
							<a href="logout.php">Log Out</a>

						</div>
			</div>
			<div class="rightSideContent">
					<div class="defaultext">
							<p> Welcome back GreenLeaf E-Store</p>

					</div>
					<?php getData(); ?>

					<?php  if(isset($_GET['my_orders'])){include("my_order.php");}?>



			</div>
		</div>

	</div>


<?php include('footer.php'); ?>
