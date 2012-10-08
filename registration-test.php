<?php require_once('settings.php');
require_once('functions.php');?>
<?php require_once('html_header.php')?>
<body>
<center><img src="img/lolo.png" align="middle" width="960"></center>
<div class="wrapper">
	<?php require('menu.php');?>
	<div class="clear" ></div>
	<div class="content">
	<?php //$n = id("registration")-1;
	//echo "Number of registered schools: ". $n ."<br>"; 
	if (isset($_GET['note'])) if(is_string($_GET['note']) && $_GET['note']!="") echo "<p class=note>Note: ".htmlentities($_GET['note'])."</p><br>"; else if(isset($_GET['note']))  print("WTF Looser, trying some simple hacks?");?>



<script>

jQuery.noConflict();
(function($) { 
  $(function() {
  
  function lol()
  {
  		var num = $('#number_of_delegates').val(); 
      		$.get("try.php?number_of_delegates="+num, function(data){
       			$('#form').empty();
       			$('#form').hide();
       			$('#form').html(data);
       			$('#form').fadeIn(500);
    				});
  }
  
  $('#number_of_delegates').change(function() {
		lol();
	});
    			
  $("#loll").click(function () { // Cliknute na tlacitko
     lol();	
    });
    
    $('#formID1').submit(function(){
    	return false;
    });
    
  });
})(jQuery);

</script>
Registration is closed, thank you for registering.<br>
See you in Bratislava!
	</div>
	


</div>	
<?php require_once('footer.php'); ?>
</body>
</html>

