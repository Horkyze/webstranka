<form action="change_settings.php" method="post" style="margin-right: 20%" class="form">
<center><input type="submit" value="With great power comes great responsibility" /></center><br><br>
Password: 
<input type="password" name="password" /><br>Before making any changes...<br><hr>
Title: 
<input type="text" name="title" value="<?php echo $info['title'];?>" /><br><hr>
BratMUN Date: 
<input type="text" name="countdown" value="<?php echo $info['countdown'];?>" /><br>Keep the formatting! Otherwise it wont work! DD/MM/YYYY 12:00 AM<br><hr>
Registration Form Availability: 
<input type="text" name="registration" value="<?php echo $info['registration'];?>" /><br>yes/no<br><hr>
Num. Of Delegated to Register: 
<input type="text" name="number_of_delegates" value="<?php echo $info['number_of_delegates'];?>" /><br>Min 1, Max 10<br><hr>
Email, where reg. forms will be sent: 
<input type="text" name="mail1" value="<?php echo $info['mail1'];?>" /><br>someone@somwhere.com<br><hr>
Additional Email: 
<input type="text" name="mail2" value="<?php echo $info['mail2'];?>" /> <br>You can keep is blank<br><hr>
<br>
<center><input type="submit" value="With great power comes great responsibility" /></center>
</form>