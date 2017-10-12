<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

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
$_SESSION_Job101=mysql_fetch_array(mysql_query("SELECT progress FROM job_101 WHERE username='$_SESSION_User'"));
$_SESSION_Job102=mysql_fetch_array(mysql_query("SELECT progress FROM job_102 WHERE username='$_SESSION_User'"));
$_SESSION_Job103=mysql_fetch_array(mysql_query("SELECT progress FROM job_103 WHERE username='$_SESSION_User'"));
$_SESSION_Job104=mysql_fetch_array(mysql_query("SELECT progress FROM job_104 WHERE username='$_SESSION_User'"));
$_SESSION_Job105=mysql_fetch_array(mysql_query("SELECT progress FROM job_105 WHERE username='$_SESSION_User'"));
$_SESSION_Job106=mysql_fetch_array(mysql_query("SELECT progress FROM job_106 WHERE username='$_SESSION_User'"));
$_SESSION_Job107=mysql_fetch_array(mysql_query("SELECT progress FROM job_107 WHERE username='$_SESSION_User'"));
$_SESSION_Job108=mysql_fetch_array(mysql_query("SELECT progress FROM job_108 WHERE username='$_SESSION_User'"));
$_SESSION_Job109=mysql_fetch_array(mysql_query("SELECT progress FROM job_109 WHERE username='$_SESSION_User'"));
$_SESSION_Job1010=mysql_fetch_array(mysql_query("SELECT progress FROM job_110 WHERE username='$_SESSION_User'"));

for ($x=1;$x<=10;$x++)
{
$f = ${'_SESSION_Job10'.$x}['progress'];

if($f >= 100){
mysql_query("UPDATE job_10{$x} SET progress=100 WHERE username='$_SESSION_User'");
}
}

if($_SESSION_Name['currxp'] == $_SESSION_Name['xptolevel'] or $_SESSION_Name['currxp'] > $_SESSION_Name['xptolevel']) {
mysql_query("UPDATE characters SET currxp=currxp-xptolevel WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET xptolevel=xptolevel*1.3 WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET level=level+1 WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET sp=sp+5 WHERE username='$_SESSION_User'");
mysql_query("UPDATE characters SET currenergy=maxenergy WHERE username='$_SESSION_User'");
}

header("location:/jobs.php");
?>