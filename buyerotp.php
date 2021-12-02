<?php

$name = $_GET['name'];
$namebuy = $_GET['namebuy'];
$namecart = $_GET['namecart'];
$email = $_GET['email'];
$password = $_GET['password'];
$code = $_GET['now'];
// echo "Value of : ". $_GET["now"];
// var_dump($name);
// var_dump($password);
if(isset($_POST['submit'])){
  $recode = $_POST['recode'];
  // $recode1 = intval($recode);
//   echo $code."|";
// echo $recode;
// var_dump($code);
// var_dump($_POST);
  if($recode == $code){

  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db("buyer", $connect);

  $sql = "CREATE TABLE $name (id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(40),
  password VARCHAR(40),
  email VARCHAR(40),
  registertime VARCHAR(40),
  PRIMARY KEY(id) )";

  mysql_query($sql) or die( );

  $sql = "CREATE TABLE $namebuy (id INT NOT NULL AUTO_INCREMENT,
  productname VARCHAR(40),
  price INT(40),
  image VARCHAR(200),
  registertime VARCHAR(40),
  aboutproduct VARCHAR(200),
  PRIMARY KEY(id) )";

  mysql_query($sql) or die("table not create... $sql" );

  $sql = "CREATE TABLE $namecart (id INT NOT NULL AUTO_INCREMENT,
  productname VARCHAR(40),
  price INT(40),
  image VARCHAR(200),
  registertime VARCHAR(40),
  aboutproduct VARCHAR(200),
  PRIMARY KEY(id) )";

  mysql_query($sql) or die( );

  // echo "you registered succcessfully...<br>your table created<br>";
  // $msg1="Account created succcessfully";

  date_default_timezone_set("Asia/Kolkata");
  $time=time();
  $currenttime=strftime("%B-%m-%d %H:%M:%S",$time);
  // echo "your account is created at : ".$currenttime."<br>";

  $query = "INSERT INTO $name (name, password, email, registertime) VALUES ('".$name."', '".$password."', '".$email."','".$currenttime."' ) ";

  $execute = mysql_query($query);

  if($execute) {
    // echo "insert completed...";
    // echo "you want to <a href='buyerlogin.php'>login</a>";
    // $msg2="you want to <a href='buyerlogin.php'>login</a>";
    echo "<script>window.location.href='login.php';</script>";
  }else{
    // echo "insert not completed...";
    // $error2="Error from server";
  }




  }else{
    echo "<script>window.location.href='index.html';</script>";
  }
}



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>otp</title>
    <link rel="stylesheet" href="CSS/otp.css">
  </head>
  <body>

    <h1>Enter your OTP</h1>
    <p>check your registerd gmail for verification code</p>
    <div class="form">
        <form class="" action="#" method="post">
          <input type="text" name="recode" autocomplete="off" required/>
          <label for="name" class="label-name">
            <span class="content-name">OTP</span>
          </label>
          </div>
          <div class="btn">
          <!-- <button type="button" name="button">Go Back</button> -->
          <button type="submit" name="submit">Confirm OTP</button>
        </form>


    </div>


  <div class="timer">Page Crash in <span id="time">02:00</span> minutes</div>

    <script type="text/javascript">

      function startTimer(duration, display) {
          var timer = duration, minutes, seconds;
          setInterval(function () {
              minutes = parseInt(timer / 60, 10);
              seconds = parseInt(timer % 60, 10);

              minutes = minutes < 10 ? "0" + minutes : minutes;
              seconds = seconds < 10 ? "0" + seconds : seconds;

              display.textContent = minutes + ":" + seconds;

              if (--timer < 0) {
                  // timer = duration;
                    window.location.href='index.html';
              }
          }, 1000);
      }

      window.onload = function () {
          var fiveMinutes = 60 * 2,
              display = document.querySelector('#time');
          startTimer(fiveMinutes, display);
      };


    </script>
  </body>
</html>
