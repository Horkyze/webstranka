<?php
$con = mysql_connect("localhost", "bratmun_sk","canHHe2Wsn4Qj4fE");
if ($con)
		mysql_select_db("bratmun_sk");
else
{
 		mysql_error();
 		die();
}
mysql_set_charset('utf8');
?>