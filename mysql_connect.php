<?php
$con = mysql_connect("localhost", "bratmun_sk","");
if ($con)
		mysql_select_db("bratmun_sk");
else
{
 		mysql_error();
 		die();
}
mysql_set_charset('utf8');
?>