<?php
session_start();
$host="localhost"; // Host name
$username="dbkgames_emidas"; // Mysql username
$password="B9h4Dv8y"; // Mysql password
$db_name="dbkgames_drakkin"; // Database name
$tbl_name="characters"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$_SESSION_User=$_SESSION["myusername"];
$_SESSION_Name=mysql_fetch_array(mysql_query("SELECT * FROM characters WHERE username='$_SESSION_User'"));

mysql_query("UPDATE characters SET maxenergy=maxenergy+1 WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET currenergy=currenergy+1 WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET sp=sp-1 WHERE username='$_SESSION_User'");

header("location:/charoverview.php");
?>