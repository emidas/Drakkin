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
?>
<!DOCTYPE html> 
<html><head><title>Drakkin</title>
<meta charset="UTF-8">
<meta name="keywords" content="Drakkin,RPG,roleplay,gaming," />
<meta name="description" content="Drakkin - The best RPG experience available on browsers!">
<meta name="author" content="Accountants' Workflow Solutions, Inc." />
<link href="/css3/style.css" rel="stylesheet" type="text/css">
<script>

</script>
</head>
<body>

<!-- Header Table Start -->
<div id="headerwrapper">
<div id="header">
<!-- Start Login Section -->
Hello, <a href="/charoverview.html"><?php echo $_SESSION_Name['fullname']?></a> <a href='/logout.php'>Logout</a>
<!-- End Login Section --> 
</div>
<div id="header2"><a href="/index.php"><IMG alt="DBK Games logo" src="/images/logotop.png"></a></div>
</div>
<!-- Header Table End -->

<!-- NavBar Start -->
<div id="nav">
<div id="navbar">
<ul id="css3menu1" class="topmenu">
	<li class="topfirst"><a href="/index.php"><span>Play</span></a>
	<ul>
		<li class="subfirst"><a href="/jobs.php">Jobs</a></li>
		<li><a href="/test.php">Testing</a></li>
	</ul></li>
	<li class="topmenu"><a href="/charoverview.php"><span>Character</span></a></li>
    <li class="topmenu"><a href="#"><span>Account</span></a></li>
    <li class="topmenu"><a href="#"><span>Support</span></a>
    <ul>
    	<li class="subfirst"><a href="#">Contact Us</a></li>
        <li><a href="#">Getting Started</a></li>
    </ul></li>
	</ul>
    <div id="nav2"><img src="/images/xp.png"> XP <?php echo $_SESSION_Name['currxp']?>/<?php echo $_SESSION_Name['xptolevel']?> | <img src="/images/energy.png"> Energy <?php echo $_SESSION_Name['currenergy']?>/<?php echo $_SESSION_Name['maxenergy']?> | <img src="/images/health.png"> Health <?php echo $_SESSION_Name['currhealth']?>/<?php echo $_SESSION_Name['maxhealth']?> | <?php echo $_SESSION_Name['username']?>
	<?php if($_SESSION_Name['sp'] > 0) {echo '(<a href="/test.php">'.$_SESSION_Name['sp'].'</a>)';} ?> </div>
</div>
</div>
<!-- NavBar End -->

<!-- Body Table Start -->
<div id="wrapper">
<div id="index">
<br><span id="head">Welcome to Drakkin!</span><hr>
<p>Hello and welcome to DBK Games first effort, Drakkin. This is not your typical text-based browser game. With dynamic events, an epic storyline and intriguing character development, Drakkin is a one of a kind game that you can not find anywhere else.</p>
<p>In the persistent world of Drakken, you will find yourself immersed in one of six tribes. These tribes are rich and emboldened with history that will be revealed over the course of your experience. Your tribe choice will affecr many things you do, and will alter your gameplay considerably, so choose wisely!</p>
</div>
</div>
<!-- Body Table End -->

<!-- Footer Table Start -->
<div id="footer">
<div id="footerbar">
2013 DBK Games, Inc. | <a href="webmaster@dbkgames.com">webmaster@dbkgames.com</a>
</div>
</div>
</body>
</html>
<!-- Footer Table End -->







