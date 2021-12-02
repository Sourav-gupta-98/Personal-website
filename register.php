<?php



$error1="";
$error2="";
$error3="";
$error4="";
$error5="";
$error6="";
$msg1="";
$msg2="";
$mailerror="";
if (isset($_POST['buyerregister'])) {
  if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['pass1']) ){
    echo "all fields required...";
  }else{
    $name=$_POST['name'];
    $namebuy = $_POST["name"]."buy";
    $namecart = $_POST["name"]."cart";
    $email=$_POST['email'];
    $password=$_POST['pass'];


    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db("buyer", $connect);

    $tablecheck = "SHOW TABLES FROM buyer like '".$name."'";
      $check = mysql_query($tablecheck);
      $rnum = mysql_num_rows($check);
      if($rnum == 1) {

        // echo "<br>this username is registerd... <br>try again";
        $error1="this username is registerd...";
      }else{

        $random = rand(100000,999999);
        // echo $random;

        // echo gettype($random);
        $ran=$random;
        $read = "Your OTP : ".$ran." Don't share this one time password to any one";
        // echo $read;
        $reason ="conform varification code";
        $from = "From:souravgupta5656@gmail.com" ;

        // echo "<script>window.location.href='otp.php ? now=".$random."& name=".$name." & namebuy= ".$namebuy." & namecart= ".$namecart." & email= ".$email." & password= ".$password."';</script>";

        $sent= mail($email,$reason,$read, $from);
        if($sent){
          // echo "yes";
          // echo "<script>window.location.href='otp.php ? name=".$name." & namebuy = ".$namebuy." & namecart = ".$namecart." & email = ".$email." & password = ".$password." & code = ".$real." ';</script>";
          echo "<script>window.location.href='buyerotp.php?name=".$name."&namebuy=".$namebuy."&namecart=".$namecart."&email=".$email."&password=".$password."&now=".$ran."';</script>";

        }else {
          // echo "no";
          $mailerror ="your email is not recorganized";
        }



}
}
}

if(isset($_POST["sellerregister"])) {
if(empty($_POST["name"]) || empty($_POST["email"])|| empty($_POST["pass"]) || empty($_POST["pass1"])){
  echo "all fields required";
}else{
  $name=$_POST["name"];
  $nameproduct = $_POST["name"]."product";
  $email=$_POST["email"];
  $password=$_POST["pass"];

  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db("seller", $connect);

  $execute=null;

  $tablecheck = "SHOW TABLES FROM seller like '".$name."'";
    $check = mysql_query($tablecheck);
    $rnum = mysql_num_rows($check);
    if($rnum == 1) {

      // echo "<br>this username is registerd... <br>try again";
      $error3="this username is registerd...";
      }else{

        $random = rand(100000,999999);
        // echo $random;

        // echo gettype($random);
        $ran=$random;
        $read = "Your OTP : ".$ran." Don't share this one time password to any one";
        // echo $read;
        $reason ="conform varification code";
        $from = "From:souravgupta5656@gmail.com" ;

        // echo "<script>window.location.href='otp.php ? now=".$random."& name=".$name." & namebuy= ".$namebuy." & namecart= ".$namecart." & email= ".$email." & password= ".$password."';</script>";

        $sent= mail($email,$reason,$read, $from);
        if($sent){
          // echo "yes";
          // echo "<script>window.location.href='otp.php ? name=".$name." & namebuy = ".$namebuy." & namecart = ".$namecart." & email = ".$email." & password = ".$password." & code = ".$real." ';</script>";
          echo "<script>window.location.href='sellerotp.php?name=".$name."&nameproduct=".$nameproduct."&email=".$email."&password=".$password."&now=".$ran."';</script>";

        }else {
          // echo "no";
          $mailerror ="your email is not recorganized";
        }

  }
}
}

if(isset($_POST["adminregister"])) {
  session_start();
  if(empty($_POST["name"]) || empty($_POST["email"])|| empty($_POST["pass"]) || empty($_POST["pass1"])){
    echo "all fields required";
  }else{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["pass"];

    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db("admin", $connect);

    $tablecheck = "SHOW TABLES FROM admin like '".$name."'";
      $check = mysql_query($tablecheck);
      $rnum = mysql_num_rows($check);

      if($rnum == 1) {

        // echo "<br>this username is registerd... <br>try again";
        $error5="this username is registerd... ";
      }else{

        $random = rand(100000,999999);
        // echo $random;

        // echo gettype($random);
        $ran=$random;
        $read = "Your OTP : ".$ran." Don't share this one time password to any one";
        // echo $read;
        $reason ="conform varification code";
        $from = "From:souravgupta5656@gmail.com" ;

        // echo "<script>window.location.href='otp.php ? now=".$random."& name=".$name." & namebuy= ".$namebuy." & namecart= ".$namecart." & email= ".$email." & password= ".$password."';</script>";

        $sent= mail($email,$reason,$read, $from);
        if($sent){
          // echo "yes";
          // echo "<script>window.location.href='otp.php ? name=".$name." & namebuy = ".$namebuy." & namecart = ".$namecart." & email = ".$email." & password = ".$password." & code = ".$real." ';</script>";
          echo "<script>window.location.href='adminotp.php?name=".$name."&email=".$email."&password=".$password."&now=".$ran."';</script>";

        }else {
          // echo "no";
          $mailerror ="your email is not recorganized";
        }


      }
  }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ornaments</title>
    <link rel="stylesheet" href="CSS/style.css">
      <link rel="stylesheet" href="CSS/frontstyle.css">
      <style media="screen">
      body {
        
background-image: url('displayphoto/banner.jpg');
background-repeat: no-repeat;
}
      </style>
  </head>
  <body>

    <div class="hero">

      <div class="form-box">
        <img id="topimage" src="displayphoto/taj.jpg" alt="logo"><br><br>
        <h3 id="banner">Register as :</h3>
          <div class="button-box">
            <div id="btn">

            </div>
<button type="button" class="toggle-btn" onclick="login()">BUYER</button>
<button type="button" class="toggle-btn" onclick="register()">SELLER</button>
<button type="button" class="toggle-btn" onclick="admin()">ADMIN</button>

          </div>
          <div class="social-icons">
            <img src="icons/telegram.png" alt="">
            <img src="icons/facebook.png" alt="">
            <img src="icons/linkedin.png" alt="">

          </div>
          <!-- BUYER Register -->
          <form id="login" class="input-group" action="#" method="post"><br><br>
                <!-- <input type="text" class="input-field" placeholder="User Id">
                <input type="text" class="input-field" placeholder="enter password"><br><br> -->
                  <h6 id="loginerror1"><?php echo $error1;  ?></h6>
                  <h6 id="loginerror2"><?php echo $error2; ?></h6>
                  <h6><?php echo $msg1; ?></h6>
                  <h6><?php echo $msg2; ?></h6>
                  <h6 id="loginerror1"><?php echo $mailerror;  ?></h6>
                <div class="form">
                  <input type="text" name="name" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Create Username</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="email" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Email</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="pass" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Create Password</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="pass1" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Confirm Password</span>
                  </label>
                </div><br><br>
                <button type="submit" class="submit-btn" name="buyerregister">Create Account</button>

          </form>
          <!-- SELLER REGISTER -->
          <form id="register" class="input-group" action="#" method="post"><br><br>
                <!-- <input type="text" class="input-field" placeholder="User Id">
                <input type="text" class="input-field" placeholder="email">
                <input type="text" class="input-field" placeholder="enter password"><br><br> -->
                <h6 id="loginerror1"><?php echo $error3; ?></h6>
                <h6 id="loginerror2"><?php echo $error4; ?></h6>
                <div class="form">
                  <input type="text" name="name" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Create Sellername</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="email" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Email</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="pass" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Create Password</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="pass1" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Confirm Password</span>
                  </label>
                </div><br><br>
                <button type="submit" class="submit-btn" name="sellerregister">Create Account</button>

          </form>
          <!-- admin register -->
          <form id="admin" class="input-group" action="#" method="post"><br><br>
                <!-- <input type="text" class="input-field" placeholder="User admin">
                <input type="text" class="input-field" placeholder="email">
                <input type="text" class="input-field" placeholder="enter password"><br><br> -->
                <h6 id="loginerror1"><?php echo $error5;  ?></h6>
                <h6 id="loginerror2"><?php echo $error6; ?></h6>

                <div class="form">
                  <input type="text" name="name" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Create Adminname</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="email" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Email</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="pass" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Password</span>
                  </label>
                </div>
                <div class="form">
                  <input type="text" name="pass1" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Confirm Password</span>
                  </label>
                </div>
                <br><br>
                <button type="submit" class="submit-btn" name="adminregister">Create Account</button>

          </form>
      </div>
    </div>
    <script type="text/javascript">
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("btn");
      var a = document.getElementById("admin");
      function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
        a.style.left = "410px";
      }
      function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
        a.style.left = "850px";
      }
      function admin(){
        x.style.left = "-850px";
        y.style.left = "-450px";
        z.style.left = "220px";
        a.style.left = "50px";
      }
    </script>
  </body>
</html>
