<?php include('header.php'); ?>
<div class="loginarea">

    <div class="login-box">
      <form class="" action="login.php" method="post">


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
          <input type="checkbox" name="" value="">
          <label class="label">I Agree All Statement At <a href="">Terms of Service </a> </label>
        </div>
        <div class="input-filter">
          
        </div>
        <div class="input-filter">
          <input type="submit" name="login" value="Log In"required="required">

        </div>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
<?php
          $conn=mysqli_connect("localhost","root","","greenleaf");
          if (isset($_POST['login'])) {
            // code...
                $Email=$_POST['email'];
                $pass=$_POST['pass'];

                $query="SELECT * FROM customers WHERE Email='$Email'AND C_pass='$pass'";
                $runQuery=mysqli_query($conn,$query);
                $rowQuery= mysqli_num_rows($runQuery);
                if ($rowQuery==1) {
                  // code...
                  $_SESSION['Email']=$Email;

                  header('location:index.php');
                }else{
                  echo "";
                  header('location:login.php');
                }


          }


 ?>
