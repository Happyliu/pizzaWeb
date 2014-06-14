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
<title>register</title>
<link href="../css/style4.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="header">
<div id="search">
  <p>
   <form method="get" action="sort.php">
    <input type="text" name="search" id="searchbox" value="search the products" />
    <input type="submit" id="buttons" value="search" onclick="" />
    <form>
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
       <div id="pagebody">
<?php
  include("mysqllink.php");
  $size=$_GET['size'];
  $Num=$_GET['Num'];
  $product=$_GET['productname'];
  $proId=$_GET['proId'];
  $query="SELECT amount FROM unit_price WHERE proId=$proId AND size=$size" or die();
  $result =mysql_query($query,$link)or die(mysql_error());
  $row = mysql_fetch_array($result);
  $total=$row['amount']*$Num;
  @session_start();
  $_SESSION['proId'][]=$proId;
  $_SESSION['name'][]=$product;
  $_SESSION['total'][]=$total;
  $_SESSION['size'][]=$size;
  $_SESSION['Num'][]=$Num;
  mysql_close($link);
  echo '<br />';
  echo '<strong>You choose the size :'.$size.' ';
  echo '<br />';
  echo'<p>You have order '.$Num.' of the  '.$product.'  <br />';
  echo '<br />';
  echo 'the amount of the product is '.$total.'';
?>
<br />
<br />
<a href='productslist.php'>order more<a>
or
<a href='shoppingtrolly.php'> pay for the order<a>
</div>
 </div>
      </div>
      <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited<p><div>
                   </div> 
</div>
</body>
</html>