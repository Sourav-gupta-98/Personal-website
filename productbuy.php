<?php

$connect= mysql_connect('localhost','root','');
  $select= mysql_select_db('buyer',$connect);

    $namebuy=$_GET['namebuy'];
$name=$_GET['name'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>buy</title>
    <link rel="stylesheet" href="CSS/cart.css">
  </head>
  <body>
    <header>
      <div class="top">
        <div class="navbar">
          <div class="logo">
            <h3>ORNAMENTS </h3>
            <h4>MARKET 🙪</h4>
            <!-- <img src="ring.jpg" alt="logo" width="125px"> -->
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

    <div class="small-container cart-page">
      <table>
        <tr>
          <th>products</th>
          <th>quantity</th>
          <th>subtotal</th>
        </tr>

        <?php
        $sql = "SELECT * FROM $namebuy";
          $check1 = mysql_query($sql);
        while($row1 = mysql_fetch_array($check1)){
      if(isset($row1['productname']) || isset($row1['image']) || isset($row1['price']) || isset($row1['aboutproduct'])){  // checking list present or not


      echo "  <tr>";
      echo " <td><divclass='cart-info'>";
      echo "<img src='ornaments/".$row1['image']."' alt='' width='50px'>";
      echo  "     <div class=''>";
      echo "<p>".$row1['productname']."</p>";
      echo "<small>about: ".$row1['aboutproduct']."</small>";

          echo " </div>";
          echo "</div></td>";

          echo "<td><input type='number' name='' value='1'></td>";
          echo "<td>".$row1['price']."</td>";
        echo"</tr>";
      }
    }
 ?>

        </table>
        <!-- <div class="total-price">
          <table>
            <tr>
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
            </tr>
            <tr>
              <td></td>
              <td> <a href="#"><button type="button" name="button">Buy Now</button>    </a> </td>
            </tr>
          </table>
        </div> -->
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
