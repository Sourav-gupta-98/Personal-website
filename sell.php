<?php

session_start();
// $nameproduct = $_GET['productname'];
// var_dump($_GET['productname']);
if(isset($_GET['productname'])){
  // echo "<h1>seller entry</h1>";
  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db('seller',$connect);
$nameproduct=$_GET['productname'];
$name=$_GET['name'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>sell</title>

  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="CSS/frontstyle.css">
  <link rel="stylesheet" href="CSS/sell.css">
</head>

<body>
  <!-- header -->
  <header><br>
    <div class="top">
      <div class="navbar">
        <div class="logo">
          <h3>ORNAMENTS </h3>
          <h3>MARKET 🙪</h3>
          <!-- <img src="displayphoto/ring.jpg" alt="logo" width="125px"> -->
        </div>
        <nav>
          <ul>


          </ul>
        </nav>
        <?php
        $name=$_GET['name'];
        echo "<h3>welcome ".$name." </h3> |&nbsp";

      echo "<h4><a href='sellerlogout.php'>logout</a></h4> |";
      echo "<h6><a href='sailordelete.php?name=".$name." & product= ".$nameproduct." '>Delete account</a></h6>";
        ?>
      </div>
    </div>
  </header>


 <!-- item register -->
 <?php
  echo "<div class='hero'>";

    echo "<div class='form-box'>";
    echo "<img id='topimage' src='displayphoto/taj.jpg' alt='logo'><br><br>";
      echo"<h3>product Register </h3>";


      echo "<form id='login' class='input-group' action='#' method='post'><br><br>";
        echo"<div class='form'>";
          echo"<input type='hidden' name='size' value='1000000' autocomplete='off' required />";
        echo "</div>";

        echo "<div class='form'>";
          echo "<input type='text' name='nameofproduct' autocomplete='off' required />";
          echo "<label for='name' class='label-name'>";
            echo "<span class='content-name'>Product Name</span>";
          echo "</label>";
        echo "</div>";

        echo "<div class='form'>";
          echo "<input type='text' name='weight' autocomplete='off' required />";
          echo "<label for='name' class='label-name'>";
            echo "<span class='content-name'>Weight in gms</span>";
          echo "</label>";
        echo "</div>";

        echo "<div class='form'>";
          echo "<input type='number' name='price' autocomplete='off' required />";
          echo "<label for='name' class='label-name'>";
            echo "<span class='content-name'>Price</span>";
          echo "</label>";
        echo "</div>";

        echo "<div class='form'>";
          echo "<input type='text' name='text' autocomplete='off' required />";
          echo "<label for='name' class='label-name'>";
            echo "<span class='content-name'>About Product</span>";
          echo "</label>";
        echo "</div>";
              echo "<h5 class='up'>upload image</h5>";
          echo "<input class='upload' type='file' name='image' autocomplete='off' required />";

        echo "<br><br>";

        echo "<button type='submit' class='submit-btn' name='upload'>Register Product</button><br>";

      echo "</form>";
    echo "</div>";
  echo "</div>";
}
?>

<div class="item">
  <div class="small-container">
    <h2 class="title">Recentenly Added</h2>
    <div class="row">
      <div class="col-4">
        <!-- // call upload SECTION FROM HERE -->
        <?php
         echo "<h4>new product dashboard</h4>";

        if(isset($_POST['upload'])){

  if(empty($_POST['nameofproduct']) || empty($_POST['weight']) || empty($_POST['price']) || empty($_POST['image']) || empty($_POST['text'])){
    echo "all field required...";
  }else{

  // $nameproduct = $_GET['nameproduct'];
  // $target = "images/".basename($_FILES['image']['name']);
  $nameproduct = $_GET['productname'];
  // var_dump($nameproduct);
  $nameofproduct=$_POST['nameofproduct'];
  $weight=$_POST['weight'];
  $price=$_POST['price'];
  $image = $_POST['image'];
  $text=$_POST['text'];
  $status="NOT SOLD YET";

  $connect= mysql_connect('localhost','root','');
    $select= mysql_select_db('seller',$connect);

    $sql = "INSERT INTO $nameproduct (productname, weight, price, image, aboutproduct, status) VALUES ('$nameofproduct', '$weight', '$price', '$image', '$text', '$status')";
    $execute = mysql_query($sql) or die("table not create... $sql" );

    if($execute){
        echo "  <img src='ornaments/".$image."' alt=''>";
        echo "<h4 class='iteminfo'>Name:".$nameofproduct."</h4>";
        echo "<h4 class='iteminfo'>Weight:".$weight."</h4>";
        echo "<h4 class='iteminfo'>Price:".$price."</h4>";
        echo "<h4 class='iteminfo'>Status:".$status."</h4>";
        echo "<h4 class='iteminfo'>About:".$text."</h4>";
        }else {
  echo "<br>not uploaded";
}
}
}
?>
      </div>
    </div>
  </div>
</div>
<!-- registerd product -->
<div class="container1">
  <h2 class="title">Registered product</h2>
  <nav>
    <ul>
<!-- // again check productname is set or not and show all products -->
<?php

if(isset($_GET['productname'])){

  $connect= mysql_connect('localhost','root','');
  $select= mysql_select_db('seller',$connect);
  $nameproduct=$_GET['productname'];
$name=$_GET['name'];
  $sql = "SELECT * FROM $nameproduct";
  $result = mysql_query($sql);
  // echo "<h3>Welcome ".$name."</h3>";

while ($row = mysql_fetch_array($result)) {

    echo "  <li>";
        echo "<div class='card'>";
          echo "<div class='imgBx'>";

                echo "<img src='ornaments/".$row['image']."' alt=''>";
                echo "</div>";
                echo "<div class='contentBx'>";
                echo "<h4>Product name:".$row['productname']."</h4>";
                echo "<h4>Weight:".$row['weight']."</h4>";
                echo "<h4>Price:".$row['price']."</h4>";
                echo "<h4>Status:".$row['status']."</h4>";
                echo "<br><br<a href='deletesellproduct.php?nameproduct=".$nameproduct."&name=".$row['productname']."&image=".$row['image']."&price=".$row['price']."&aboutproduct=".$row['aboutproduct']."'>DELETE THIS ITEM</a>";

              echo "</div>";
          echo "</div>";
      echo "</li>";
}
}
?>
    </ul>
  </nav>
</div>
  <!-- footer -->

<div class="footer">
  <center>
    <hr>
  <h4>for any query contact us on:</h4>
  <h4>souravgupta5656@gmail.com</h4><br>
  &#169;All right reserverd
</center>
</div>

</body>

</html>
