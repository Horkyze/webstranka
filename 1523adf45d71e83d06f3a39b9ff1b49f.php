<form action="change_settings.php?admin=uplnenajvacsiadmin" method="post" style="margin-right: 20%" class="form">
<center><input type="submit" value="With great power comes great responsibility" /></center><br><br>
Password: 
<input type="password" name="password" /><br>Before making any changes...<br><hr>
<textarea cols="100" rows="30" name="file"><?php $file = file_get_contents('settings.php'); echo $file; ?> </textarea>
<br><hr>
<center><input type="submit" value="With great power comes great responsibility" /></center>
</form>