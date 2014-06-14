<?php
 session_start();
 session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>logout</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<SCRIPT LANGUAGE="JavaScript" src="../js/javascript.js"></script> 

</head>

<body>
<div id="container">
<div id="header">
<div id="search">
  <p>
   <form method="get" action="php/sort.php">
    <input type="text" name="search" id="searchbox" value="search the products" />
    <input type="submit" id="buttons" value="search" onclick="" />
    </form>
  </p>
</div>
    <div id="menu">
     <ul>
     <li><a href="php/homepage_login.php">Home</a></li>
     <li><a href="php/productslist.php">Products</a></li>
     <li><a href="php/restaurant.php">Resaturant</a></li>
     <li><a href="php/shoppingtrolly.php">Shoppingtrolly</a></li>
     <li><a href="companyinformation.html">Company</a></li>
     </ul>
                       </div>
                      
       <div id="banner">
      <img src="../images/new.jpg" width="260" height="200" />
      <img src="../images/new1.jpg" width="260" height="200" />
      <img src="../images/new2.jpg" width="260" height="200" />
      </div>
                   </div> 

<div id="pagebody">
<div id="leftside">
     <p>Welcome to the Pizzahut!</p>
     <p>Please log in!<p>
     <a href="login_web.php"> Login<a>&nbsp &nbsp &nbsp
     <a href="../register.html"> Register<a>
  <div id="leftside1">
    <p>Recent news!</p>
    <p>PizzaHut Special lunch days $15!</p>
    <p>French red wine coming! </p>
  </div> 
    <img src="../images/hd1.jpg" width="200" height="80" /> 
    <img src="../images/hd.jpg" width="200" height="80" /></div>
  <div id="rightside">
     <a href="productslist.php"><p>More New Products</p></a>
     <div class="container1" id="idTransformView">
  <ul class="slider" id="idSlider">
    <li><img src="../images/new3.jpg" width="384" height="247" /></li>
    <li><img src="../images/new4.jpg" width="384" height="247" /></li>
    <li><img src="../images/new5.jpg" width="384" height="247" /></li>
  </ul>
  <ul class="num" id="idNum">
    <li>1</li>
    <li>2</li>
    <li>3</li>
  </ul>
</div>
<a href="restaurant.php"><p>Favourite Resaturant</p></a>
<img src="../images/store.jpg" width="480" height="200" /></div>
<div id="fooder">
<p>
Copyright YUM! Restaurants (China) Investment Company Limited   
 <p><div>
</body>
</html>