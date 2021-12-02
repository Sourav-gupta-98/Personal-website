<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>product</title>
    <link rel="stylesheet" href="CSS/cards.css"> 
    <link rel="stylesheet" href="CSS/allproducts.css">
  </head>
  <body>
    <!-- <h1>products are here..............</h1> -->
    <div class="header1">


    <div class="container1">
      <div class="navbar1">
        <div class="logo">
          <h3>ORNAMENTS </h3>
          <h4>MARKET 🙪</h4>
          <!-- <img src="displayphoto/ring.jpg" alt="logo" width="125px"> -->
        </div>
        <nav class="nav">
          <ul>
            <li><a class="drum" href="index.html">Home</a></li>



          </ul>
        </nav>
        <!-- <img src="ring.jpg" alt="photo" width="30px" height="30px"> -->
      </div>
      <div class="row1">

        <div class="col-2">

        </div>
      </div>
    </div>
    </div>

    <div class="container">
      <nav>
        <ul>

          <?php
          $connect= mysql_connect('localhost','root','');
          $select= mysql_select_db('seller',$connect);
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

            echo "<a href='#'>LOGIN</a><br>";
            // echo "<a href='cart.php?productname=".$row1['productname']."& image=".$row1['image']."& price=".$row1['price']."& namecart=".$namecart."& namebuy=".$namebuy."& name=".$name."& aboutproduct=".$row1['aboutproduct']."'>Add to Cart</a>";
          echo "</div>";
          echo"</div></li>";
        }else{
          // echo "<br>product not found";
        }

    }

  }
    ?>
        </ul>
      </nav>

    </div>



<!-- footer -->

<div class="footer">
  <div class="container">

    <div class="copyright">
      <center><br>
      &#169; All right reserverd<br><br>
    </center>
    </div>

  </div>
</div>

  </body>
</html>
