<?php require_once('settings.php')?>
<?php require_once('functions.php')?>
<?php require_once('html_header.php')?>
<div class="wrapper">
	<center>
	<?php if (isset($_GET['note'])) if(is_string($_GET['note']) && $_GET['note']!="") echo "<p class=note>Note: ".htmlentities($_GET['note'])."</p><br>"; else if(isset($_GET['note']))  print("WTF Looser, trying some simple hacks?");?>

	</center>

	<?php require('menu.php');?>

	<div class="clear"></div>
		<center><h1>Administration</h1></center>
	<div class="content">
<?php if ($_GET['admin']=='showmustgoon') require_once("b37625fea56bc11d2ef2f0acf4f0d17e.php"); ?>
	</div>

</div>

<?php require_once('footer.php'); ?>
</body>
</html>