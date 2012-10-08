<?php
setcookie('watched',1,time()+999999);

?>
<html>
<head>
<title >Video</title>
<style >
body{
	background-color: black;
}
a , .vid{
	margin: auto;
	position: static;
	color: white;
	text-decoration: underline;
	font: Georgia;
	font-size: 17px;
}
.wrapper{
	width: 930px;
	margin: auto; 
}
</style>
</head>
<body>
<div class="wrapper">
<div class="vid">
<a href="index.php">Skip intro</a>
</div>
<iframe id="vid" allowfullscreen="" frameborder="0" height="550" src="http://www.youtube.com/v/avU4PWHHg_Y&amp;hl=nl&amp;fs=1&amp;rel=0&amp;hd=1&amp;autoplay=1" width="925"></iframe>
</div>
</body>
</html>