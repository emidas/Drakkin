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
<div id="charoverview">
<table style="width:990px;height:auto;text-align:center;">
<tr>
<td>Name:</td>
<td><?php echo $_SESSION_Name['charname']?></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Level:</td>
<td><?php echo $_SESSION_Name['level']?></td>
<td></td>
<td></td>
</tr>
<tr>
<td>XP:</td>
<td><?php echo $_SESSION_Name['currxp']?>/<?php echo $_SESSION_Name['xptolevel']?></td>
<td>
</td>
<td></td>
</tr>
<tr>
<td>Tribe:</td>
<td><?php echo $_SESSION_Name['tribe']?></td>
<td></td>
<td>Your affiliated tribe. </td>
</tr>
<tr>
<td>Gold:</td>
<td><?php echo $_SESSION_Name['gold']?></td>
<td></td>
<td>Your total gold.</td>
</tr>
<tr>
<td>Health:</td>
<td><?php echo $_SESSION_Name['currhealth']?>/<?php echo $_SESSION_Name['maxhealth']?></td>
<td>
<?php if($_SESSION_Name['sp'] > 0)
{ echo '<form action="/scripts/increasehealth.php" method="post"><input type="submit" name="health" value="+10"></form>'; }
?>
</td>
<td>Increase your max health to last longer against bosses and in pvp.</td>
</tr>
<tr>
<td>Attack:</td>
<td><?php echo $_SESSION_Name['attack']?></td>
<td>
<?php if($_SESSION_Name['sp'] > 0)
{ echo '<form action="/scripts/increaseattack.php" method="post"><input type="submit" name="attack" value="+1"></form>'; }
?>
</td>
<td>Affects damage given against bosses and in pvp.</td>
</tr>
<tr>
<td>Defense:</td>
<td><?php echo $_SESSION_Name['defense']?></td>
<td>
<?php if($_SESSION_Name['sp'] > 0)
{ echo '<form action="/scripts/increasedefense.php" method="post"><input type="submit" name="defense" value="+1"></form>'; }
?>
</td>
<td>Affects damage taken against bosses and in pvp.</td>
</tr>
<tr>
<td>Energy:</td>
<td><?php echo $_SESSION_Name['currenergy']?>/<?php echo $_SESSION_Name['maxenergy']?></td>
<td>
<?php if($_SESSION_Name['sp'] > 0)
{ echo '<form action="/scripts/increaseenergy.php" method="post"><input type="submit" name="energy" value="+1"></form>'; }
?>
</td>
<td>Increase your max energy to complete more jobs.</td>
</tr>
</table>
</div>
</div>
<!-- Body Table End -->

<!-- Sitemap Table Start -->
<div id="sitemap">
<hr style="background-color:#D11919;color:#D11919;">
<div id="sitemapbar">
<div id="smb1"><h3><a href="/index.php">Play</a></h3><ul><li><a href="/test.php">Testing</a></li><li><a href="#">ROI</a></li><li><a href="#">Demo Video</a></li><li><a href="#">Interactive Overview</a></li><li><a href="#">Security</a></li><li><a href="#">Mobile</a></li></ul></div>
<div id="smb2"><h3><a href="/charoverview.pvp">Character</a></h3><ul><li><a href="#">Webinars</a></li><li><a href="#">Newsletters</a></li><li><a href="#">Blog</a></li><li><a href="#">Best Practices</a></li></ul></div>
<div id="smb3"><h3><a href="#">Account</a></h3><ul><li><a href="#">Why AWS?</a></li><li><a href="#">Team</a></li><li><a href="#">Legal</a></li></ul></div>
<div id="smb4"><h3><a href="#">Support</a></h3><ul><li><a href="#">Contact Us</a></li><li><a href="#">Getting Started</a></li></ul></div>
<div id="smb5"><a href="#" target="_blank"><img src="/images/facebook.png" alt="DBK Games on Facebook"></a><a href="#" target="_blank"><img src="/images/twitter.png" alt="DBK Games on Twitter"></a><a href="#" target="_blank"><img src="/images/youtube.png" alt="DBK Games on Youtube"></a></div>
</div>
<hr style="background-color:#FCBF28;color:#FCBF28;">
</div>
<!-- Sitemap Table End -->

<!-- Footer Table Start -->
<div id="footer">
<div id="footerbar">
2013 DBK Games, Inc. | <a href="webmaster@dbkgames.com">webmaster@dbkgames.com</a>
</div>
</div>
</body>
</html>
<!-- Footer Table End -->







