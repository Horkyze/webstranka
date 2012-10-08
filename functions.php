<?php
require_once('mysql_connect.php');
function image_resize($src, $dst, $width, $height, $crop=0){

  if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

  $type = strtolower(substr(strrchr($src,"."),1));
  if($type == 'jpeg') $type = 'jpg';
  switch($type){
    case 'bmp': $img = imagecreatefromwbmp($src); break;
    case 'gif': $img = imagecreatefromgif($src); break;
    case 'jpg': $img = imagecreatefromjpeg($src); break;
    case 'png': $img = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
  }

  // resize
  if($crop){
    if($w < $width or $h < $height) return "Picture is too small!";
    $ratio = max($width/$w, $height/$h);
    $h = $height / $ratio;
    $x = ($w - $width / $ratio) / 2;
    $w = $width / $ratio;
  }
  else{
    if($w < $width and $h < $height) return "Picture is too small!";
    $ratio = min($width/$w, $height/$h);
    $width = $w * $ratio;
    $height = $h * $ratio;
    $x = 0;
  }

  $new = imagecreatetruecolor($width, $height);

  // preserve transparency
  if($type == "gif" or $type == "png"){
    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
    imagealphablending($new, false);
    imagesavealpha($new, true);
  }

  imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

  switch($type){
    case 'bmp': imagewbmp($new, $dst); break;
    case 'gif': imagegif($new, $dst); break;
    case 'jpg': imagejpeg($new, $dst); break;
    case 'png': imagepng($new, $dst); break;
  }
  return true;
}


function uploadImage($file,$id, $new_name = false)
{
	global $in;
	
	$errors = array();
	if(!defined('MAX_SIZE'))
		define('MAX_SIZE', ini_get('post_max_size'));
	if(!defined('UPLOAD_DIR'))
	define('UPLOAD_DIR', "reg/registration_$id/photos/");
		if (!is_dir(UPLOAD_DIR)) 
			mkdir(UPLOAD_DIR);
	if ($_FILES[$file]["error"] == 0)
	{		
 		$type = strtolower(substr(strrchr($_FILES[$file]["name"],"."),1));
		$type = ".".$type;
 		$supported = array(".jpg",".png",".bmp",".gif");
 		if (in_array($type, $supported)) 
 		{
 	
				if (file_exists(UPLOAD_DIR . $_FILES[$file]["name"]))
					{
						$errors[] =  $_FILES[$file]["name"] . " already exists. ";
					}
				else
					{
						$info = getimagesize($_FILES[$file]["tmp_name"]);
						if ($info != false)
						{
							move_uploaded_file($_FILES[$file]["tmp_name"], UPLOAD_DIR . $_FILES[$file]["name"]);
							
							settype($file, "string");
							
							$sql = "UPDATE `registration` SET `$file` = '";
							$sql .= UPLOAD_DIR . $_FILES[$file]["name"];
							$sql .= "' WHERE `id` = '$id' ";
							mysql_query($sql);
							$k = "delegate_".$file[9]."_first_name";
							$new_name = $file."($in[$k])";
							if($new_name)
							{
								rename (UPLOAD_DIR.$_FILES[$file]["name"],UPLOAD_DIR.$new_name.$type);
								$sql = "UPDATE `registration` SET `$file` = '";
								$sql .= UPLOAD_DIR.$new_name.$type;
								$sql .= "' WHERE `id` = '$id' ";
								mysql_query($sql);
								$path = UPLOAD_DIR.$new_name.$type;
							}	
						}
					}

		}
		else
		{
			$errors[] = "not supported type";
		}

	}
	return $path;
}

function log_me()
{
	$handle = fopen("log/acess_log.html","r");
	$old = file_get_contents("log/acess_log.html");
	fclose($handle);
	$handle = fopen("log/acess_log.html","w");
	$ip = $_SERVER['REMOTE_ADDR'];
	date_default_timezone_set('Europe/Bratislava');
	$date = date('l jS \of F Y h:i:s A');
	$time = time();
	//$url = 'http://stonito.com/script/geoip/?ip='.$_SERVER['REMOTE_ADDR'];
	$country = "--";
	if (isset($country[0]))
		$all = "<pre>$ip ($country[0]) | $date |  Time = $time \n";
	else
		$all = "<pre>$ip (--) | $date | Time = $time \n";
	fwrite($handle,$all);
	fwrite($handle,$old);
	fclose($handle);
}

function edit_page($c, $t, $i)
{
	$content =  mysql_real_escape_string($c);
	$name = mysql_real_escape_string($t);
	$id = mysql_real_escape_string($i);
	//Update
	$q = sprintf ("UPDATE  `bratmun_sk`.`page` SET  `content` =  '%s' , `name` =  '%s' WHERE  `page`.`id` = '%s' ", $content, $name, $id);
	if (mysql_query($q)) return true;
	return false;
}
function del_page($t)
{
	$sql = sprintf("DELETE FROM `bratmun_sk` . `page` WHERE `page` . `name` = '%s' ", mysql_real_escape_string($t) );
	if (mysql_query($sql)) return true;
	else echo mysql_error();
}

function new_page()
{
$id = id("page");
$sql = sprintf("INSERT INTO  `bratmun_sk`.`page` (`id` , `content` , `name`) VALUES ('%s',  '%s',  '%s') ", $id, "NEW_$id" , "NEW_$id");
if (mysql_query($sql)) return true;
else echo mysql_error();
}

function id($table)
{
	$q = mysql_query("SELECT `id` FROM `$table` ");	
	while ($res = mysql_fetch_array($q))
	{
		$pole[$res['id']] =  $res['id'];	
	}
	$id = 1;
	while (true)
	{
		if (!isset($pole[$id])) return $id;
		$id++;
	}
	
}
?>