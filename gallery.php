<?php require_once('settings.php')?>
<?php require_once('html_header.php')?>
<body>
<center><img src="img/lolo.png" align="middle" width="960"></center>
<div class="wrapper">
<img src="img/slogan.png" align="middle" width="960">
	<center>
	<?php if (isset($_GET['note']))if(is_string($_GET['note']) && $_GET['note']!="") echo "<p class=note>Note: ".htmlentities($_GET['note'])."</p><br>"; else if(isset($_GET['note']))  print("WTF Looser, trying some simple hacks?");?>

	</center>
	<?php require('menu.php');?>
	<div class="clear" ></div>
	<div class="content">
	<h1>Gallery</h1>
	<p>The Official BratMUN 2011 Photogallery.</p>
	<?php
echo "<table><tr>";
$i = -1;
if ($handle = opendir('img/t/')) 
{
    while (false !== ($file = readdir($handle))) 
    {	
        if ($file != "." && $file != "..") 
        {
        		$i++;
        		if ($i % 6 == 0) echo "</tr><tr>";
            echo "<td> <a href='img/700/$file' rel='lightbox[roadtrip]'><img src='img/t/$file' ></a> </td>";
        }
    }
    closedir($handle);
}
echo "</tr></table><hr>";
?>
	
	<table align="center" border="0" cellpadding="2" cellspacing="2" style="width: 95%; ">
	<tbody>
		<tr>
			<td>
					<a href="img/gallery/1.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t1.jpg"  /></a></td>
			<td>
					<a href="img/gallery/2.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t2.jpg"  /></a></td></td>
			<td>
					<a href="img/gallery/3.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t3.jpg"  /></a></td></td>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td>
					<a href="img/gallery/4.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t4.jpg"  /></a></td></td>
			<td>
					<a href="img/gallery/5.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t5.jpg"  /></a></td></td>
			<td>
					<a href="img/gallery/6.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t6.jpg"  /></a></td></td></td>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td>
				<a href="img/gallery/7.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t7.jpg"  /></a></td></td></td>
			<td>
				<a href="img/gallery/8.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t8.jpg"  /></a></td></td></td>
			<td>
				<a href="img/gallery/9.jpg" rel="lightbox[roadtrip]"><img src="img/gallery/t9.jpg"  /></a></td></td></td>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td>
			   <a href="img/gallery/10.png" rel="lightbox[roadtrip]"><img src="img/gallery/t10.jpg"  /></a></td></td></td></td>
			<td>
		      <a href="img/gallery/11.png" rel="lightbox[roadtrip]"><img src="img/gallery/t11.jpg"  /></a></td></td></td></td>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>
<p>
	&nbsp;</p>



</div></div>
<?php require_once('sponsors.php')?>	
<?php require_once('footer.php'); ?>
</body>
</html>