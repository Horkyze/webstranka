<?php 
require_once('settings.php');
if ($_POST['password'] != $info['password']) 
{
	header("Location: index.php?note=Wrong Password!");
	die();
}
?>
<?php require_once('html_header.php')?>
<div class="wrapper">
	<center>
	<?php if(is_string($_GET['note']) && $_GET['note']!="") echo "<p class=note>Note: ".htmlentities($_GET['note'])."</p><br>"; else if(isset($_GET['note']))  print("WTF Looser, trying some simple hacks?");?>
	</center>
	<div class="clear"></div>
		<center><h1>Applying changes</h1></center>
	<div class="content">
<?php
if ($_GET['admin'] =="uplnenajvacsiadmin")
{
	 if ($_POST['password'] == "pwd")
	 {
	 $file = $_POST['file'];
	 if(file_put_contents("settings.php",$file)) echo "Si uplne najvacsi admin :) <a href=index.php> index</a>";
	 require_once('footer.php');
	 die();
	 }
	 else echo "wrong password";
	 die();
}
	  


$filename = 'settings.php';

if (is_writable($filename)) 
{

    if (!$handle = fopen($filename, 'w')) 
    {
         echo "Cannot open file ($filename)";
         exit;
	 }
	 fwrite($handle, '<?php 
');
    foreach ($_POST as $key => $val)
	{
		if ($val == "" && $key == "additional")
		if ($key == "password") continue;
		//echo $key." => ".$val."<br>";
		fwrite($handle,'$info["');
		fwrite($handle,"$key");
		fwrite($handle,'"] = "');
		fwrite($handle,"$val");
		fwrite($handle, '"; ');
		fwrite($handle, '
');
	}
	
		fwrite($handle, '?>');
		fclose($handle);
		$notice =  "Success, changes applied ";
		echo $notice;
   	
 } 
 		else 
 		{
    	 	$notice =  "The file $filename is not writable";
    		echo $notice;//header("Location: index.php?note=$notice");
		}
?>

	</div>

</div>

<?php require_once('footer.php'); ?>
</body>
</html>