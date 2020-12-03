<?php include('header.php'); ?>
	<div class="Form-Container">
			<div class="bannerCtn">
				<img src="image/y.jpg">
			</div>
			<div class="FormContent">
				 <div class="innerContent">
				 		<form action="signup.php" method="POST"  enctype="multipart/form-data">
							<div class="insert-data">
						 	<div class="input-filter">
					          <input type="text" name="fname" value=""required>
					          <label>First Name </label>
					          <span></span>
					        </div>
						 	<div class="input-filter">
					          <input type="text" name="lname" value=""required>
					          <label>Last Name </label>
					          <span></span>
					        </div>
					        <div class="input-filter">
					          <input type="text" name="email" value=""required>
					          <label>Your Email </label>
					          <span></span>
					        </div>
					        <div class="input-filter">
					          <input type="text" name="pass" value="" required>
					          <label>PassWord</label>
					          <span></span>
					        </div>
					        <div class="input-filter">
					        	GENDER : <select class="" name="gender">
					        	 	<option value="">Select Option</option>
			                        <option value="MALE">MALE </option>
			                        <option value="FEMALE">FEMALE</option>
			                    </select>
					        </div>
					         <div class="input-filter">
					          <input type="text" name="address" value="" required>
					          <label>Address</label>
					          <span></span>
					        </div>

					         <div class="input-filter">
					          <input type="text" name="city" value="" required>
					          <label>City</label>
					          <span></span>
					        </div>

					        <div class="input-filter">
					          <input type="text" name="zipcode" value="" required>
					          <label>Zip Code</label>
					          <span></span>
					        </div>

					        <div class="input-filter">
					          <input type="text" name="County" value="" required>
					          <label>County</label>
					          <span></span>
					        </div>
					        <div class="input-filter">
					          <input type="text" name="Phone" value="" required>
					          <label>Phone Number</label>
					          <span></span>
					        </div>
					        <div class="input-filter">
					          <input type="submit" name="add" value="Sign UP"required="required">

					        </div>
							
				 		</form>
				 </div>

			</div>

	</div>
<?php include('footer.php'); ?>
<?php 
      $ip=getIp();
      $conn=mysqli_connect("localhost","root","","greenleaf");

      if(isset($_POST['add'])){

          $fname =$_POST["fname"];
          $lname=$_POST["lname"];
          $email=$_POST["email"];
          $pass=$_POST["pass"];
          $gender=$_POST["gender"];
          $address=$_POST["address"];
          $city=$_POST["city"];
          $zipcode=$_POST["zipcode"];
          $County=$_POST["County"];
          $Phone=$_POST["Phone"];
          $Inquery="INSERT INTO customers(`FirstName`, `LastName`, `C_pass`, `Email`, `gender`, `Address`, `city`, `country`, `zipCode`, `phone`, `regDate`,`customerIP`)VALUES ('$fname', '$lname', '$pass', '$email',' $gender','$address','$city','$County',' $zipcode','$Phone',CURDATE(),'$ip')";
          $run=mysqli_query($conn,$Inquery);
	         if($run){
	         echo "<script> alert('registation Successfully !')</script>";
	         echo "<script> window.open('login.php','_self')</script>";
	        }

      }




 ?>