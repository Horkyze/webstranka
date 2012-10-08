<?php 
if (!isset($_GET["id"])) die();
$name = $_GET["id"];
//foreach ($_GET as $key =? $val) if ($val ==) 
require_once('settings.php')?>
<?php require_once('html_header.php')?>
<body>
<center><img src="img/lolo.png" align="middle" width="960"></center>
<div class="wrapper">
<img src="img/slogan.png" align="middle" width="960">
	<center>
	<?php if (isset($_GET['note']))if(is_string($_GET['note']) && $_GET['note']!="") echo "<p class=note>Note: ".htmlentities($_GET['note'])."</p><br>"; else if(isset($_GET['note']))  print("WTF Looser, trying some simple hacks?");?>

	</center>
	<?php require('menu.php');?>
	<div class="content">

<?php require_once("mysql_connect.php");
$sql = sprintf("SELECT `content` FROM `page` WHERE name='%s' ", mysql_real_escape_string($name));
if ($query = mysql_query($sql))
{

	while ($res = mysql_fetch_array($query))
	echo $res['content'];
}
?>


</div>
</div>
<?php require_once('sponsors.php')?>	
<?php require_once('footer.php'); ?>
</body>
</html>