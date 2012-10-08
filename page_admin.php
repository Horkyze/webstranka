<?php 

if (!(isset($_REQUEST['admin']) && $_REQUEST['admin'] == '2a68978c39e2f4e4b0c87f4a687977cf')) {die();}
/*else {
echo "Mali by sme sa dohodnut ako to bude z webom BratMUNu tento rok, som ochotny nadalej spolupracovat (vylepsit registraciu napr. atd.), ale
kedze nieste moji spoluziaci a vtedy som to robil pre nich, tak to nebude zadarmo. Ak iste nechcete so mnou spolupracovat, tak si urobte novu stranku, edidacia je vypnuta kym sa nedohodneme, stranka stale normalne bude bezat. Cim skor sa dohodneme tym lepsie. 
Matej Bellus (matej.bellus@gmail.com)";
die();
}**/
require_once('mysql_connect.php');
require_once('functions.php');

//// NEW PAGE **********
if (isset($_REQUEST['action']) && $_REQUEST['action']=="newpage") 
{
	if (new_page()) header('Location: page_admin.php?admin=2a68978c39e2f4e4b0c87f4a687977cf&note=Page created, you can edit it'); 
}

//// DELETE PAGE **********
if (isset($_REQUEST['del']) && $_REQUEST['del']=="Delete") 
{
	if (del_page($_REQUEST['field'])) header('Location: page_admin.php?admin=2a68978c39e2f4e4b0c87f4a687977cf&note=Page deleted'); 
}

//// EDIT PAGE **********
if ( isset($_POST['editor1']) && isset($_POST['name']) )
{
	if (edit_page($_POST['editor1'],$_POST['name'], $_POST['id'])) header('Location: page_admin.php?admin=2a68978c39e2f4e4b0c87f4a687977cf&note=File updated sucessfuly'); 
	else echo "error editing page..";
}

require_once('settings.php');
require_once('html_header.php');
?>
 <link rel="stylesheet" href="ck/contents.css" />
 <script type="text/javascript" src="ck/ckeditor_basic.js""></script>
<div class="wrapper">
	<center>


	</center>

	<?php require('menu.php');?>
	<?php if (isset($_GET['note']))if(is_string($_GET['note']) && $_GET['note']!="") echo "<p class=note>Note: ".htmlentities($_GET['note'])."</p><br>"; else if(isset($_GET['note']))  print("WTF Looser, trying some simple hacks?");?>
	<div class="clear"></div>
		<center><h1>Page Administration</h1></center>
	<div class="content">
	
	
	<table>
	<tr><td>
	<form action="page_admin.php?admin=2a68978c39e2f4e4b0c87f4a687977cf" method="get">
	Choose page: <select name="field">
	<?php
	$sql = sprintf("SELECT * FROM `page`");
	if ($query = mysql_query($sql))
	{
		while ($res = mysql_fetch_array($query))
		{
			$a[] = $res[name];
		}
		sort($a);
		for ($i = 0; $i < count($a); $i++)
		echo "<option name=$a[$i]>$a[$i]</option>";
	}?>
	</select>
	
	<input type="submit" value="Edit"/>
	<input type="submit" name="del" value="Delete" onclick="return confirm('DELETE FOREVER selected page?')"/>
	<input type="hidden" name="admin" value="2a68978c39e2f4e4b0c87f4a687977cf" />
	</form></td>
	<td>
	<h1> | </h1>
	</td>
	<td>
	
	<form action="page_admin.php" method="get">
	<input type="submit" value="New page"/>
	<input type="hidden" name="admin" value="2a68978c39e2f4e4b0c87f4a687977cf" />
	<input type="hidden" name="action" value="newpage" />
	</form>
	</tr></td></table>
	<hr>
	
	
	
	<form action="page_admin.php?admin=2a68978c39e2f4e4b0c87f4a687977cf" method="post">
	<?php
	if (isset($_GET['field']))
	{
		$sql = sprintf("SELECT * FROM `page` WHERE name='%s' ", mysql_real_escape_string($_GET["field"]) );
		if ($query = mysql_query($sql))
		{
			while ($res = mysql_fetch_array($query))
			{
				echo "Page: <input type=text name=name value=$res[name] > <u>Don't use</u> spaces for page name!!<br><br><textarea cols=100 rows=10 class=ckeditor name=editor1 id=editor1 >$res[content]</textarea><br>";
				$id = $res['id'];
			}		
		}
		echo "<input type=submit value=Save page><input type=hidden value=$id name=id>";
		
	}
	else echo "No page selected yet";
	?>
	<input type="hidden" name="admin" value="2a68978c39e2f4e4b0c87f4a687977cf" />
	</form>
	
	
	
	</div>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>