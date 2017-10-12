<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
if(empty($_SESSION["myusername"])){
header("location:/main_login.php");
}
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
$_SESSION_Job107=mysql_fetch_array(mysql_query("SELECT * FROM job_107 WHERE username='$_SESSION_User'"));

$xp = $_SESSION_Job107['xpreward'];
$ce = $_SESSION_Name['currenergy'];
$e = $_SESSION_Job107['ecost'];
$g = $_SESSION_Job107['greward'];
$p = $_SESSION_Job107['progressincrement'];

if($ce > $e or $ce == $e and $ce - $e >= 0) {

mysql_query("UPDATE characters SET currenergy=currenergy-'$e' WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET currxp=currxp+'$xp' WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET gold=gold+'$g' WHERE username='$_SESSION_User'");
mysql_query("UPDATE job_107 SET progress=progress+'$p' WHERE username='$_SESSION_User'");
}

header("location:/scripts/update.php");
?>