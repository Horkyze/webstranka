<?php
require_once('settings.php');
require_once('functions.php');
require_once('mysql_connect.php');
mysql_set_charset('utf8'); 
// Verification
// Validation
// Converting to variables

// todo
// Inserting into database
// Crating .html file
// Sending mails

$id = id("registration");

echo "<pre>";
print_r($_POST);
// Get the number of delegates
if ( isset($_POST['number_of_delegates']) && is_numeric($_POST['number_of_delegates']))	// then it is ok
{
	$number_of_delegates = intval(addslashes($_POST['number_of_delegates']));
}

// Getting fields of every delegate
for ($i = 1; $i <= $number_of_delegates; $i++) // every delegate
{
	$d = "delegate_".$i."_first_name,delegate_".$i."_last_name,delegate_".$i."_birth,delegate_".$i."_gender,delegate_".$i."_phone,delegate_".$i."_email,delegate_".$i."_id_card,delegate_".$i."_committee,delegate_".$i."_experience";
	$a = explode(",","$d"); 
	for($o = 0; $o < count($a); $o++) // and each field of delegate
	{
		if ( isset($_POST[$a[$o]]) && is_string($_POST[$a[$o]]) && $_POST[$a[$o]] != "")	// then it is ok
		{
			$in[$a[$o]] = addslashes($_POST[$a[$o]]);
			$$a[$o] = addslashes($_POST[$a[$o]]);
		}
		else // missing some field from delegate..
		{
			die($a[$o]. " - this field is not filled properly.");
		}
	}
	// check if is uploaded photo
	if ($_FILES['delegate_'.$i.'_photo']['error'] == 0)
	{
		$n = "delegate_";
		$n .= $i;
		$n .= "_photo";
		$todo[$i] = '$photos ['.$i.'] = '."uploadImage('$n',$id);";
	}
}
unset($i);
unset($a);
unset($o);
unset($d);
// Check required fields
$required = explode(",","school_name,school_address,school_phone,country,city,school_international,advisor_name,advisor_phone,advisor_email,prefered_countries,accomodation,question,answer");
foreach($required as $key => $field)
{
	if ( isset($_POST[$field]) && is_string($_POST[$field]) && $_POST[$field] != "")	// then it is ok
	{
		$in[$field] = addslashes($_POST[$field]);
		$$field = addslashes($_POST[$field]);
	}
	else // something is wrong
	{
		die($field . " - this field is not filled properly.");
	}
}
unset($field);
unset($key);

// Converting optional inputs to variables
$optional = explode(",","additional_info,");
foreach($optional as $key => $field)
{
	if ( isset($_POST[$field]) && is_string($_POST[$field]))	// then it is ok
	{
		$in[$field] = addslashes($_POST[$field]);
	}
}


// When this point is reached without problems, all variables are set



// Insertin inputs into databse
$sql =  sprintf("INSERT INTO `registration` (`id`) VALUES ('%s') ", $id);
if(!mysql_query($sql)) 
	echo "Something wrong happend, my bad please report this error it@bratmun.sk <br> $sql";
	
foreach($in as $key => $val)
{
	$sql = sprintf("UPDATE `registration` SET  `%s` =  '%s' WHERE  `id` = '%s' ", $key, $val, $id);
	if(!mysql_query($sql)) echo "Something wrong happend, my bad please report this error it@bratmun.sk <br> $sql";
}

if (!is_dir("reg/registration_$id/"))
mkdir("reg/registration_$id/");

if (isset($todo))
{
	foreach($todo as $k => $eval)
	{
		eval($eval); //uploading images
	}	
}
$f = fopen("reg/registration_$id/Registration_$id.html","w");

(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? $root = 'https://' : $root = 'http://';
$root .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'])."/";


// message
$message = "
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<style type=text/css >
body {
	background-image: url({$root}/img/Background_gradient.jpg);
	background-repeat: repeat-x;
	background-color: #727272;
}

.wrapper{
   margin-left: auto;
   margin-right: auto; 
	height: auto;
	width: 960px;
	background-image: url({$root}/img/Gradient.jpg);
	background-repeat: repeat-x;
	background-color: #204D88;
	box-shadow: 3px 3px 3px 3px #777;
}

p {
	font: normal 15px Trebuchet MS;
	color: white;
}
h1{
	text-decoration: none;
	font-family: Georgia;
	font-size: 15px;
	color: white;
	text-align: center;
}
.content{
	color: white;
	font: normal 15px Georgia;
	padding: 15px;
}
table{
	color: white;
	margin-left: auto;
	margin-right: auto;

}
td{
	padding: 3px;
	margin: 3px;
	width: auto;
}
tr:first-child{
	width: 200px;
}
</style>
  <title>New Reristration Form</title>
</head>
<body>
<div class=\"wrapper\">
<h1>New Registration | ID = $id</h1>
<div class=content align=center >
<table>
<tr><td>School Name: 								</td><td>	$school_name		</td></tr>
<tr><td>School Address: 							</td><td>	$school_address		</td></tr>
<tr><td>School Phone: 								</td><td>	$school_phone 		</td></tr>
<tr><td>International School: 					</td><td>	$school_international		</td></tr>
<tr><td>City : 										</td><td>	$city		
</td></tr>
<tr><td>Country : 									</td><td>	$country		
</td></tr>
<tr><td>Faculty Advisor Name :					</td><td>	$advisor_name		</td></tr>
<tr><td>Faculty Advisor Phone Number :			</td><td>	$advisor_phone		</td></tr>
<tr><td>Faculty Advisor Email :					</td><td>	$advisor_email		</td></tr>

";


$delegate_emails = "";
for($i = 1; $i <= $number_of_delegates; $i++){
$fname = 	$GLOBALS['delegate_'.$i.'_first_name'];	 
$sname = 	$GLOBALS['delegate_'.$i.'_last_name'];		 
$birth = 	$GLOBALS['delegate_'.$i.'_birth'];		 
$gndre = 	$GLOBALS['delegate_'.$i.'_gender'];			  
$phone = 	$GLOBALS['delegate_'.$i.'_phone'];			 
$email =  	$GLOBALS['delegate_'.$i.'_email'];			 
$id_card = 	$GLOBALS['delegate_'.$i.'_id_card'];		 
$committee =$GLOBALS['delegate_'.$i.'_committee'];		 
$ex =  	$GLOBALS['delegate_'.$i.'_experience'];	

$delegate_emails .= "$email,";
if (isset($photos[$i]))
	$photo = $root.$photos[$i];
else
	$photo = false;

$message .= "
					<tr><td> Delegate number : 					</td><td>	$number_of_delegates		</td></tr>
					<tr><td> ----First name : 							</td><td>	$fname		</td></tr>
					<tr><td> ----Last Nam : 								</td><td>	$sname		</td></tr>
					<tr><td> ----Date of birth : 						</td><td>	$birth			</td></tr>
					<tr><td> ----Gender : 								</td><td>	$gndre		</td></tr>
					<tr><td> ----Phone : 									</td><td>	$phone			</td></tr>
					<tr><td> ----Email : 									</td><td>	$email			</td></tr>
					<tr><td> ----ID Card number : 						</td><td>	$id_card		</td></tr>
					<tr><td> ----Committee : 							</td><td>	$committee		</td></tr>
					<tr><td> ----Previous MUN attended : 			</td><td>	$ex	</td></tr>
					";
if ($photo)					
	$message .= "<tr><td> Photo : 									</td><td>	<img src='$photo' width=200 height=auto />			</td></tr>
					";
}

if (!isset($additional_info)) $additional_info = "Not speciefied";
$message .=" 
<tr><td>Prefered Country : </td><td>$prefered_countries </td></tr>
<tr><td>Additional information : </td><td> $additional_info </td></tr>
<tr><td>Securring of Accomodation :</td><td>$accomodation</td></tr>
<tr><td>Question : </td><td>$question</td></tr>
<tr><td>Answer :</td><td>$answer</td></tr>
</div>
</div>
</table>
</body>
</html>
";
fwrite($f, $message);
fclose($f);
print("New school has just registered, to see the information about it go <a href='$root"."reg/registration_$id/'>$root"."reg/registration_$id/</a> ");
system("chmod 777 /home/other/bratmun/www/reg -R");

// To send HTML mail, the Content-type header must be set
$headers = 'Content-type: text/html; charset=utf-8 \r\n';
$to = substr($delegate_emails, 0, -1);
$subject = "BratMUN Registration Sucessful";
$message = file_get_contents("delegate_mail.html");
if (mail($to, $subject, $message, $headers)) $note =  "Form submition sucessful! Mail sent to folowing people ($to)";
else $note = "Form submition sucessful!";

//mail to advisor
$headers = 'Content-type: text/html; charset=utf-8 \r\n';
$to = $advisor_email;
$subject = "BratMUN Registration Sucessful";
$message = file_get_contents("advisor_mail.html");
mail($to, $subject, $message, $headers);


$headers = 'Content-type: text/html; charset=utf-8 \r\n';
$to = "bratmun@bratmun.sk";
$subject = "New school registered";
$message = "New school has just registered, to see the information about it go <a href='$root/reg/registration_$id/'>$root/reg/registration_$id/</a> ";
mail($to, $subject, $message, $headers);

header("Location: index.php?note=$note");
?>
	
