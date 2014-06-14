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
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>productinformation</title>
<link href="../css/paymethod.css" rel="stylesheet" type="text/css" />
<SCRIPT LANGUAGE="JavaScript" src="../js/paymethod.js"></script> 
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
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
  <div id="banner"> </div>
  <div id="pagebody">
<br/>
<form method="post" action="ordercomfirmation.php">
<p>Choose your payment method:<p>
<input type="radio" name="paymethod" value="cash" />Cash
<input type="radio" name="paymethod" value="creditcard" />Creditcard<br/><br/>
Type the chinese distribution address:<input type="text" id="address" name="distributionaddress" onchange="locate()" /><br/><br/>
The lng of the distribution address is :<input type="text" id="lng" name="lng" readonly="true"><br/><br/>
The lat of the distribution address is :<input type="text" id="lat" name="lat" readonly="true"><br/><br/>   
<input type="submit" value="submit" />
<form>
  </div>
       </div>
        <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited <p><div>
                   </div> 
</body>
</html>