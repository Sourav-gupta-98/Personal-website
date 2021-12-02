<?php

session_start();

// $name1=$_GET['name1'];
$productname=$_GET['name'];
$tablename=$_GET['nameproduct'];
$image=$_GET['image'];
$price=$_GET['price'];
$aboutproduct=$_GET['aboutproduct'];

// $db=$_GET['db'];
// echo "<br>".$name;
// echo "<br>".$producttable;
// $_SESSION['name'] = $name;
$connect= mysql_connect('localhost','root','');
$select= mysql_select_db('seller',$connect) or die(mysql_error());

$sql = "SELECT * FROM $tablename";
$check = mysql_query($sql);
while($rnum = mysql_fetch_array($check)){
  if($productname == $rnum['productname'] && $price == $rnum['price'] ){

    $delete =  "DELETE FROM $tablename WHERE productname = '$productname' AND  price = $price ";
    $execute = mysql_query($delete)  or die(mysql_error());
     if($execute){
  echo "product deleted successfully";
  }else{
    echo "not deleted";
  }
   }

}



?>
