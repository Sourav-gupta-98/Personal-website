<?php

session_start();
$error1="";
$error2="";
$error3="";
$error4="";
$error5="";
$error6="";

if(isset($_POST['buyersubmit'])){
  if(empty($_POST['username']) || empty($_POST['password'])){
    echo "all fields required...";
  }else{
    $name=$_POST['username'];
    $password=$_POST['password'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['namebuy'] = $_POST['username']."buy";
    $_SESSION['namecart'] = $_POST['username']."cart";
    $_SESSION['submit'] = $_POST['buyersubmit'];
    // $_SESSION['msg'] = 'welcome user';
    date_default_timezone_set("Asia/Kolkata");
    $time=time();
    $currenttime=strftime("%B-%m-%d %H:%M:%S",$time);

    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db('buyer',$connect);
    $tablecheck = "SHOW TABLES FROM buyer like '".$name."' ";
      $check = mysql_query($tablecheck);
      $rnum = mysql_num_rows($check);
      if($rnum == 1) {

          $sql = "SELECT * FROM $name";
          $check = mysql_query($sql);
          $rnum = mysql_fetch_array($check);

          if($name == $rnum['name'] && $password == $rnum['password']){

              // echo "login succcessfully";
             echo "<script>window.location.href='cards.php';</script>";

          }else{
            // echo "wrong name or password";
            $error1 = "wrong name or password";
          }

        }else{
              // echo "user not exist...";
              $error2= "user not exist...";
    }

  }
}

if(isset($_POST["sailorsubmit"])){
  if(empty($_POST["name"]) || empty($_POST["pass"])){
    echo "all fields are required";
  }else {
    $name=$_POST["name"];
    $password=$_POST["pass"];
     // $nameproduct = $_SESSION['name']."product";

     $_SESSION['name'] = $_POST['name']."product";

    date_default_timezone_set("Asia/Kolkata");
    $time=time();
    $currenttime=strftime("%B-%m-%d %H:%M:%S",$time);


    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db('seller',$connect);

    $tablecheck = "SHOW TABLES FROM seller like '".$name."'";
      $check = mysql_query($tablecheck);
      $rnum = mysql_num_rows($check);
      if($rnum == 1) {

          $sql = "SELECT * FROM $name";
          $check = mysql_query($sql);
          $rnum = mysql_fetch_array($check);

          var_dump($password);
          var_dump($rnum['password']);

          if($name == $rnum['name'] && $password == $rnum['password']){

             echo "<script>window.location.href='sell.php?productname=".$_SESSION['name']."& name=".$name."';</script>";
          }else{
            // echo "wrong name or password";
            $error3 = "wrong name or password";

          }

        }else{
              // echo "user not exist...";
              $error4= "user not exist...";
    }
  }
}

if(isset($_POST["adminsubmit"])){
  if(empty($_POST["name"]) || empty($_POST["pass"])){
    echo "all fields are required";
  }else {
    $name=$_POST["name"];
    $password=$_POST["pass"];
    $_SESSION['name'] = $_POST['name'];

    date_default_timezone_set("Asia/Kolkata");
    $time=time();
    $currenttime=strftime("%B-%m-%d %H:%M:%S",$time);

    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db('admin',$connect);

    $tablecheck = "SHOW TABLES FROM admin like '".$name."' ";
      $check = mysql_query($tablecheck);
      $rnum = mysql_num_rows($check);

      if($rnum == 1) {

          $sql = "SELECT * FROM $name";
          $check = mysql_query($sql);
          $rnum = mysql_fetch_array($check);

          if($name == $rnum['name'] && $password == $rnum['password']){

             echo "<script>window.location.href='admininside.php?name=".$name."';</script>";
          }else{
            // echo "wrong name or password";
              $error5 = "wrong name or password";
          }

        }else{
              // echo "user not exist...";
              $error6= "user not exist...";
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
  </head>
  <style media="screen">
  body {

background-image: url('displayphoto/banner.jpg');
background-repeat: no-repeat;
}
  </style>
  <body>

    <div class="hero">

      <div class="form-box">
        <img id="topimage" src="displayphoto/taj.jpg" alt="logo"><br><br>
        <h3>Login as :</h3>
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
          <!-- buyer login section -->
          <form id="login" class="input-group" action="#" method="post"><br><br>
                <!-- <input type="text" class="input-field" placeholder="User Id">
                <input type="text" class="input-field" placeholder="enter password"><br><br> -->
                <h6 id="loginerror1"><?php echo $error1; ?></h6>
                <h6 id="loginerror2"><?php echo $error2; ?></h6>
                <div class="form">
                  <input type="text" name="username" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">User Name</span>
                  </label>
                </div>
                <div class="form">
                  <input type="password" name="password" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Password</span>
                  </label>
                </div><br><br>
                <button type="submit" class="submit-btn" name="buyersubmit">Log in</button><br>
                <h6>Forgotten password?<a href="buyerforgot.php"> Click Here</a></h6><br>
                <h6>Create account?<a href="register.php"> Click Here</a></h6>
          </form>
          <!-- sailor login section -->
          <form id="register" class="input-group" action="#" method="post"><br><br>
                <!-- <input type="text" class="input-field" placeholder="User Id">
                <input type="text" class="input-field" placeholder="email">
                <input type="text" class="input-field" placeholder="enter password"><br><br> -->
                <h6 id="loginerror1"><?php echo $error3; ?></h6>
                <h6 id="loginerror2"><?php echo $error4; ?></h6>
                <div class="form">
                  <input type="text" name="name" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Seller Name</span>
                  </label>
                </div>
                <!-- <div class="form">
                  <input type="password" name="pass" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Email</span>
                  </label>
                </div> -->
                <div class="form">
                  <input type="text" name="pass" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Password</span>
                  </label>
                </div><br><br>
                <button type="submit" class="submit-btn" name="sailorsubmit">Login</button><br>
                <h6>Forgotten password?<a href="sellerforgot.php?ready='ready' ">Click Here</a></h6><br>
                  <h6>Create account?<a href="register.php"> Click Here</a></h6>
          </form>
          <!-- admin login -->
          <form id="admin" class="input-group" action="#" method="post"><br><br>
                <!-- <input type="text" class="input-field" placeholder="User admin">
                <input type="text" class="input-field" placeholder="email">
                <input type="text" class="input-field" placeholder="enter password"><br><br> -->
                <h6 id="loginerror1"><?php echo $error5; ?></h6>
                <h6 id="loginerror2"><?php echo $error6; ?></h6>
                <div class="form">
                  <input type="text" name="name" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Admin Name</span>
                  </label>
                </div>
                <!-- <div class="form">
                  <input type="text" name="name" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Email</span>
                  </label>
                </div> -->
                <div class="form">
                  <input type="text" name="pass" autocomplete="off" required/>
                  <label for="name" class="label-name">
                    <span class="content-name">Password</span>
                  </label>
                </div>
                <br><br>
                <button type="submit" class="submit-btn" name="adminsubmit">Login</button><br>
                <h6>Forgotten password?<a href="adminforgot.php?ready='ready'">Click Here</a></h6><br>
                  <h6>Create account?<a href="register.php"> Click Here</a></h6>
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
