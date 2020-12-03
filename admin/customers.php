
<?php include("header.php");?>
<?php
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }
 ?>

    <div class="navOptions">
            <div class="link"><a href="index.php">Back</a></div>
            <div class="link"><a href="insertcategory.php">add category</a></div>
            <div class="link"><a href="displaycategory.php">view category</a></div>
            <div class="link">
            <form class="" action="getcustomer.php" method="get" enctype="multipart/form-data">
                            <input type="text" name="psearch" value="" placeholder="Search by id">
                            <input type="submit" name="search" value="Search">
                  </form>
            </div>
    </div>
	<div class="QuesDisplayContent">
			<table id="table">
			           <thead>
			             <tr>
			               <th>customerID</th>
			               <th>FirstName</th>
			               <th>LastName</th>
			               <th>passwoad</th>
			               <th>Email</th>
			               <th>gender</th>
			               <th>Address</th>
			               <th>city</th>
			               <th>country</th>
			               <th>zipCode</th>\
			               <th>phone</th>
			               <th>regDate</th>
			               <th>customerIP</th>
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
			                     $query= "SELECT * FROM customers ";
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
			             <tr>
			               <td><?php echo $customerID; ?></td>
			               <td> <?php echo $fname; ?> </td>
			               <td><?php echo $lname; ?></td>
			               <td><?php echo $pass; ?></td>
			               <td><?php echo $email; ?></td>
			               <td><?php echo $gender; ?></td>
			               <td><?php echo $address; ?></td>
			               <td><?php echo $city; ?></td>
			               <td><?php echo $zipcode; ?></td>
			               <td><?php echo $County; ?></td>
			               <td><?php echo $Phone; ?></td>
							<td><?php echo $regDate; ?></td>
							<td><?php echo $customerIP; ?></td>
			               <td>
								<a href="confirm.php">ACTION</a>
			               </td>
			             </tr><!--End tr tag here-->
	           <?php } ?>
	           </tbody>
	      </table>


	</div>

<?php include("footer.php");?>
