<?php
     session_start();
     	$username=$_SESSION['username'];
if($_SESSION['login']!=1){
	header("Location: ../register.html");
}    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="../css/restaurant.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="header">
<div id="search">
  <p>
   <form method="get" action="sort.php">
    <input type="text" name="search" id="searchbox" value="search the products" />
    <input type="submit" id="buttons" value="search" onclick="" />
    </form>
  </p>
</div>
    <div id="menu">
     <ul>
     <li><a href="homepage_login.php">Home</a></li>
     <li><a href="productslist.php">Products</a></li>
     <li><a href="restaurant.php">Resaturant</a></li>
     <li><a href="shoppingtrolly.php">Shoppingtrolly</a></li>
     <li><a href="../companyinformation.html">Company</a></li>
     </ul>
  </div>
       <div id="banner">
       <p>We have many good resturants!!</p><br/>
       <div id="restaurant">
       <div id="restaurantpic">
         <img src="../images/store1.jpg" width="400" height="200" /></div>
         <div id="restaurantinformation">
              <p>Pizzahut(BeiJing anzhen store)</br>
              Location:Chaoyang District Ahn of the 4 District hualian building, 1 floor</br>
              Store Characteristic: Free wifi<p>
         </div>
      </div>
         <div id="restaurant">
       <div id="restaurantpic">
         <img src="../images/store2.jpg" width="400" height="200" /></div>
         <div id="restaurantinformation">
         <p>Pizzahut(xidan store)</br>
         Location:109 North Street, Xicheng District Xidan Department Store Building 1-2</br>
         Store Characteristic: Free wifi,Afternoon tea<p>
         </div>
      </div>
         <div id="restaurant">
       <div id="restaurantpic">
         <img src="../images/store3.jpg" width="400" height="200" /></div>
         <div id="restaurantinformation">
              <p>Pizzahut(BeiJing APM store)</br>
              Location:Dongcheng District Wangfujing street in the No. 138 Beijing apm3 building</br>
              Store Characteristic: Free wifi,Discount<p>
         </div>
      </div>
       <p>Choose the resturant you want to learn more about!</p>
         <form method="post" action="restaurant.php" >
         Restaurantname:<select name="restId">
         <option value="">choose the restaurant you want to know more</option>
         <option value="1">Pizzahut(xidan store)</option>
         <option value="2">Pizzahut(BeiJing anzhen store)</option>
         <option value="3">Pizzahut(BeiJing APM store)</option>
         </select>
         <input type="submit" name="submit" value="choose"  />
         </form>
          <?php
          include("mysqllink.php");
          @$restId=$_POST['restId'];
          $query="select * from restaurants where restId ='$restId'";
          $result=mysql_query($query,$link)or die("error querying database");
          $row = mysql_fetch_array($result);
          echo'<p><strong>TeleNum:';
          echo $row['teleNum'];
          echo '<br/>';
          echo'<p><strong>PostCode:';
          echo $row['postCode'];
          echo '<br/>';
          echo'<p><strong>Distribution Range:';
          echo $row['distributionRange'];
          echo '<br/>';
          echo'<p><strong>The coordinates in the earth are: ';
          echo "lat:";
          echo $row['lat'];
          echo " lng";
          echo $row['lng'];
          echo '<br/>';
          mysql_free_result($result); 
          mysql_close($link);
            ?>
      </div>
      <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited<p><div>
                   </div> 
</div>
</body>
</html>