<?php

$to = '08bellus@gjh.sk, matej.bellus@gmail.com';

$subject = 'Website Change Reqest';

$headers = "From: BratMUN_2011_Team \r\n";
$headers .= "Reply-To: bratmun@bratmun.sk \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8 \r\n";

$message  = '<html>
<head><style >
body {
	background-image: url(http://bratmun.sk/img/Background_gradient.jpg);
	background-repeat: repeat-x;
	background-color: #727272;
}


.wrapper{
   margin-left: auto;
   margin-right: auto; 
	height: auto;
	width: 960px;
	background-image: url(http://bratmun.sk/img/Gradient.jpg);
	background-repeat: repeat-x;
	background-color: #204D88;
}

p {
	font: Georgia MS;
	color: white;
}

.content{
margin: auto;
	color: white;
	font: normal 15px Georgia;
	padding: 15px;
	text-align: justify;
	background-color: #727272;
}

h1 {
	color: white;
	font: normal 20px Georgia;
}
h2{
	color: white;
	font: normal 19px Georgia;
	margin: 5px;
	padding: 5px;
}
h3{
	color: white;
	font: normal 16px Georgia;
}

a{
	color: white;
	text-decoration: underline;
}

.note{
	border-bottom: 2px solid white;
	border-top: 2px solid white;
	margin-bottom: 0px;
}

img{
	margin: auto;
}
.numbers{
font-size: 30px;

}

table{
	margin: auto;
}


.form{
	text-align: left;
}
td{
	width: 260px;
	background-color: silver;
}
input {width: 260px;}

</style>
</head>
<body><center>
	<img src="http://bratmun.sk/img/lolo.png" align="middle" width="960"></center><div class="wrapper">	<div class="content" style="text-align: center;" >		<h2 style="text-align: center;"> New registration! </h2>		<table rules="all" style="border-color: #666;" cellpadding="10" style="margin: auto;">
		<tr ><td> School name:</td><td > Novohradska </td></tr>
		<tr ><td> School name:</td><td > Novohradska </td></tr>
		<tr ><td> School name:</td><td > Novohradska </td></tr>
		<tr ><td> School name:</td><td > Novohradska </td></tr>
		</table>
	</div>
</div>
</body></html>';


mail($to, $subject, $message, $headers);

?>