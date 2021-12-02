<?php

if(isset($_GET['name'])){
  // echo "account delete";

  $name=$_GET['name'];
    $buytable=$_GET['buytable'];
    $carttable=$_GET['carttable'];

    if(isset($_POST['delete1'])){


      $connect= mysql_connect('localhost','root','');
      $select= mysql_select_db('buyer',$connect);

      $delete = "DROP TABLE $name ";
      $execute = mysql_query($delete) or die(mysql_error());
      if($execute){
        $delete = "DROP TABLE $buytable ";
        $execute = mysql_query($delete) or die(mysql_error());
        if($execute){


          $delete = "DROP TABLE $carttable ";
          $execute = mysql_query($delete) or die(mysql_error());
          if($execute){
             echo "<script>window.location.href='index.html';</script>";
          }else{
            // echo "not deleted";
          }
        }else {
          // echo "<br>product table not deleted";
        }
      }else {
        // echo "<br>seller table not deleted";
      }

    }
  echo "<!DOCTYPE html>";
  echo "<html lang='en' dir='ltr'>";
  echo "<head>";
  echo "<meta charset='utf-8'>";
  echo "<title>delete</title>";
  echo "<link rel='stylesheet' href='CSS/delete.css'>";
  echo "</head>";
  echo "<body>";
  echo "<h1>Why leaveing Us</h1>";
  echo "<div class='form'>";
  echo "<form action='#' method='post'>";
  echo "<input type='text' name='reason' autocomplete='off' required/>";
  echo "<label for='name' class='label-name'>";
  echo "<span class='content-name'>Explain Reason</span>";
  echo "</label>";
  echo "</div>";

  echo "<div class='btn'>";
  echo "<input type='submit' name='delete1' value='DELETE'>";
    echo "</form><br><br>";
  // echo "<button type='button' name='button'>Delete Account</button>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
}else{
  echo "<h1>AUTHORIZATION REVOKED</h1>";
}
?>
