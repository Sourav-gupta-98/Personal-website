<?php
session_start();

if(isset($_GET['name'])){

$name = $_SESSION['name'];
$name1 = $_GET['name'];


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <link rel="stylesheet" href="CSS/admininside.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <div class="top">
        <div class="navbar">
          <div class="logo">
              <h1>ORNAMENTS<BR>MARKET 🙪</h1>
            <!-- <img src="ring.jpg" alt="logo" width="125px"> -->
          </div>
          <nav>
            <ul>
              <?php
              if(isset($name)){
              echo "<div class='btn'>";
              echo "<form action='#' method='post'>";
              echo "<input type='submit' name='seeuploades' value=' See Uploaded products '>";
              echo "</form>";
              echo "<form action='#' method='post'>";
              echo "<input type='submit' name='seebuyproducts' value=' See buy products '>";
              echo "</form>";
              echo "<form action='#' method='post'>";
              echo "<input type='submit' name='Deleteselleraccount' value=' Delete Seller Account '>";
              echo "</form>";
              // <button class="btn1" type="button" name="button">button</button>
              // <button  class="btn2" type="button" name="button">button</button>
              // <button class="btn3" type="button" name="button">button</button>
              echo "</div>";
              }else{
              echo "<script>window.location.href='index.html';</script>";
              }
              }else{
              echo "<script>window.location.href='index.html';</script>";
              }
              ?>
            </ul>
          </nav>
          <?php
           echo "<h3>welcome ".$name."</h3> |&nbsp";
          echo "<h4><a href='adminlogout.php'>logout</a></h4> | &nbsp";

          echo "<h6><a href='admindelete.php?name=".$name." '>Delete account</a></h6>";
          ?>
        </div>
      </div>
    </header>
    <!-- all things -->



<!-- take this div times  -->
<div class="container1">
  <!-- <h2 class="title">Registered product</h2> -->
  <nav>
    <ul>
<?php

if(isset($_POST['seeuploades'])){
  // echo "see uploades";
  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db('seller',$connect);

  $i1 = '';
  $row1 = '';
  $tablecheck = "SHOW TABLES FROM seller ";    // show all table name present in seller DB
    $check = mysql_query($tablecheck);
    while($row = mysql_fetch_array($check)){

        $i1 = $row[0];
        $sql = "SELECT * FROM $i1";    // select all things from a particular table with each table
        $check1 = mysql_query($sql);
        while($row1 = mysql_fetch_array($check1)){
          if(isset($row1['productname']) || isset($row1['image']) || isset($row1['price']) || isset($row1['aboutproduct'])){
              $tablename=$i1;
              echo "    <li>";
              echo "<div class='card'>";
              echo "<div class='imgBx'>";
              echo "<img src='ornaments/".$row1['image']."' alt=''>";
              echo "</div>";
              echo "<div class='contentBx'>";
              echo "<h4>".$i1."</h4>";
                // echo "<h4".$tablename."</h4>";
              echo "<h4>".$row1['productname']."</h4>";
              // echo "<h4>weight</h4>";
              echo "<h6>".$row1['price']."</h4>";
              // echo "<h5>status</h5>";
              // echo "<button type='button' name='button'>delete</button>";
              echo "<h4>".$row1['aboutproduct']."</h4>";
              echo "</div>";
              echo "</div>";
              echo "</li>";
              }
        }
}
}


if(isset($_POST['seebuyproducts'])){
  // echo "see buy products";
  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db('buyer',$connect);

$tablecheck = "SHOW TABLES FROM buyer ";
$check = mysql_query($tablecheck);
while($row = mysql_fetch_array($check)){
  $tablename = $row[0]."buy";
  // echo $tablename;
  $sql = "SELECT * FROM $tablename";
  $check1 = mysql_query($sql);
  if($check1){
    while($row1 = mysql_fetch_array($check1)){

  echo "    <li>";
  echo "<div class='card'>";
  echo "<div class='imgBx'>";
  echo "<img src='ornaments/".$row1['image']."' alt=''>";
  echo "</div>";
  echo "<div class='contentBx'>";
    echo "<h4".$tablename."</h4>";
  echo "<h4>".$row1['productname']."</h4>";
  // echo "<h4>weight</h4>";
  echo "<h6>".$row1['price']."</h4>";
  // echo "<h5>status</h5>";
  // echo "<button type='button' name='button'>delete</button>";
  echo "<h4>".$row1['aboutproduct']."</h4>";
  echo "</div>";
  echo "</div>";
  echo "</li>";
}
}else{
  // table not exist
}
}
}

if(isset($_POST['Deleteselleraccount'])){
// echo "<br>delete seller";
$connect= mysql_connect('localhost','root','');
$select= mysql_select_db('seller',$connect);

  $i1 = '';
  $row1 = '';
  $tablecheck = "SHOW TABLES FROM seller ";    // show all table name present in seller DB
    $check = mysql_query($tablecheck);
    while($row = mysql_fetch_array($check)){
      $i1 = $row[0];
      $sql = "SELECT * FROM $i1";    // select all things from a particular table with each table
      $check1 = mysql_query($sql);
      while($row1 = mysql_fetch_array($check1)){
          if(isset($row1['name']) || isset($row1['password']) || isset($row1['email']) || isset($row1['registertime'])){
              $producttable = $i1."product";
              $i=0;

              echo "    <li>";
              echo "<div class='card'>";
              // echo "<div class='imgBx'>";
              // echo "<img src='".$row1['image']."' alt=''>";
              // echo "</div>";
              echo "<div class='contentBx'>";
              // echo "<img weight='100px' height='100px' src='displayphoto/u1.png' alt='seller image'>";
                echo "<h4>".$row1['name']."</h4>";
              echo "<h4>".$row1['email']."</h4>";
              // echo "<h4>weight</h4>";

              echo "<h6>".$row1['registertime']."</h4>";
              // echo "<h5>status</h5>";
              // echo "<button type='button' name='button'>delete</button>";
              // echo "<h4>".$row1['aboutproduct']."</h4>";


              $sql = "SELECT * FROM $producttable";
              $check1 = mysql_query($sql);
              while($row1 = mysql_fetch_array($check1)){
                if(isset($row1['productname']) || isset($row1['image']) || isset($row1['price']) || isset($row1['aboutproduct'])){
                  $i++;
                }
              }
              echo "<h6>total item: ".$i."</h6>";

              echo "<a href='admindeleteseller.php?name=".$i1."&tablename=".$producttable."&name1=".$name1."'>Delete Seller</a>";

              echo "</div>";
              echo "</div>";
              echo "</li>";

          }
      }
    }

}


?>

    </ul>
  </nav>
</div>

    <!-- footer -->
    <div class="footer">
      <hr>
      <center>
      <h4>for any query contact us on: </h4>
      <h4>souravgupta5656@gmail.com</h4><br>
      &#169;All right reserverd
    </center>
    </div>

  </body>
</html>
