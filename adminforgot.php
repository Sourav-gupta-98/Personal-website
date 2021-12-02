<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
  </head>
  <body>
    <center><br>
    <form class="" action="#" method="post">
      <input class="in" type="text" name="name" value="" placeholder="Your Name">
      <input class="in" type="text" name="email" value="" placeholder="Your Email">
      <input class="in" type="submit" name="submit" value="Find password">
    </center>
  </form><br>
  </body>
</html>




<?php

if(isset($_POST['submit'])){
  if(empty($_POST['name']) || empty($_POST['email']) ){
        echo "all fields required";
      }else{
        $name = $_POST['name'];
     $email = $_POST['email'];

     $connect= mysql_connect('localhost','root','');
     $select= mysql_select_db('admin',$connect);

     $sql = "SELECT * FROM $name";
     $check = mysql_query($sql);
     if($check===FALSE){
       echo "<center>";
       echo "<h3>user not exist</h3>";
       echo "</center>";
     }else{
       $rnum = mysql_fetch_array($check);
       if($email == $rnum['email']){
        // echo "match completed";
        echo "<center>";
        echo "<br><br>your username: ".$rnum['name'];
        echo "<br>your password: ".$rnum['password'];
        echo "<br>your account registered at: ".$rnum['registertime'];
        echo "<br>you want to login:<a href='login.php'> login</a> ";
        echo "</center>";
        }else{
            echo "<center>";
        echo "user not exist";
        echo "</center>";
      }
}
}
}
?>
