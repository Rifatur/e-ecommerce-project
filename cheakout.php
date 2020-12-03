<?php include('header.php'); ?>

<?php 
    if (!isset($_SESSION['Email'])) {
        header('location:login.php');
    }


 ?>
<?php
            global $conn;
            $ip=getIp();
            $QueryForcustomer="SELECT * FROM customers WHERE customerIP='$ip'";
            $run_query=mysqli_query($conn,$QueryForcustomer);
            while ($reccord=mysqli_fetch_assoc($run_query)) {
                $customerID= $reccord['customerID'];

            }
         ?>
		<div class="cheakoutBox">
		<h1>Select Payment Option </h1>

		<span><a href="order.php?cid=<?php echo $customerID;?>"> CASH ON DELIVERY</a> </span>


</div>





<?php include('footer.php'); ?>