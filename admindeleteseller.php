<?php

session_start();

// $name1=$_GET['name1'];
$name=$_GET['name'];
$tablename=$_GET['tablename'];
$name1=$_GET['name1'];
$_SESSION['name']= $name1;



$connect= mysql_connect('localhost','root','');
$select= mysql_select_db('seller',$connect) or die(mysql_error());

$sql = "DROP TABLE $name";
$check = mysql_query($sql);
if($check){
  // echo "seller table deleted";
  $sql1 = "DROP TABLE $tablename";
  $check1 = mysql_query($sql1);
  if($check1){
    echo "<center><h3>Seller account deleted successfully</h3></center>";
  }else{
    echo "seller product not deleted";
  }
}else{
  echo "not deleted";
}



?>
