<?php
include("mysqllink.php");
$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from customers where username='$username'";
$result=mysql_query($query,$link)or die("error querying database");
$row = mysql_fetch_array($result);
if($row['password']=md5($password)){
	session_start();
	$_SESSION['login']=1;
	$_SESSION['username']=$username;
	header("Location: homepage_login.php");
}else{
	header("Location: ../register.html");
}
	    
?>
