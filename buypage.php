<?php
$productname= $_GET['productname'];
$namebuy=$_GET['namebuy'];
$image = $_GET['image'];
$price = $_GET['price'];
$namecart = $_GET['namecart'];
$name=$_GET['name'];
$aboutproduct=$_GET['aboutproduct'];

if(isset($_POST['submit'])){
  // if(empty($_POST['address']) || empty($_POST['number'])){
  //   echo "all fields required";
  // }else{

    $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db('buyer',$connect);


    date_default_timezone_set("Asia/Kolkata");
    $time=time();
    $currenttime=strftime("%B-%m-%d %H:%M:%S",$time);
    echo "<br>time : ".$currenttime."<br>";


    $query = "INSERT INTO $namebuy (productname, price, image, registertime, aboutproduct) VALUES ('".$productname."', '".$price."', '".$image."','".$currenttime."','".$aboutproduct."' ) ";
      $execute = mysql_query($query);
      if($execute) {
        // echo "<br>thank you for buy this product";
        // echo "you want to <a href='sellerlogin.php'>login</a>";
        // starting of SOLD codes*****************************************************************************

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
                  if($productname == $row1['productname'] || $image == $row1['image'] ){
                    echo "<br>working successfully";
                    $status="SOLD";
                    $name1 = $row1['productname'];
                    $update = "UPDATE $i1 SET status = '$status' WHERE price =$price ";
                    $let = mysql_query($update) or die(mysql_error());
                    if($let){
                      // echo "<br>sold successfully";  // refer or redirect
                        echo "<script>window.location.href='productbuy.php?name=".$name."&namebuy=".$namebuy."&namecart=".$namecart."';</script>";
                    }else{
                      echo "<br>not sold successfully";
                    }
                  }else{
                    // echo "not working";
                  }
                }else{
                  // echo "product not present in :".$i1;
                }
              }
            }
        // ending of SOLD codes*******************************************************************************
      }else{
        // echo "<br>you not buy this product";

      }



  // }
  // take a particular product detail using get
  // connect database
  // insert into buyer buy tables
  // delete this product from buyer charset
  // thank you massage

}else{
  // echo "<br><a href='buyerlogout.php'>logout</a>";
}












?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>product details</title>
    <link rel="stylesheet" href="CSS/buystyle.css">
    <!-- <link rel="stylesheet" href="frontpage.css"> -->
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
    <!-- product details -->
<div class="small-container single-product">
  <div class="row">
    <div class="col-2">
      <?php
      echo "<img src='ornaments/".$image."' alt='photo' width='100%' id='productImg'>";
      ?>

      <div class="small-img-row">
        <div class="small-img-col">
          <img src="ring.jpg" alt="" class="smallimg" onclick="change1()">
          </div>
            <div class="small-img-col">
          <img src="boldring.jpg" alt="" class="smallimg" onclick="change2()">
          </div>
            <div class="small-img-col">
          <img src="banner.jpg" alt="" class="smallimg" onclick="change3()">
          </div>
            <div class="small-img-col">
          <img src="taj.jpg" alt="" class="smallimg" onclick="change4()">
        </div>
      </div>
    </div>
    <div class="col-2">

      <?php
      echo "<h1>".$productname."</h1>";
      echo "<h4>₹".$price."</h4>";
    echo "  <h3>".$aboutproduct."</h3>";
        ?>
        <form class="btn1" action="#" method="post">
          <input class="btn" type="submit" name="submit" value="BUY NOW"></input>&nbsp;
        </form>

      <!-- <a href="#" class="btn">Add to Cart</a> -->


    </div>
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
<script>

var productimg = document.getElementById("productImg");
var smallImg = document.getElementsByClassName("smallimg");

function change1(){

    productimg.src = smallImg[0].src;
    console.log(productimg.src);
}
function change2(){

    productimg.src = smallImg[1].src;
}
function change3(){

    productimg.src = smallImg[2].src;
}
function change4(){

    productimg.src = smallImg[3].src;
}
</script>
  </body>
</html>
