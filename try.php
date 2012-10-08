	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
	<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>

	<script >
	//	$("#formID1").validationEngine({scroll: true});
	//	$("#formID1").validationEngine('init', {promptPosition : "centerRight", scroll: true});
   //	$("#formID1").validationEngine('attach');
		$("#formID1").validationEngine();
	//	alert( $('#formID1').validationEngine('validate') );
		function woo()
		{
		//	 $("#formID1").submit();
		//			$("#formID1").validationEngine({scroll: true});
		$("#formID1").validationEngine('init', {promptPosition : "centerRight", scroll: true});
   	$("#formID1").validationEngine('attach');
	  	$("#formID1").validationEngine();
		return $('#formID1').validationEngine('validate');
		//if (re == 'true') $("#formID1").submit();
		//return false;
		}
	</script>
	<style >
		.line{
			margin-left: auto;
			margin-right: auto;
			background-color: transparent;
			margin: 1px;
			border-bottom-style: dotted;
			border-bottom-width: 0px;
			border-bottom-color: white;
			width: 700px;
		}
		.label{
			text-align: left;
			display: inline-block;
			float: none;
			width: 300px;
			padding: 8px;
			margin: 5px;
			
			background-color: transparent;
		}
		.input{
			display: inline-block;
			float: none;
			width: 300px;
			padding: 8px;
			margin: 5px;
		
			background-color: transparent;
		}
		.clear{
			clear: both;
		}
	</style>
<?php
// NUMBER OF DELEGATES
// 
if (!isset($_GET['number_of_delegates'])) die("Upss something went wrong :/ Try Again. Or you try to run this file alone..");
require_once ("settings.php");
$min = 1;
$max = 5;

$a = $number_of_delegates = intval($_GET['number_of_delegates']);

$questions[0] = "What do you regard to be the biggest long term barrier for the improvement of EU-RUSSIA relations?";
$questions[1] = "As a newly elected Minister of Foreign Affairs of the Republic of Turkey, what would be your three main goals? (hint: think of Turkeys relations with Cyprus, Israel, Armenia or EU)";
$questions[2] = "Do you find the revolution in Egypt to be succesfull after Hosni Mubarak has been thrown down? What are the biggest risks when a military council is running the country?";
$questions[3] = "Why are countries like Slovakia still not willing to recognize Kosovo?";
$questions[4] = "Greece supports the turkeys membership in EU although these two countries have had numerous disputes over their territory, for example the Cyprus dispute, that still isnt fully resolved . What benefits would Greece have from Turkeys EU membership?";
$questions[5] = "Why should it be important for EU to have a more integrated foreign policy ?";
$questions[6] = "You are an Iranian president delivering a speech at the UN. Talk briefly about the disadvantages of capitalism.";
$questions[7] = "Are you able to find ideological differences between Facism and Nazism?";
$questions[8] = "How can the V4 partnership be helpful in enlarging the EU by countries of Western Balcans and Eastern Partnership?";
$question = $questions[rand(0,count($questions)-1)];


if ( $a >= $min && $a <= $max)
{
	echo '
	<div align="center">
	<center>
		<p class="note">Welcome to BratMUN 2011 Registration Page<p><br>
		In order to register you must be at least 15 years old, student of high school and speak fluently english.
		<br>
		Please fill all fields, except those, which are marked (optional)
		<br>
		<h2>School information</h2>
		School delegations are obliged to provide following school information.
		<br>
		<br>
	</center>
	
		<form id="formID1" action="process_registration.php" method="POST" enctype="multipart/form-data">
		<div class=line>	<div class=label> School Name :				</div> <div class=input> <input type="text" name="school_name" id="school_name" class="validate[required]" ></div></div>
		<div class=line>	<div class=label> School Address:			</div> <div class=input> <input type="text" name="school_address" id="school_address" class="validate[required]"></div>	</div>
		<div class=line>	<div class=label> School Phone number :	</div> <div class=input> <input type="text" name="school_phone" id="school_phone" class="validate[required]" > 	</div></div>
		<div class=line>	<div class=label> Country :					</div> <div class=input> <input type="text" name="country" id="country"  class="validate[required]" >					</div>	</div> 
		<div class=line>	<div class=label> City :				 		</div> <div class=input> <input type="text" name="city" id="city" class="validate[required]" >						</div>	</div>
		<div class=line>	<div class=label> International School (IB):	</div> <div class=input>Yes <input type="radio" class=validate[required] name="school_international" id="school_international" value="yes" style="width: auto"/> </div></div> 
		<div class=line>	<div class=label>                         </div> <div class=input>No &nbsp<input type="radio" class=validate[required] name="school_international" value="no" id="school_international" style="width: auto"/></div></div>
	
	<hr>
	<h2>Faculty advisor information</h2>
		Please fill in the information about your faculty advisor (a teaher who will be responsible for you at BratMUN)
		<br>
		<br>
		You are strictly required to be accompanied by a faculty advisor. (The faculty advisor does not pay any fees for the conference)
		<br>
		<br>
		
	<div class=line>	<div class=label> Faculty Advisor Name :						</div> <div class=input> <input type="text" name="advisor_name" id="advisor_name" class="validate[required]" >	</div></div>
	<div class=line>	<div class=label> Faculty Advisor Phone Number :			</div> <div class=input> <input type="text" name="advisor_phone" id="advisor_phone" class="validate[required]" >	</div></div>
	<div class=line>	<div class=label> Faculty Advisor Email :						</div> <div class=input> <input type="email" name="advisor_email" id="advisor_email" class="validate[required]" > </div></div>
	
	';
		
	
	/// EACH DELEGATE
	$word[1] = "First";
	$word[2] = "Second";
	$word[3] = "Third";
	$word[4] = "Fourth";
	$word[5] = "Fifth";
	$word[6] = "Sixth";
	for($i = 1; $i <= $a; $i++) 
	{
		echo " 
			<hr>
			<div class=line> <b>$word[$i] delegate</b> </div>
			<div class=line>	<div class=label>	First Name :				</div> <div class=input> <input type=text 	name=delegate_{$i}_first_name id=delegate_{$i}_first_name   class='validate[required]' >	</div></div>
			<div class=line>	<div class=label>	Last Name :					</div> <div class=input> <input type=text 	name=delegate_{$i}_last_name id=delegate_{$i}_last_name class='validate[required]'>	</div></div>
			<div class=line>	<div class=label>	Date of birth :			</div> <div class=input> <input type=text 	name=delegate_{$i}_birth id=delegate_{$i}_birth class='validate[required]'>	</div></div>
			<div class=line>	<div class=label>									</div> <div class=input>Male &nbsp &nbsp	<input type=radio class=validate[required] name=delegate_{$i}_gender id=delegate_{$i}_gender value=Male style='width: auto'/>					</div></div>
			<div class=line>	<div class=label>									</div> <div class=input>Female <input type=radio class=validate[required] name=delegate_{$i}_gender id=delegate_{$i}_gender value=Female style='width: auto'/>					</div></div>
			<div class=line>	<div class=label>	Phone Number : 			</div> <div class=input> <input type=text 	name=delegate_{$i}_phone id=delegate_{$i}_phone class='validate[required]'>	</div></div>
			<div class=line>	<div class=label>	Email : 						</div> <div class=input> <input type=email 	name=delegate_{$i}_email id=delegate_{$i}_email class='validate[required]'>	</div></div>
			<div class=line>	<div class=label>	ID Card Number : 			</div> <div class=input> <input type=text 	name=delegate_{$i}_id_card id=delegate_{$i}_id_card class='validate[required]'>		</div></div>
			
			<div class=line>	<div class=label>	Committee attending : 	</div> <div class=input> <select id=commitee name=delegate_{$i}_committee id=delegate_{$i}_committee class='validate[required]'>
				<option value=''>				Select one, please</option>
				<option value='DISEC' > 	 	DISEC (Disarmament and Security)</option>
				<option value='ECOFIN'>			ECOFIN( Economical and Financial)</option>
	
				<option value='UNHRC '>			UNHRC (Human Rights Committee)</option>
				<option value='SPECPOL '>		SPECPOL (Special Political Committee)</option>
				<option value='UNODC '>			UNODC (United Nations Drug Control)</option>
				<option value='UNSC'>			UNSC (United Nations Security Council)</option>
			</select></div></div>
			<div class=line style='font-size: 11px; width: 600px;'>Since the number of delegates in each committee is limited, the organizers will sometimes have to split-up your delegaion in order to fit the coutry matrix. See the committee topics <a target='_blank' href='page.php?id=committess_main'>here.</a></div>
			<div class=line>	<div class=label> Previous conferences attended :</div> <div class=input> <input type=text name=delegate_{$i}_experience id=previous class=validate[required] >	</div></div>
		   <div class=line style='font-size: 11px; width: 600px;'>Do you have any previous MUN, EYP or other debating experience? (If yes, please specify)</div>
			
			
			<div class=line>	<div class=label>	Upload photo (optional)	</div> <div class=input> <input type=file name=delegate_{$i}_photo  />	</div></div>
			";
	}
	//// END EACH DELEGATE
		
	echo '
			<hr>
			
			<div class=line>	<div class=label> List of prefered countries : </div> <div class=input><input type="text" name="prefered_countries" id="prefered_countries" class="validate[required]"> </div></div>
			<div class=line style="font-size: 11px; width: 600px;">Choose in accordance to the <a href="doc/Country Matrix 2011.pdf" target="_blank" >country matrix</a>. (The country matrix is a subject to change depending on number of registered delegates and their preferences)</div>
			<div class=line>	<div class=label> Securring of Accomodation </div> <div class=input> Yes (required by all delegations out of Slovakia)<input type="radio" class=validate[required] name="accomodation" id=accomodation value="yes" style="width: auto"/>	</div></div>
			<div class=line>	<div class=label> </div> <div class=input> No &nbsp<input type="radio" class=validate[required] name="accomodation" id=accomodation value="no" style="width: auto" />	</div></div>
			<div class=line style="font-size: 11px; width: 600px;">See <a href="page.php?id=bratmun2011_conference_fees" target="_blank">Conference fees</a> to see prices of accommodation.</div>
			';
			echo "
			<br>
			Your delegation must answer this question. A good, creative answer will increase your chances of being accepted. (max 150 words)
			<br>
			<br>
			<b>$question</b>
			
			<input type='hidden' name='question' id=question value='$question' >
			<textarea spellcheck=true rows=10 cols=100 class=validate[required] id=answer name=answer ></textarea>
			";
			
			echo "
			<br><br>
			<div class=line> Additional information (special food, etc.)		</div>
			<textarea cols=60 rows=6 name=additional_info id=additional_info ></textarea>	
			<input type=hidden value=$a name=number_of_delegates id=number_of_delegates>
			<br>
			<div class=line align=center style='width: 100%; text-align: center' ><input type=submit value='Submit Form' onclick='return woo();' ></div>
			</form>

			
		
			</div>";
}
else die("Unacceptable input.");		
?>