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
<link href="../css/style1.css" rel="stylesheet" type="text/css" />
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
$product=$_GET['product'];
$query="SELECT products.*, unit_price.* FROM products INNER JOIN unit_price ON products.proId=unit_price.proId AND products.name='".$product."'" or die();
$result=mysql_query($query,$link)or die(mysql_error());
echo '<form method="get" action="productconfirmation.php" >';
while($row = mysql_fetch_array($result)) {
    	 $size[] = $row['size'];
    	 $productname = $row['name'];
    	 $picaddress="<img src=".$row['imageAddress'].">";
    	 $des=$row['description'];
    	 $sta=$row['status'];
    	 $eva=$row['evaluationPoint'];
    	 $price[]=$row['amount'];
    	 $proId=$row['proId'];
    }
    echo $picaddress;
    echo '<br/>';
    echo'<p><strong>Name:';
    echo $productname;
    echo'<p><strong>Status:';
    echo $sta;
    echo $eva;
    echo '<br/>';
    for($i=0 ; $i<count($size); $i++){
    echo'<p><strong>Size:';	
    echo $size[$i];
    echo '<br/>';
    echo'<p><strong>Price:$';	
    echo $price[$i];
    echo '<br/><br/>';
    }
    echo 'If the product is not pizza,Please choose NULL!';
    echo '<br/><br/>';
    echo 'Choose the size';
    echo '<select name="size">';
    echo '<option value="0">NULL</option>';
    echo '<option value="6">6 inches</option>';    
    echo ' <option value="9">9 inches</option>';
    echo ' </select>';
    echo '<br/><br/>'; 
    echo 'Choose the quantity';
    echo '<select name="Num">';
    echo '<option value="1">1</option>';
    echo '<option value="2">2</option>';    
    echo ' <option value="3">3</option>';
    echo ' </select>';
    echo '<br/><br/>';
    echo '<input type=hidden value="' .$productname.'" name="productname" />'; 
    echo '<input type=hidden value="' .$proId.'" name="proId" />';   
    echo '<input type="submit" value="order" />';  
    echo '</form>';
  @session_start();
mysql_free_result($result); 
mysql_close($link);
?>
  </div>
  <a href="pic.php"> BACK TO THE MAIN PRODUCTS PAGE<a>
       </div>
        <div id="fooder">
<p>
 Copyright YUM! Restaurants (China) Investment Company Limited <p><div>
                   </div> 
</body>
</html>