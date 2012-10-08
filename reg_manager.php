
<?php
	require_once "html_header.php";
	require_once "mysql_connect.php";
	
	switch($_POST['action'])
	{
		case "approve":
								mysql_query("UPDATE `registration` SET `approved` = 1 WHERE `id` = {$_POST['id']}");
								header("Location: reg_manager.php");
								break;
								
		case "disapprove":
								mysql_query("UPDATE `registration` SET `approved` = NULL WHERE `id` = {$_POST['id']}");
								header("Location: reg_manager.php");
								break;
								
		case "see":
								$sql = mysql_query("SELECT * FROM `registration` WHERE `id` = {$_POST['id']}");
								while ($result = mysql_fetch_array($sql, MYSQL_ASSOC))
								{
									$row = $result;
								}
								
								$w = "";
								foreach($row as $key => $val)
								{
									if(!empty($val))
									{
										$w .= "$key : <i style='color: white' >$val </i><br>";
									} 
								}
								print("<pre>".$w);
								include('footer.php');
								die();						 
	}
	?>
	<style >
	input{
		width: auto;
		
	}
	body{
		background: black;
	}
	</style>
	<?php
	// approved
	$q = "SELECT * FROM `registration` WHERE `approved` = 1 ORDER BY `school_name` ASC ";
	$r = mysql_query($q);
	while ($res = mysql_fetch_array($r, MYSQL_ASSOC))
	{
		$reg[] = $res;
	}
	if (isset($reg) &&is_array($reg))
	{
		echo "<hr><span style='color: lime; font-size: larger' >Approved registration</span><table>";
		foreach($reg as $r => $n)
		{
			if($r % 2 == 0) echo "<tr>";
			else echo "<tr style='background-color: #2c2c2c' >";
			echo "<td style='width: auto; color: lime' >{$n['id']} {$n['school_name']}</td>
			<td style='background-color: red; width: auto'> 
				<form action='reg_manager.php' method='post'>
					<input type=hidden name=action value=disapprove /> 
					<input type=hidden name=id value={$n['id']} />
					<input type=submit value=Disapprove /> 
				</form></td>
				<td style='width: auto' >
				<form action='reg_manager.php' method='post'>
					<input type=hidden name=action value=see /> 
					<input type=hidden name=id value={$n['id']} />
					<input type=submit value='See Detais' /> 
				</form>
				</td><td></td></tr>";
		}
		echo "</table>";
		unset($res);
		unset($reg);
		unset($r);
		unset($n);
		unset($q);
	}
	// disapproved
	$q = "SELECT * FROM `registration` WHERE `approved` IS NULL ORDER BY `school_name` ASC ";
	$r = mysql_query($q);
	while ($res = mysql_fetch_array($r, MYSQL_ASSOC))
	{
		$reg[] = $res;
	}
	
	echo "<hr><span style='color: red; font-size: larger' ><u>Disapproved (by default all)<u></span><table>";
	foreach($reg as $r => $n)
	{
				if($r % 2 == 0) echo "<tr>";
			else echo "<tr style='background-color: #2c2c2c' >";
		echo "<td style='width: auto; color: red' >{$n['id']} {$n['school_name']}</td>
		<td style='background-color: lime; width: auto'> 
			<form action='reg_manager.php' method='post'>
				<input type=hidden name=action value=approve /> 
				<input type=hidden name=id value={$n['id']} />
				<input type=submit value=Approve /> 
			</form></td>
			<td style='width: auto'>
			<form action='reg_manager.php' method='post'>
					<input type=hidden name=action value=see /> 
					<input type=hidden name=id value={$n['id']} />
					<input type=submit value='See Detais' /> 
			</form>
			</td><td style='width: auto'>
			<form action='reg_manager.php' method='post' onsumbit='return confirn('Are you sure to delete it?');'>
					<input type=hidden name=action value=trash /> 
					<input type=hidden name=id value={$n['id']} />
					<input type=submit value='Trash' /> 
			</form>
			</td></tr>";
	
		
	}
	echo "</table>";
	print_r($_POST);


?>

<?php require_once "footer.php"; ?>
