#!/usr/bin/php
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

mysql_query("UPDATE characters SET currenergy=currenergy+1 WHERE currenergy<maxenergy");
mysql_query("UPDATE characters SET currenergy=maxenergy WHERE currenergy>maxenergy");

header("location:/index.php");
?>