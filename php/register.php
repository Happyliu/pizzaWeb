<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
<link href="../css/style3.css" rel="stylesheet" type="text/css" />
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
<?php
include("mysqllink.php");
if(isset($_POST['submit'])){
	$name=$_POST['firstname'].''.$_POST['lastname'];
    $username=$_POST['username'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $year=$_POST['year'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $birthday=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
    $interest=$_POST['interest'];
    $email=$_POST['email'];
    $default_address=$_POST['address'];
    $default_tele_num=$_POST['tele_num'];
    $md5=md5($password);
    $link=mysql_connect('localhost','root','lz')or die('error connecting to the MYSQL erver');
    mysql_select_db("pizzahut_db", $link);
    $query="SELECT * FROM customers where username='$username'";
    $result=mysql_query($query,$link)or die(mysql_error());
    $num_rows = mysql_num_rows($result);
          if ($num_rows > 0) {
				echo "<p>this username have been used by other people,please choose anther one.<p>";
				echo '<a href="../register.html"><p> back to the register page<p><a>';
			}
	else{
	if(preg_match('/^[0-9]{3,4}-[0-9]{7,8}$/',$default_tele_num)){
	if (preg_match("/^[a-zA-Z0-9_]+@[a-zA-Z0-9-]+.[a-zA-Z0-9]+$/",$email)){
		if(!empty($name) && !empty($username) && !empty($password) && !empty($email) && !empty($default_address) && !empty($default_tele_num))
{
    $query="INSERT INTO customers(username,password,name,gender,birthday,interest,email,defaultAddress,defaultTeleNum,comsumptionPoint)".
	"VALUES('$username','$md5','$name','$gender','$birthday','$interest','$email','$default_address','$default_tele_num','0')"or die(mysql_error());
	$result=mysql_query($query,$link)or die(mysql_error());
	echo'<p>your have get your account!<p>'.'<br />';
	echo'<p><strong>account:  '.$username.'<br />';
	echo'<p><strong>password:  '.$password.'<br /><br /><br />';
	session_start();
	$_SESSION['login']=1;
	$_SESSION['username']=$username;
	echo '<a href="homepage_login.php"><p> back to the home page<p><a>';
	mysql_close($link);
    	}

	else{
		echo '<p>please type in the complete information!<P>';
	}
  }
  else{
  	echo '<p>please type the right email<P>';
  	echo '<a href="../register.html"><p> back to the register page<p><a>';
  }
}
else{
	echo '<p>please type the right Tele number<P>';
	echo '<a href="../register.html"><p> back to the register page<p><a>';
}	
	}
}

?>
      </div>
      <div id="fooder">
<p>
Copyright YUM! Restaurants (China) Investment Company Limited  <p><div>
                   </div> 
</div>
</body>
</html>
