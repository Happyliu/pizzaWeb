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
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
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
  <div id='botton'>
 <a href="sort.php?sort=pizza"><img src="../images/botton-p-0.png" width="90" height="25" border="0"/><a/>
  <a href="sort.php?sort=pasta"><img src="../images/button-p-1.png" width="90" height="25" border="0"/><a/>
   <a href="sort.php?sort=salad"><img src="../images/botton-p-2.png" width="90" height="25" border="0"/><a/>
  <a href="sort.php?sort=rice"><img src="../images/button-p-3.png" width="90" height="25" border="0"/><a/>
   <a href="sort.php?sort=soup"><img src="../images/botton-p-4.png" width="90" height="25" border="0"/><a/>
  <a href="sort.php?sort=snack"><img src="../images/botton-p-5.png" width="90" height="25" border="0"/><a/>
   <a href="sort.php?sort=drink"><img src="../images/botton-p-6.png" width="90" height="25" border="0"/><a/>
  <a href="sort.php?sort=dessert"><img src="../images/botton-p-7.png" width="90" height="25" border="0"/><a/>
  </div>
<?php
include("mysqllink.php");
if(isset($_GET['sort'])){
	$sort=$_GET['sort'];
$query="select * from products where category='$sort'";
$result=mysql_query($query,$link)or die("error querying database");
while($row = mysql_fetch_array($result)) {
echo "<div id='product'>";	
echo "<img src=".$row['imageAddress'].">";
echo '<br/>';
echo 'Name:  ';
echo $row['name'];
echo '<br/>';
echo '</div>';
}
}
if(isset($_GET['search'])){
$search=$_GET['search'];
$query="select * from products where name like '%".$search."%' or category like '%".$search."%' or description like '%".$search."%'";
$result=mysql_query($query,$link)or die("error querying database");
while($row = mysql_fetch_array($result)) {
echo "<div id='product'>";	
echo "<img src=".$row['imageAddress'].">";
echo '<br/>';
echo 'Name:  ';
echo $row['name'];
echo '<br/>';
echo '</div>';	
}
}	
mysql_free_result($result); 
mysql_close($link);
?>
  </div>
  <a href="productslist.php"> BACK TO THE MAIN PRODUCTS PAGE<a>
       </div>
        <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited <p><div>
                   </div> 
</body>
</html>