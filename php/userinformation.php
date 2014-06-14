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
<link href="../css/userinformation.css" rel="stylesheet" type="text/css" />
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
<p>My Information<p>
<table border="1" width=100%><p>
      <tr>
          <td>My cusId</td>
          <td>My Username</td>
          <td>My Password</td>
          <td>My Email</td>
          <td>My Tele</td>
          <td>My Comsumption Point</td>
      </tr>
<?php
include("mysqllink.php");
@session_start();
@$cusId=$_SESSION['cusId'];
$query="select * from customers where cusId='$cusId'";
$result=mysql_query($query,$link)or die("error querying database");
while($row = mysql_fetch_array($result)) {
	  echo "</tr>"; 
      echo "<td>".$row['cusId']."</td>";
      echo "<td>".$row['username']."</td>";
      echo "<td>".$row['password']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['defaultTeleNum']."</td>";
      echo "<td>".$row['comsumptionPoint']."</td>";
      echo "</tr>"; 
}
  mysql_close($link);
?>
<table>
<div id="table1p">
<p>My Order<p><div/>
<table border="1" width=100%><p>
      <tr>
          <td>orderId</td>
          <td>orderTime</td>
          <td>cusId</td>
          <td>paymentMethod</td>
          <td>cusTeleNum</td>
          <td>distributionTime</td>
          <td>distributionAddress</td>
          <td>distributionStatus</td>
          <td>ifPaid</td>
          <td>totalPrice</td>
      </tr>
<?php
include("mysqllink.php");
@session_start();
@$cusId=$_SESSION['cusId'];
$query="select * from orders where cusId='$cusId'";
$result=mysql_query($query,$link)or die("error querying database");
while($row = mysql_fetch_array($result)) {
	  echo "</tr>"; 
      echo "<td>".$row['orderId']."</td>";
      echo "<td>".$row['orderTime']."</td>";
      echo "<td>".$row['cusId']."</td>";
      echo "<td>".$row['paymentMethod']."</td>";
      echo "<td>".$row['cusTeleNum']."</td>";
      echo "<td>".$row['distributionTime']."</td>";
      echo "<td>".$row['distributionAddress']."</td>";
      echo "<td>".$row['distributionStatus']."</td>";
      echo "<td>".$row['ifPaid']."</td>";
      echo "<td>".$row['totalPrice']."</td>";
      echo "</tr>"; 
}
  mysql_close($link);
?>
 <tr><td colspan=9><a href="homepage_login.php"> BACK TO THE HOME PAGE<a><td><tr>
<table>
 </div>
       </div>
        <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited <p><div>
                   </div> 
</body>
</html>


