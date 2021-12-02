<?php

// echo "<h1>delete product from cart</h1>";
$name1=$_GET['name1'];
$namebuy=$_GET['namebuy'];
$tablename=$_GET['tablename'];
$productname=$_GET['name'];
$image=$_GET['image'];
$price=$_GET['price'];

// echo "tablename:".$tablename;
// echo "<br>productname: ".$productname;
// echo "<br>image : ".$image;
// echo "<br>price: ".$price;

$connect= mysql_connect('localhost','root','');
$select= mysql_select_db('buyer',$connect);

$sql = "SELECT * FROM $tablename";
$check = mysql_query($sql);
$rnum = mysql_fetch_array($check);

if($productname == $rnum['productname'] && $price == $rnum['price'] ){

  $delete =  "DELETE FROM $tablename WHERE productname = '$productname' AND  price = $price ";
  $execute = mysql_query($delete)  or die(mysql_error());
  if($execute){
    // echo "<br>product deleted succcessfully from sell table";
    $submit="submit";
    echo "<script>window.location.href='cart.php?name=".$name1."& namebuy=".$namebuy."& namecart=".$tablename." ';</script>";

  }else{
    echo "<br>product not deleted";
  }
}
?>
