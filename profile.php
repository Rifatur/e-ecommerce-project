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
							<a href="profile.php?">Profile</a>
							<a href="my_order.php?customer=<?php echo$cunstomer?>">Orders</a>
							<a href="logout.php">Log Out</a>

						</div>
			</div>
			<div class="rightSideContent">

        <?php
        $conn=mysqli_connect("localhost","root","","greenleaf");
                   if($conn){

                   }else {
                       die("connection failed" .mysqli_connect_error());
                   }
                   $customer_session=$_SESSION['Email'];
                   $query= "SELECT * FROM customers  WHERE Email='$customer_session'";
                   $result=mysqli_query($conn,$query);

                   while($row=mysqli_fetch_assoc($result)){
                $customerID =$row["customerID"];
                $fname =$row["FirstName"];
                $lname=$row["LastName"];
                $email=$row["Email"];
                $pass=$row["C_pass"];
                $gender=$row["gender"];
                $address=$row["Address"];
                $city=$row["city"];
                $zipcode=$row["country"];
                $County=$row["zipCode"];
                $Phone=$row["phone"];
                $regDate=$row["regDate"];
                $customerIP=$row["customerIP"];
            ?>

        <table>
            <tr> <td>First Name</td> <td> <?php echo $fname; ?> </td></tr>
            <tr> <td>LastName</td> <td><?php echo $lname; ?></td></tr>
            <tr> <td>PassWord</td><td><?php echo $pass; ?></td></tr>
            <tr> <td>Email</td><td><?php echo $email; ?></td></tr>
              <tr> <td>Gender</td><td><?php echo $gender; ?></td></tr>
              <tr> <td>Address</td><td><?php echo $address; ?></td></tr>
              <tr> <td>City</td><td><?php echo $city; ?></td></tr>
              <tr> <td>zipCode</td><td><?php echo $zipcode; ?></td></tr>
              <tr> <td>Country</td> <td><?php echo $County; ?></td></tr>
              <tr> <td>Phone number</td> <td><?php echo $Phone; ?></td></tr>
              <tr> <td>Submit Date</td><td><?php echo $regDate; ?></td></tr>
              <tr> <td>Submit IP NO</td><td><?php echo $customerIP; ?></td></tr>
        </table>
      <?php } ?>
      <div class="update">
        <a href="updateinfo.php"> UPDATE INFO</a>
      </div>
			</div>
		</div>

	</div>


<?php include('footer.php'); ?>
