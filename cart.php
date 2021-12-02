<?php





if(!empty($_GET['productname'])){ // save product in cart
$productname= $_GET['productname'];
$namebuy=$_GET['namebuy'];
$image = $_GET['image'];
$price = $_GET['price'];
$namecart = $_GET['namecart'];
$name=$_GET['name'];
$aboutproduct=$_GET['aboutproduct'];

date_default_timezone_set("Asia/Kolkata");
$time=time();
$currenttime=strftime("%B-%m-%d %H:%M:%S",$time);
// echo "<br>time : ".$currenttime."<br>";

$connect= mysql_connect('localhost','root','');
$select= mysql_select_db('buyer',$connect);

$query = "INSERT INTO $namecart (productname, price, image, registertime, aboutproduct) VALUES ('".$productname."', '".$price."', '".$image."','".$currenttime."','".$aboutproduct."' ) ";
  $execute = mysql_query($query);
  if($execute) {
    // echo "product is added in your cart";
    // echo "you want to <a href='sellerlogin.php'>login</a>";
  }else{
    // echo "product is not added in your cart";
  }
  $_SESSION['username'] = $name;
      $_SESSION['namebuy'] = $namebuy;
      $_SESSION['namecart'] = $namecart;
      $_SESSION['submit'] = "submit";

  echo "<script>window.location.href='cards.php';</script>";

  }else{

    $name= $_GET['name'];
    $namebuy=$_GET['namebuy'];
    $namecart=$_GET['namecart'];

    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db('buyer',$connect);

    $sql = "SELECT * FROM $namecart";
    $result = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>cart</title>
    <link rel="stylesheet" href="CSS/cart.css">
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
           echo "<h3>welcome ".$name."</h3> |&nbsp";

          echo "<h4><a href='buyerlogout.php'>logout</a></h4> | &nbsp";
            ?>
        </div>
      </div>
    </header>

    <!-- items -->
<div class="small-container cart-page">
  <table>
    <tr>
      <th>products</th>
      <th>quantity</th>
      <th>subtotal</th>
    </tr>
<?php
while ($row = mysql_fetch_array($result)) {

  $name= $_GET['name'];
  $namebuy=$_GET['namebuy'];
  $namecart=$_GET['namecart'];


  if(isset($row['productname']) && isset($row['image']) && isset($row['price']) && isset($row['aboutproduct'])){

    echo "<tr>";
    echo "<td><div class='cart-info'>";
    echo "<img src='ornaments/".$row['image']."' alt='img' width='50px'>";
    echo "<div class=''>";
    echo "<p>".$row['productname']."</p>";
    echo "<p>about product:".$row['aboutproduct']."</p>";
    echo "<small>price: ".$row['price']."</small><br>";
    echo "<a href='buypage.php?productname=".$row['productname']."& image=".$row['image']."& price=".$row['price']."& namecart=".$namecart."& namebuy=".$namebuy."& name=".$name."& aboutproduct=".$row['aboutproduct']."'>BUY NOW</a> ";

    echo "<br><a href='deletebuyercartproduct.php?name1=".$name." & namebuy=".$namebuy." & tablename=".$namecart."& name=".$row['productname']."& image=".$row['image']."& price=".$row['price']." '>Remove</a>";
    echo "</div>";
    echo "</div></td>";
    echo "<td><input type='number' name='' value='1' disabled></td>";
    echo "<td>".$row['price']."</td>";
    echo "</tr>";
  }else{
echo "you not added any product into your cart";
}
}
?>
  </table>

  <div class="total-price">
    <table>
      <!-- <tr>
        <td>subtotal</td>
        <td>$2.00</td>
      </tr>
      <tr>
        <td>tax</td>
        <td>$2.0</td>
      </tr>
      <tr>
        <td>total</td>
        <td>$200.00</td>
      </tr> -->
      <tr>
        <td></td>
        <?php

        $namebuy=$_GET['namebuy'];






}
        ?>
      </tr>
    </table>
  </div>
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
