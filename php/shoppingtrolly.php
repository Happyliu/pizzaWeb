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
<link href="../css/shoppingtrolly.css" rel="stylesheet" type="text/css" />
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
       <div id="pagebody">
       <p>You have order these products,the detail of these products are in the follow:<p>
       <div id="table">
 <table border="1" width=100%><p>
      <tr>
          <td>Image</td>
          <td>Product name</td>
          <td>Size</td>
          <td>price</td>
          <td>Quantity</td>
      </tr>
<?php
include("mysqllink.php");
@session_start();
$username=$_SESSION['username'];
  $finaltotal=0;
for($i=0;$i<count(@$_SESSION['total']);$i++){
	$total[$i]=$_SESSION['total'][$i];
	$finaltotal=$finaltotal+$total[$i];
	$_SESSION['finaltotal']=$finaltotal;
    $product[$i]=$_SESSION['name'][$i];
    $proId[$i]=$_SESSION['proId'][$i];
    $size[$i]=$_SESSION['size'][$i];
    $Num[$i]=$_SESSION['Num'][$i];
$query="SELECT products.*, unit_price.* FROM products INNER JOIN unit_price ON products.proId=unit_price.proId WHERE unit_price.proId='".$proId[$i]."' AND unit_price.size='".$size[$i]."'" or die();
$result =mysql_query($query,$link)or die(mysql_error());
      while($row = mysql_fetch_array($result)){
      echo "<td><img src=".$row['imageAddress']. " width='180px' height='110px'></td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['size']."</td>";
      echo "<td>".$row['amount']."</td>";
      echo "<td>".$Num[$i]."</td>";
      echo "</tr>"; 
      }
}
            mysql_close(@$link);
?>
<table>
</div>
<?php
include("mysqllink.php");
$query="select * from customers where username='$username'";
$result =mysql_query($query,$link)or die(mysql_error());
$row = mysql_fetch_array($result);
$cusTeleNum=$row['defaultTeleNum'];
$cusId=$row['cusId'];
$_SESSION['cusId']=$cusId;
$query="INSERT INTO orders(cusId,cusTeleNum,totalPrice) VALUES('$cusId','$cusTeleNum','$finaltotal')";
$result =mysql_query($query,$link)or die(mysql_error());
mysql_close($link);
?>
<?php
include("mysqllink.php");
$query="SELECT * FROM orders WHERE cusId='$cusId'";
$result =mysql_query($query,$link)or die(mysql_error());
while($row = mysql_fetch_array($result)){
$orderId=$row['orderId'];
$_SESSION['orderId']=$orderId;	
}
mysql_close($link);
?>
<?php
include("mysqllink.php");
for($i=0;$i<count(@$_SESSION['total']);$i++){
$query="INSERT INTO ordered_pro(orderId,proId,size,quantity) VALUES('$orderId','$proId[$i]','$size[$i]','$Num[$i]')";	
}
$result =mysql_query($query,$link)or die(mysql_error());
mysql_close($link);
?>
<?php
include("mysqllink.php");
$discount=1;
$class=0;
$query="SELECT * FROM customers WHERE username='$username'";
$result =mysql_query($query,$link)or die(mysql_error());
$row = mysql_fetch_array($result);
$comsumptionPoint=$row['comsumptionPoint'];
$query="SELECT * FROM customer_class";
$result =mysql_query($query,$link)or die(mysql_error());
while($row = mysql_fetch_array($result)){
	if($comsumptionPoint<$row['consumptionPoint']){
		break;
	}
	$class=$row['className'];
	$discount=$row['discount'];
}
$finaltotaldiscount=$discount*$finaltotal;
?>
<div id="comfirmation">
<p>You are the <?php echo $class;?> member, your discont is :<?php echo $discount;?></p>
<p>You should pay $<?php echo $finaltotaldiscount;?> for your order.</p>
<a href="paymethod.php"><input type="button" value="PayNow!" /></a>
</div>
      </div>
      <div id="fooder">

Copyright YUM! Restaurants (China) Investment Company Limited  <div>
                   </div> 
</div>
</body>
</html>