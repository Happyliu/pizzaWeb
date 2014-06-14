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
<title>productinformation</title>
<link href="../css/ordercomfirmation.css" rel="stylesheet" type="text/css" />
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
<?php
include("mysqllink.php");
@session_start();
$orderId=$_SESSION['orderId'];
$paymethod=$_POST['paymethod'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
if(!empty($paymethod) && !empty($lat)&& !empty($lng)){
$query="UPDATE orders SET paymentMethod='". $paymethod."', distributionAddress='".$lat."_".$lng."' WHERE orderId='".$orderId."'";
$result =mysql_query($query,$link)or die(mysql_error());
mysql_close($link);
?>
<?php
include("mysqllink.php");
$num=0;
$query="SELECT * FROM restaurants";
$result =mysql_query($query,$link)or die(mysql_error());
$row = mysql_fetch_array($result);
for($i=0;$i<count($row['restId']);$i++){
$distance[$i]=($row['lat']-$lat)*($row['lat']-$lat)+($row['lng']-$lng)*($row['lng']-$lng);
}
$shortdistance=min($distance);
for($i=0;$i<count($row['restId']);$i++){
if(($row['lat']-$lat)*($row['lat']-$lat)-($row['lng']-$lng)*($row['lng']-$lng)==$shortdistance){
 $num=$i;
}
$query="SELECT * FROM restaurants WHERE restId='$num'";
$row = mysql_fetch_array($result);
 echo"<p>";
 echo "you have pay your order successfully !";
 echo "<br/><br/><br/>";
 echo "you have choose '$paymethod' to pay your order";
 echo "<br/><br/><br/>";
 echo "the neartest restaurant is :";
 echo $row['address'];
 echo " and the distance is '$shortdistance'";
 echo "<br/><br/><br/>";
 echo "you have deliver your order on time !";
 echo "<p>";
  mysql_close($link);
}
}
else{
		echo '<p>please type in the complete information!(if you type the chinese place wait a moment to make sure the lat and lng can be seen)<P>';
	}
?>

 </div>
 <a href="homepage_login.php"> BACK TO THE HOME PAGE<a>
       </div>
        <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited <p><div>
                   </div> 
</body>
</html>
