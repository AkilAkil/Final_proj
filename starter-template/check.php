<?php
mysql_connect("localhost","root","asdf1234")||die("error");
mysql_select_db("onlinetoll")||die("error");
$username=$_POST["username"];
$password=$_POST["password"];
$res=mysql_query("select name from user where username='".$username."' and password='".$password."'");
$row = mysql_fetch_row($res);  
ob_start();
session_start();
$_SESSION["name"]=$row[0];
echo $_SESSION["name"];
header("Location: index.php");
exit();
?>