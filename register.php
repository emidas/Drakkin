<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
ob_start();
$host="localhost"; // Host name
$username="dbkgames_emidas"; // Mysql username
$password="B9h4Dv8y"; // Mysql password
$db_name="dbkgames_drakkin"; // Database name
$tbl_name="characters"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


if($_POST["myusername"] && $_POST["mypassword"] && $_POST["myfullname"] && $_POST["mycharname"] && $_POST["mytribe"] )
{
$reg="INSERT INTO characters (username,password,fullname,charname,tribe) VALUES ('$_POST[myusername]', '$_POST[mypassword]','$_POST[myfullname]','$_POST[mycharname]','$_POST[mytribe]')";
$result=mysql_query($reg) or die("insert failed");
mysql_query("INSERT INTO job_101 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_102 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_103 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_104 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_105 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_106 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_107 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_108 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_109 (username) VALUES ('$_POST[myusername]')");
mysql_query("INSERT INTO job_110 (username) VALUES ('$_POST[myusername]')");
print "You have registered successfully!";
header("location:/index.php");
}
else print "invalid data";

ob_end_flush();
?>