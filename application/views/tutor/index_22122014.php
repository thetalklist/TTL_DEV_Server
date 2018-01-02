<!doctype html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://api.html5media.info/1.1.6/html5media.min.js"></script>
<script src="<?php echo base_url('js/home/html5.js');?>"></script>
<!--[if lte IE 8]>

<![endif]-->
<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->
</head>
<?php
$multi_lang = 'en';
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['multi_lang']))
{
	$multi_lang = $_SESSION['multi_lang'];
}
else
{
	$multi_lang = 'en';	
}

$this->load->model(array('lookup_model'));

$arrVal 	= $this->lookup_model->getValue('234', $multi_lang);
$lspeak_english = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('239', $multi_lang);
$lfree_session = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('211', $multi_lang);
$lflexible_pricing = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('212', $multi_lang);
$lalways = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('213', $multi_lang);
$lhuge_selection = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('214', $multi_lang);
$lthousand_selection = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('215', $multi_lang);
$lregistration_now = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('216', $multi_lang);
$lrisk_free = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('217', $multi_lang);
$lplay_sample_video = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('218', $multi_lang);
$lplay_how_it_works = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('219', $multi_lang);
$lwe_welcome = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('220', $multi_lang);
$ltutors = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('221', $multi_lang);
$lsign_up = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('222', $multi_lang);
$lsearch = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('223', $multi_lang);
$lschedule = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('224', $multi_lang);
$ltalk = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('225', $multi_lang);
$lchoose_tutor = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('226', $multi_lang);
$llook_tutor = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('227', $multi_lang);
$lcustom_video = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('228', $multi_lang);
$lamerican_tutor = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('229', $multi_lang);
$lyou_get_tutor = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('230', $multi_lang);
$lno_contracts = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('231', $multi_lang);
$lyou_get_flexible = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('232', $multi_lang);
$lyour_topic = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('233', $multi_lang);
$lyou_get_customize = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('240', $multi_lang);
$li_am_student = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('241', $multi_lang);
$li_am_tutor = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('4', $multi_lang);
$lhow_it_works = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('237', $multi_lang);
$lwhy = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('232', $multi_lang);
$lyour_topic = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('242', $multi_lang);
$lor = $arrVal[$multi_lang];
//---R&D@Oct-31-2013 : Set Language Variables
$arrVal 	= $this->lookup_model->getValue('470', $multi_lang);	$lEMAIL   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('471', $multi_lang);	$lPASSWORD   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('472', $multi_lang);	$lFIRSTNAME   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('473', $multi_lang);	$lIM_STUDENT   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('474', $multi_lang);	$lIM_TUTOR   	= $arrVal[$multi_lang];
//---R&D@Oct-31-2013 : Set Language Variables

/** added 25 Nov 13 */
$arrVal = $this->lookup_model->getValue('111', $multi_lang);$student =  $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('110', $multi_lang);$tutor = $arrVal[$multi_lang];
/*$lCPASSWORD = "Confirm Password";
$lIAMA ="I am a...";*/
$arrVal 	= $this->lookup_model->getValue('540', $multi_lang);	$lCPASSWORD   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('541', $multi_lang);	$lIAMA   	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('617', $multi_lang);	$lTUTOR_DETAILS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('557', $multi_lang);	$lOVERVIEW   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('558', $multi_lang);	$lBECOME_TUTOR   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('559', $multi_lang);	$lLEVELS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('560', $multi_lang);	$lMAKE_MONEY   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('561', $multi_lang);	$lMARKET_YOURSELF   	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('562', $multi_lang);	$lOVERVIEW_DESC   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('563', $multi_lang);	$lIT_FLEXIBLE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('564', $multi_lang);	$lSET_YOUR_RATE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('565', $multi_lang);	$lTECH_FROM_ANYWHERE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('566', $multi_lang);	$lIT_GIVES_YOU_EXPERIENCE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('567', $multi_lang);	$lINTERNATIONAL_EDU   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('568', $multi_lang);	$BUILD_YOUR_RESUME   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('569', $multi_lang);	$lIT_CUTTING_EDGE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('570', $multi_lang);	$lPRIVATE_1TO1   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('571', $multi_lang);	$lSOCIAL_NETWORKING_TOOLS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('572', $multi_lang);	$lLEARNING_WIDGETS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('573', $multi_lang);	$lIT_THE_COOLEST_PART   	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('574', $multi_lang);	$lBECOME_TUTOR_DESC   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('575', $multi_lang);	$lMEET_REQUIRE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('576', $multi_lang);	$lHIGH_SPEED_INTERNET   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('577', $multi_lang);	$lWEBCAM_MIC   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('578', $multi_lang);	$lTAKE_E_TRAINING   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('579', $multi_lang);	$lLEARN_CONVERSATION   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('580', $multi_lang);	$lLEARN_TO_USE_OUR_PLATFORM   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('581', $multi_lang);	$lENJOY_THETALKLIST   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('582', $multi_lang);	$lDEVELOP_GLOBAL_REACH   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('583', $multi_lang);	$lSTARTING_MAKING_MONEY   	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('584', $multi_lang);	$lLEVELS_DESC   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('585', $multi_lang);	$lLEVEL   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('586', $multi_lang);	$lFREE_PROFILE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('587', $multi_lang);	$lSELL_SESSIONS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('588', $multi_lang);	$lE_TRAINED   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('589', $multi_lang);	$lSELL_VIDEOS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('590', $multi_lang);	$lPREMIUM_RESULTS_PLACEMENT   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('591', $multi_lang);	$lFEE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('592', $multi_lang);	$lSTANDARD   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('593', $multi_lang);	$lFREE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('594', $multi_lang);	$lCERTIFIED   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('595', $multi_lang);	$lFEATURED   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('596', $multi_lang);	$l30_MO   	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('597', $multi_lang);	$lMAKE_MONEY_DESC   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('598', $multi_lang);	$lMAKE_MONEY_DESC1   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('599', $multi_lang);	$lSET_YOUR_RATE_AND   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('600', $multi_lang);	$lTUTOR_SESSION   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('601', $multi_lang);	$lAUTO_PAYMENT   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('602', $multi_lang);	$lCREATE_TEACHING_VIDEOS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('603', $multi_lang);	$lSTUDENT_DOWNLOAD   	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('604', $multi_lang);	$lMARKET_YOURSELF_DESC   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('605', $multi_lang);	$lBUILD_YOUR_PROFILE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('606', $multi_lang);	$lBRIGHT_FRONT   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('607', $multi_lang);	$lINTERESTING_BIOGRAPHY   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('608', $multi_lang);	$l15_SEC_VIDEO   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('609', $multi_lang);	$lBE_AVAILABLE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('610', $multi_lang);	$lOPEN_A_RECURRING   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('611', $multi_lang);	$lACCEPT_FREE_SESSIONS   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('612', $multi_lang);	$lENABLE_ON_DEMAND   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('613', $multi_lang);	$lSOCIALIZE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('614', $multi_lang);	$lUSE_LIVE_CHAT   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('616', $multi_lang);	$lUSE_BEEPBOX   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('615', $multi_lang);	$lENGAGE_IN_OUR_SOCIAL   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('663', $multi_lang);	$lSIGN_UP   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('722', $multi_lang);	$lgoldtutor  	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('723', $multi_lang);	$lsilvertutor  	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('724', $multi_lang);	$lbronzetutor  	= $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('726', $multi_lang);$school = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('816', $multi_lang);$affiliate = $arrVal[$multi_lang];


$arrVal 	= $this->lookup_model->getValue('1016', $multi_lang);	$selectuser   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1017', $multi_lang);	$enterfname   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1018', $multi_lang);	$emailTaken  	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1019', $multi_lang);	$enteremail   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1020', $multi_lang);	$entervalidemail   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1021', $multi_lang);	$enterpass   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1022', $multi_lang);	$sixmin   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1023', $multi_lang);	$confpass   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1024', $multi_lang);	$passmissmatch   	= $arrVal[$multi_lang];
?>
<script>
function tdemo()
{
alert('here');
document.getElementById("tst").src='<?php echo Base_url("vedio/JP_demo_vee_crop.mp4");?>';
}
</script>
<style>
.class_two
{
	border:1px solid red;
	border-radius: 10px;
}
</style>
<script>
$(function(){
	
	
	//$('input[placeholder]').placeholder();
});
function frmvalidate()
{

if( $('#roleId1').val() == '9')
{
	document.getElementById('rselect').className += ' class_two';	
	// document.getElementById("rselect").style.border="1px solid red";
	document.getElementById('rid1').style.display = 'block';
	return false;
}
else
{
	document.getElementById("rselect").style.border="none";
	document.getElementById('rid1').style.display = 'none';
	
}
if( $('#firstName1').val() == '')
{
	//document.getElementById("fnamered").style.border="1px solid red";
	document.getElementById('fnamered').className += ' class_two';
	document.getElementById('fname1').style.display = 'block';
	return false;
}
else
{
	document.getElementById("fnamered").style.border="none";
	document.getElementById('fname1').style.display = 'none';
	
}

if( $('#email1').val() == '')
{
	document.getElementById('ered').className += ' class_two';
	//document.getElementById("ered").style.border="1px solid red";
	document.getElementById('email_taken').style.display = 'none';
	document.getElementById('remail1').style.display = 'block';
	return false;
}
else
{
	document.getElementById("ered").style.border="none";
	document.getElementById('remail1').style.display = 'none';
	
}
var mail=($('#email1').val());
var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(! re.test(mail))
    {
	 document.getElementById('ered').className += ' class_two';	
	 //document.getElementById("ered").style.border="1px solid red";
	 document.getElementById('vremail1').style.display = 'block';
	 document.getElementById('email_taken').style.display = 'none';
	return false;
	
	}
	else
	{
		$.getJSON('<?php echo Base_url("user/ajax_check");?>',{id:'email',value:mail},function(msg){
			//alert(msg.success)
			//alert(msg.success)
			if(msg.success){
				 
				   document.getElementById("ered").style.border="none";
					document.getElementById('vremail1').style.display = 'none';
					document.getElementById('email_taken').style.display = 'none';
			}
			else 
			{
				document.getElementById('ered').className += ' class_two';	
				document.getElementById('vremail1').style.display = 'none';
				document.getElementById('email_taken').style.display = 'block';
				//$('#email1').val()='';
				//document.getElementById('email1').value = '';
				
				return false;
					
			}	
	
		//return true;
		
		});
		
	}
if( $('#password1').val() == '')
{
	document.getElementById('passred').className += ' class_two';
	//document.getElementById("passred").style.border="1px solid red";
	document.getElementById('pass1').style.display = 'block';
	return false;
}
else
{
	//document.getElementById("passred").style.border="none";
	document.getElementById('pass1').style.display = 'none';
	
}
var k=$('#password1').val().length;
if(k < 6)
{
	document.getElementById('passred').className += ' class_two';
	//document.getElementById("passred").style.border="1px solid red";
	document.getElementById('passlong').style.display = 'block';
	return false;

}

else
{
	document.getElementById('passlong').style.display = 'none';
}
if( $('#fake_confirm_password1').val() == '')
{
	document.getElementById('cpassred').className += ' class_two';
	//document.getElementById("cpassred").style.border="1px solid red";
	document.getElementById('cpassconf').style.display = 'block';
	return false;
}
else
{
	document.getElementById("cpassred").style.border="none";
	document.getElementById('cpassconf').style.display = 'none';
	
}
var a=$('#password1').val();
var b=$('#fake_confirm_password1').val();

if(a != b)
{
	document.getElementById('cpassred').className += ' class_two';
	//document.getElementById("cpassred").style.border="1px solid red";
	document.getElementById('cpassconf1').style.display = 'block';
	return false;
}
else
{
	document.getElementById("cpassred").style.border="none";
	document.getElementById('cpassconf1').style.display = 'none';
	
}
$('#registerForm1').submit();
 

		return true;
}
</script>

<!--SIGNUP FORM START -->
	<?php if(!$login):?>
    <div class="floating_form" id="signup_form_floating">
        <div class="signup_form" id="signup_form1">
            <div class="sf_padding">
	    		<div class="sf_txt"><?php echo $lsign_up;?></div>
	            <form style="display:block;" action="<?php echo Base_url('user/registerDo');?>" method="POST" id="registerForm1">
	            	<div class="sf_select" id="rselect">
		            	<span class="select_box_holder sel_width_215">
		                    <select id="roleId1" name="roleId" class="cu_dds">
		                        <option value="9"><?php echo $lIAMA;?></option><!--I am a...-->
		                        <option value="0"><?php echo $student;?></option><!--Student-->
		                        <option value="1"><?php echo $tutor;?></option><!--Tutor-->
								<option value="4"><?php echo $school;?></option>
								<option value="5"><?php echo $affiliate;?></option>
		                    </select>
		                </span>
						<span id="roleId_required" style="color:red;display:none;"><b><?php echo $selectuser; ?></b></span>
						<span style="color:red;display:none;font-size:14px;margin-top:40px;" id="rid1"><?php echo $selectuser; ?></span>
					</div>
		            <div class="sf_input" id="fnamered">
		            	<!--<input name="username" type="text" value="First Name" size="25" class="txtbox">-->
		            	<input id="firstName1" type="text" value="" name="firstName" placeholder="<?php echo $lFIRSTNAME;?>" size="25" class="txtbox" />
						<span id="firstName_required" style="color:red;display:none;"><b><?php echo $enterfname;?></b></span>
						<span style="color:red;display:none;font-size:14px;margin-top:10px;" id="fname1"><?php echo $enterfname;?></span>	

					</div>
		            <div class="sf_input" id="ered">
		            	<!--<input name="username" type="text" value="Email" size="25" class="txtbox">-->
		            	<input id="email1" type="text" value="" name="email" placeholder="<?php echo $lEMAIL;?>" size="25" class="txtbox"/>
            		<span id="email_required" style="color:red;display:none;"><b><?php echo $enteremail;?></b></span>
            		<span id="email_invalid" style="color:red;display:none;"><b><?php echo $entervalidemail;?></b></span>
					<span style="color:red;display:none;font-size:14px;margin-top:10px;" id="remail1"><?php echo $enteremail;?></span>
					<span style="color:red;display:none;font-size:14px;margin-top:10px;" id="vremail1"><?php echo $entervalidemail;?></span>	
					<span id="email_taken" style="color:red;display:none;font-size:14px;margin-top:10px;"><b><?php echo $emailTaken;?></b></span>
					</div>
		            <div class="sf_input sf_input_pass" id="passred">
	                  	<input autocomplete="off" type="text" value="" name="password" placeholder="<?php echo $lPASSWORD;?>" size="25" class="txtbox iposition fake_password"/>
		            	<!--<input name="username" type="text" value="Password" size="25" class="txtbox iposition fake_password">-->
		                <input autocomplete="off" id="password1" name="password" type="password" size="25" class="txtbox iposition password" style="display:none;">
						<span style="color:red;display:none;font-size:14px;margin-top:40px;" id="pass1"><?php echo $enterpass;?></span>
						<span style="color:red;display:none;font-size:14px;margin-top:40px;" id="passlong"><?php echo $sixmin;?></span>
				   </div>
		            <div class="sf_input sf_input_pass" id="cpassred">
						<input autocomplete="off" type="password" value="" name="cpassword" placeholder="<?php echo $lCPASSWORD;?>" size="25" class="txtbox iposition" id="fake_confirm_password1"/>
						<input autocomplete="off" name="cpassword" type="password" size="25" class="txtbox iposition" id="fake_confirm_password1" style="display:none;">
							
		            	
						<span style="color:red;display:none;font-size:14px;margin-top:40px;" id="cpassconf"><?php echo $confpass;?></span>
						<span style="color:red;display:none;font-size:14px;margin-top:40px;" id="cpassconf1"><?php echo $passmissmatch;?></span>
		            </div>
		            <!--<a class="signup_btn" id="registerButton" href="javascript:void(0)"><!--Sign Up--><?php //echo $lsign_up;?></a>-->
		            <input name="signup" onclick="return frmvalidate();" type="button" value="<?php echo $lsign_up;?>" class="signup_btn" id="registerButton1" >
				<input type="hidden" name="regPage"   value="ppc">
				<input type="hidden" name="regReturn" value="<?php echo Base_url();//echo Base_url('index/index');?>">

				
				</form>
                <a href="#" class="close_btn" id="close_btn"></a>
	        </div>
        </div>
        
    </div>
	<?php endif;?>
    <!--SIGNUP FORM END -->
    
    <!--PAGE TITLE START -->
    <div class="page_title wht-ttl">
    	<div class="wrapper"><h1><!--Tutor Details--><?php echo $lTUTOR_DETAILS?></h1></div>
    </div>
    <!--PAGE TITLE END -->
    
    <!--CONTENT START -->
    <div class="content">
    	<div class="wrapperinner tutor-pg">
        	<h2 id="overview"><!--Overview--><?php echo $lOVERVIEW;?></h2>
            <div class="image_right vid_btn">
	            <?php /*?><a href="#">
                	<img src="<?php echo Base_url("images/main/tutor_img.jpg");?>" alt="">
                    <img src="<?php echo Base_url("images/main/play_btn.png");?>" alt="" class="play" width="25" height="29">
                </a><?php */?>
				
              <a style="cursor:pointer;">  <video id="example_video_2" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="305" height="187" poster="<?php echo Base_url("images/main/tutor_img.jpg");?>" data-setup='{}'>
                     <source src="http://www.thetalklist.com/vedio/JP_demo_vee_crop.mp4" type='video/mp4' />
					
			  </video></a>
			  
			  

            </div>
            
            <p><!--Tutors on TheTalklist love to use their conversational and social networking skills in our dynamic new language tutoring platform. If you have a background in ESL, English, Education, Communications, or International Studies, you are an ideal 'Talkist' candidate. However these types of degrees are not required as other professional backgrounds also offer value to students.  So sign up!-->
            	<?php echo $lOVERVIEW_DESC;?>
            </p>
            
            <div class="steps_inner clearfix">
            
            	<div class="step step_1">
                	<div class="step_title"><!--It's Flexible--><?php echo  $lIT_FLEXIBLE;?></div>
                    <ul>
                    	<li><!--Set your rate/schedule--><?php echo $lSET_YOUR_RATE;?></li>
                    	<li><!--Teach from anywhere--><?php echo $lTECH_FROM_ANYWHERE;?></li>
                    </ul>
                </div>
                <div class="step step_2">
                	<div class="step_title"><!--It Gives You<br>Experience--><?php echo $lIT_GIVES_YOU_EXPERIENCE;?></div>
                    <ul>
                    	<li><!--International education--><?php echo $lINTERNATIONAL_EDU;?></li>
                        <li><!--Build your resume--><?php echo $BUILD_YOUR_RESUME;?></li>
                    </ul>
                </div>
                <div class="step step_3">
                	<div class="step_title"><!--It's Cutting Edge--><?php echo $lIT_CUTTING_EDGE;?></div>
                    <ul>
                    	<li><!--Private 1-to-1 Vee-session--><?php echo $lPRIVATE_1TO1;?></li>
                    	<li><!--Social networking tools--><?php echo $lSOCIAL_NETWORKING_TOOLS;?></li>
                    	<li><!--Learning widgets--><?php echo $lLEARNING_WIDGETS;?></li>
                    </ul>
                </div>
                
            </div>
            
            <p class="coolest_job"><!--It's the COOLEST part time job ever!--><?php echo $lIT_THE_COOLEST_PART;?></p>
            
            <h2 id="become_trust"><!--Become a Tutor--><?php echo $lBECOME_TUTOR;?></h2>
            
            <div class="image_left vid_btn">
	            <?php /*?><a href="#">
                	<img src="<?php echo Base_url("images/main/become_tutor.jpg");?>" alt="">
                    <img src="<?php echo Base_url("images/main/play_btn.png");?>" alt="" class="play" width="25" height="29">
                </a><?php */?>
                
				  <video id="example_video_2" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="305" height="170" poster="<?php echo Base_url("images/main/become_tutor.jpg");?>" data-setup='{}'>
                     <source src="<?php echo Base_url("vedio/Preparing_yourself_to_be_a_tutor.mp4");?>" type='video/mp4' />
				</video>
            </div>
			 
            <p><!--TheTalkList always has an open enrollment.  If you have the right interpersonal skills, then become a PEAK (Prepared, Enthusiastic, Articulate, Kind) tutor.   Register and take the optional e-Training  to improve your tutor standing.-->
            	<?php echo $lBECOME_TUTOR_DESC;?>
            </p>
            
            <div class="steps_inner clearfix" style="padding-top:0px;">
            
            	<div class="step step_1">
                	<div class="step_title"><!--Meet Requirements--><?php echo $lMEET_REQUIRE;?></div>
                    <ul>
                    	<li><!--High speed internet--><?php echo $lHIGH_SPEED_INTERNET;?></li>
                    	<li><!--Webcam/Mic--><?php echo $lWEBCAM_MIC?></li>
                    </ul>
                </div>
                <div class="step step_2">
                	<div class="step_title"><!--Take e-Training--><?php echo $lTAKE_E_TRAINING;?></div>
                    <ul>
                    	<li><!--Learn conversation tutoring--><?php echo $lLEARN_CONVERSATION;?></li>
                        <li><!--Learn to use our platform--><?php echo $lLEARN_TO_USE_OUR_PLATFORM;?></li>
                    </ul>
                </div>
                <div class="step step_3">
                	<div class="step_title"><!--Enjoy TheTalkList<br>Experience--><?php echo $lENJOY_THETALKLIST;?></div>
                    <ul>
                    	<li><!--Develop a global reach--><?php echo $lDEVELOP_GLOBAL_REACH;?></li>
                    	<li><!--Start making money--><?php echo $lSTARTING_MAKING_MONEY;?></li>
                    </ul>
                </div>
                
            </div>
            
            <h2 id="levels"><!--Levels--><?php echo $lLEVELS;?></h2>
            
            <p><!--Your free registration gets you a standard account.  Then you can upgrade your status by either taking our e-Learning test or paying for more features that improve your ability to earn income.-->
            	<?php echo $lLEVELS_DESC;?>
            </p>
            
            <div class="levels_table clearfix">
            	<div class="lt_row lt_row_header clearfix">
                	<div class="lt_col_1"><div class="lt_padding" style="padding-left:45px;"><!--Level--><?php echo $lLEVEL;?></div></div>
                	<div class="lt_col_2"><div class="lt_padding"><!--Free Profile--><?php echo $lFREE_PROFILE;?></div></div>
                	<div class="lt_col_3"><div class="lt_padding"><!--Sell <br>Sessions--><?php echo $lSELL_SESSIONS;?></div></div>
                	<div class="lt_col_4"><div class="lt_padding"><!--e-Trained--><?php echo $lE_TRAINED;?></div></div>
                	<div class="lt_col_5"><div class="lt_padding"><!--Sell Videos--><?php echo $lSELL_VIDEOS;?></div></div>
                	<div class="lt_col_6"><div class="lt_padding"><!--Premium Results Placement--><?php echo $lPREMIUM_RESULTS_PLACEMENT;?></div></div>
                	<div class="lt_col_7"><div class="lt_padding"><!--Fee--><?php echo $lFEE;?></div></div>
                </div>
                <div class="lt_row lt_row_margin clearfix">   
                	<div class="lt_col_1"><!--Standard--><?php echo $lbronzetutor;?></div>
                	<div class="lt_col_2"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_3"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_4">&nbsp;</div>
                	<div class="lt_col_5">&nbsp;</div>
                	<div class="lt_col_6">&nbsp;</div>
                	<div class="lt_col_7"><!--FREE--><?php echo $lFREE;?></div>
                </div>
                <div class="lt_row lt_row_margin clearfix">
                	<div class="lt_col_1"><!--Certified--><?php echo $lsilvertutor;?></div>
                	<div class="lt_col_2"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_3"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_4"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_5">&nbsp;</div>
                	<div class="lt_col_6">&nbsp;</div>
                	<div class="lt_col_7"><!--FREE--><?php echo $lFREE;?></div>
                </div>
                <div class="lt_row lt_row_margin clearfix">
                	<div class="lt_col_1"><!--Featured--><?php echo $lgoldtutor;?></div>
                	<div class="lt_col_2"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_3"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_4"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_5"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_6"><img src="<?php echo Base_url("images/main/chkbox.jpg");?>" alt=""></div>
                	<div class="lt_col_7"><!--$30/mo--><?php echo $l30_MO?></div>
                </div>
            </div>
            
            <h2 id="make_money"><!--Make Money--><?php echo $lMAKE_MONEY;?></h2>
            <p><!--As a tutor on TheTalkList, you are paid the rate you ask for.  We add our own administration fee on top of your rate.  Three days after each tutoring session, you are paid to your Paypal/Alipay account.    You become popular when you offer excellent service to students, get good ratings, and are visibly active on TheTalkList.-->
            	<?php echo $lMAKE_MONEY_DESC;?>
            </p>
            <p><!--Rose is a typical tutor on TheTalkList.  She is an education major in her junior year.  She earns $260/month by doing six  25min sessions per week with additional recurring revenue from 3 video lessons.-->
            	<em><?php echo $lMAKE_MONEY_DESC1;?></em>
            </p>
            
            <div class="make_money_table">
            	<div class="mmt_row">
                	<div class="mmt_1"><!--Set your rate and schedule--><?php echo $lSET_YOUR_RATE_AND;?></div>
                	<div class="mmt_2"><img src="<?php echo Base_url("images/main/icon_plus.png");?>" alt=""></div>
                	<div class="mmt_3"><!--Tutor a session--><?php echo $lTUTOR_SESSION;?></div>
                	<div class="mmt_4"><img src="<?php echo Base_url("images/main/icon_equals.jpg");?>" alt=""></div>
                	<div class="mmt_5"><!--Auto Payment--><?php echo $lAUTO_PAYMENT;?></div>
                </div>
            	<div class="mmt_row">
                	<div class="mmt_1"><!--Create teaching videos--><?php echo $lCREATE_TEACHING_VIDEOS;?></div>
                	<div class="mmt_2"><img src="<?php echo Base_url("images/main/icon_plus.png");?>" alt=""></div>
                	<div class="mmt_3"><!--Student download--><?php echo $lSTUDENT_DOWNLOAD;?></div>
                	<div class="mmt_4"><img src="<?php echo Base_url("images/main/icon_equals.jpg");?>" alt=""></div>
                	<div class="mmt_5"><!--Auto Payment--><?php echo $lAUTO_PAYMENT;?></div>
                </div>
            </div>
            
            <h2 id="market_yourself"><!--Market Yourself--><?php echo $lMARKET_YOURSELF;?></h2>
            <div class="image_right vid_btn">
	            <?php /*?><a href="#">
                	<img src="<?php echo Base_url("images/main/market_yourself.jpg");?>" alt="">
					</a><?php */?>	
				<!--<img src="<?php echo Base_url("images/main/play_btn.png");?>" alt="" class="play" width="25" height="29">-->
                
                 <video id="example_video_3" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="304" height="171" poster="<?php echo Base_url("images/main/market_yourself.jpg");?>" data-setup='{}'>
                     
					 <source src="<?php echo Base_url("vedio/market_yourself.mp4");?>" type='video/mp4' />
                </video>
                <img class="video-play-btn" src="<?php echo base_url('images/main/play-btn.png')?>" >
            </div>
			 
            <p><!--TheTalkList platform allows you a variety of ways to market yourself.  It starts with making a profile that's clear and compelling. Students from all over the world are looking for tutors to be available for their local timezones.  So having wider availability will make you more popular.  And since tutoring is a personal activity, feel free to show your personality within our e-Learning social network.-->
            	<?php echo $lMARKET_YOURSELF_DESC;?>
            </p>
            
            
            <div class="steps_inner clearfix">
            
            	<div class="step step_1">
                	<div class="step_title"><!--Build Your Profile--><?php echo $lBUILD_YOUR_PROFILE;?></div>
                    <ul>
                    	<li><!--Bright front-facing photo--><?php echo $lBRIGHT_FRONT;?></li>
                    	<li><!--Interesting biography--><?php echo $lINTERESTING_BIOGRAPHY;?></li>
                    	<li><!--15 second video greeting--><?php echo $l15_SEC_VIDEO?></li>
                    </ul>
                </div>
                <div class="step step_2">
                	<div class="step_title"><!--Be Available--><?php echo $lBE_AVAILABLE;?></div>
                    <ul>
                    	<li><!--Open a recurring cal--><?php echo $lOPEN_A_RECURRING;?></li>
                        <li><!--Accept free sessions--><?php echo $lACCEPT_FREE_SESSIONS;?></li>
                        <li><!--Enable 'On Demand' status--><?php echo $lENABLE_ON_DEMAND;?></li>
                    </ul>
                </div>
                <div class="step step_3">
                	<div class="step_title"><!--Socialize--><?php echo $lSOCIALIZE;?></div>
                    <ul>
                    	<li><!--Use Live Chat--><?php echo $lUSE_LIVE_CHAT;?></li>
                    	<li><!--Use BeepBox messaging--><?php echo $lUSE_BEEPBOX;?></li>
                    	<li><!--Engage in our social network pages--><?php echo $lENGAGE_IN_OUR_SOCIAL;?></li>
                    </ul>
                </div>
                
            </div>
            
            
        </div>
    </div>
	
    <!--CONTENT END -->
