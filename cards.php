<?php

session_start();

$submit = $_SESSION['submit'];
$name = $_SESSION['username'];
$namebuy = $_SESSION['namebuy'];
$namecart = $_SESSION['namecart'];

if(isset($submit)){
  // echo "product list<br>";

  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db('seller',$connect);       // connect with seller database


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>card</title>
    <link rel="stylesheet" href="CSS/cards.css">
    </head>
  <body>
    <!-- header -->
  <header>
    <div class="top">
      <div class="navbar">
        <div class="logo">
          <h3>ORNAMENTS </h3>
          <h4>MARKET 🙪</h4>
          <!-- <img src="displayphoto/ring.jpg" alt="logo" width="125px"> -->
        </div>
        <nav>
          <ul>

          </ul>
        </nav>
        <?php
        echo "<h4>welcome ".$name."</h4> |&nbsp";
        echo "<h4><a href='productbuy.php?name=".$name."&namebuy=".$namebuy."&namecart=".$namecart."'>BUY</a></h4> |&nbsp";
        echo "<h4><a href='cart.php?name=".$name."&namebuy=".$namebuy."&namecart=".$namecart."'>CART</a></h4> |&nbsp";  // show all cart products
        echo "<h5><a href='buyerlogout.php'>logout</a></h5> | &nbsp";
        echo "<h6><a href='buyerdelete.php?name=".$name." & buytable=".$namebuy." & carttable=".$namecart."'>Delete account</a></h6>";
        ?>
      </div>
    </div>
  </header>

    <!-- product list -->
<div class="container">
  <nav>
    <ul>

      <?php

      $i1 = '';
      $row1 = '';
      $tablecheck = "SHOW TABLES FROM seller ";    // show all table name present in seller DB
      $check = mysql_query($tablecheck);
  while($row = mysql_fetch_array($check)){
    // echo "<br>table name: ".$row[0]."<br>";

      $i1 = $row[0];
      $sql = "SELECT * FROM $i1";    // select all things from a particular table with each table
      $check1 = mysql_query($sql);

      while($row1 = mysql_fetch_array($check1)){
      if(isset($row1['productname']) || isset($row1['image']) || isset($row1['price']) || isset($row1['aboutproduct'])){  // checking list present or not


    echo "<li><div class='card'>";
    echo "<div class='imgBx'>";
    echo "<img class='image' src='ornaments/".$row1['image']."' alt='img' width='50%'' height='50%'>";
    echo "</div>";
    echo "<div class='contentBx'>";
          // <!-- product name -->
    echo " <h2>".$row1['productname']."</h2>";

          // <!-- price and weight -->
      echo "<div class='size'>";
      echo "<h3>Price :".$row1['price']."</h3>";
            // <span></span>

        echo "</div>";
          // <div class="color">
          //   <h3>color :</h3>
          //   <span></span>
          //   <span></span>
          // </div>
          // <!-- buy button refer to buy page using get method -->

        echo "<a href='buypage.php?productname=".$row1['productname']."& image=".$row1['image']."& price=".$row1['price']."& namecart=".$namecart."& namebuy=".$namebuy."& name=".$name."& aboutproduct=".$row1['aboutproduct']."'>BUY NOW</a><br>";
        echo "<a href='cart.php?productname=".$row1['productname']."& image=".$row1['image']."& price=".$row1['price']."& namecart=".$namecart."& namebuy=".$namebuy."& name=".$name."& aboutproduct=".$row1['aboutproduct']."'>Add to Cart</a>";
      echo "</div>";
      echo"</div></li>";
    }else{
      // echo "<br>product not found";
    }

}
}
}else {
  echo "<script>window.location.href='index.html';</script>";
}
?>
    </ul>
  </nav>

</div>
<!--footer  -->
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
