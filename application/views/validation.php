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
$arrVal 	= $this->lookup_model->getValue('1016', $multi_lang);	$selectuser   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1017', $multi_lang);	$enterfname   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1018', $multi_lang);	$emailTaken  	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1019', $multi_lang);	$enteremail   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1020', $multi_lang);	$entervalidemail   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1021', $multi_lang);	$enterpass   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1022', $multi_lang);	$sixmin   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1023', $multi_lang);	$confpass   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1024', $multi_lang);	$passmissmatch   	= $arrVal[$multi_lang];
/* Added By Ilyas */
$arrVal = $this->lookup_model->getValue('1232', $multi_lang);$member = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1231', $multi_lang);	$lIM_MEMBER  	= $arrVal[$multi_lang];
/* End */
?>
<style>
.class_two
{
	border:1px solid red;
	border-radius: 10px;
}
</style>

<script>
function chngname(s)
{

}
function validatestu()
{
	if( $('#roleIdstu').val() == '9')
	{
		document.getElementById('rselect1').className += ' class_two';	
		document.getElementById('ridstu').style.display = 'block';
		return false;
	}
	else
	{
		document.getElementById("rselect1").style.border="none";
		document.getElementById('ridstu').style.display = 'none';
	}
	if( $('#firstNamestu').val() == '')
	{
		document.getElementById('redfname').className += ' class_two';	
		document.getElementById('fnamestu').style.display = 'block';
		return false;
	}
	else
	{
		document.getElementById("redfname").style.border="none";
		document.getElementById('fnamestu').style.display = 'none';
	}
	if( $('#emailstu').val() == '')
	{
		document.getElementById('redmail').className += ' class_two';		
		document.getElementById('remailstu').style.display = 'block';
		document.getElementById('email_takenstu').style.display = 'none';
		return false;
	}
	else
	{
		document.getElementById("redmail").style.border="none";
		document.getElementById('remailstu').style.display = 'none';
	}
	var mail=($('#emailstu').val());
	var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(! re.test(mail))
    {
		document.getElementById('email_takenstu').style.display = 'none';
		document.getElementById('redmail').className += ' class_two';		
		document.getElementById('vremailstu').style.display = 'block';
		return false;
	}
	else
	{
		$.getJSON('<?php echo Base_url("user/ajax_check");?>',{id:'email',value:mail},function(msg){
			if(msg.success){
					document.getElementById("redmail").style.border="none";
					document.getElementById('vremailstu').style.display = 'none';
					document.getElementById('email_takenstu').style.display = 'none';
					ChkPass();
			}
			else 
			{
				document.getElementById('redmail').className += ' class_two';	
				document.getElementById('vremailstu').style.display = 'none';
				document.getElementById('email_takenstu').style.display = 'block';
			}
			});
			return true;
	}
}

function ChkPass()
{
	if( $('#passwordstu').val() == '')
	{
		document.getElementById('rpass').className += ' class_two';	
		document.getElementById('passstu').style.display = 'block';
		return false;
	}
	else
	{
		document.getElementById('passstu').style.display = 'none';
	}
	var k=$('#passwordstu').val().length;
	if(k < 6)
	{
		document.getElementById('rpass').className += ' class_two';
		document.getElementById('stulong').style.display = 'block';
		return false;
	}
	else
	{
		document.getElementById('stulong').style.display = 'none';
	}
	if( $('#fake_confirm_passwordstu').val() == '')
	{
		document.getElementById('rcpass').className += ' class_two';	
		document.getElementById('cpassstu').style.display = 'block';
		return false;
	}
	else
	{
		document.getElementById("rcpass").style.border="none";	
		document.getElementById('cpassstu').style.display = 'none';
		
	}
	var a=$('#passwordstu').val();
	var b=$('#fake_confirm_passwordstu').val()
	if(a != b)
	{
		document.getElementById('rcpass').className += ' class_two';	
		document.getElementById('cpassstumis').style.display = 'block';
		return false;
	}
	else
	{
		document.getElementById("rcpass").style.border="none";	
		document.getElementById('cpassstumis').style.display = 'none';
	}
	$('#registerFormstu').submit();

}
</script>
<script type="text/javascript">
 
 
$(function(){
    $('input').keydown(function(e){
        if (e.keyCode == 13) {
			validatestu();
             
        }
    });
}); 
</script> 
<div class="signup-top sign-stdt" style="display:none;">
        <div class="signup_form" style=" display:block;">
            <div class="sf_padding">
	    		<div class="sf_txt"><?php echo $lsign_up;?>:</div>
	            <form style="display:block;" action="<?php echo Base_url('user/registerDo');?>" method="POST" id="registerFormstu">
	            	<div class="sf_select" id="rselect1">
		            	<span class="sel_width_215">
							<input type="hidden" name="roleId" id="roleIdstu" value='1'>		                    
		                </span>
						<span id="roleId_required" style="color:red;display:none;"><b><?php echo $selectuser; ?></b></span>
						<span style="color:red;display:none;font-size:17px;margin-top:40px;" id="ridstu"><?php echo $selectuser; ?></span>
					</div>
		            <div class="sf_input" id="redfname">
		            	<!--<input name="username" type="text" value="First Name" size="25" class="txtbox">-->
		            	<input id="firstNamestu" type="text" value="<?php echo $lFIRSTNAME;?>" name="firstName" placeholder="<?php echo $lFIRSTNAME;?>" size="25" class="txtbox" />
						<span id="firstName_required" style="color:red;display:none;"><b><?php echo $enterfname;?></b></span>
						<span style="color:red;display:none;font-size:17px;padding-top:10px;" id="fnamestu"><?php echo $enterfname;?></span>
						
					</div>
		            <div class="sf_input" id="redmail">
		            	<!--<input name="username" type="text" value="Email" size="25" class="txtbox">-->
		            	<input id="emailstu" type="text" value="<?php echo $lEMAIL;?>" name="email" placeholder="<?php echo $lEMAIL;?>" size="25" class="txtbox"/>
            		<span id="email_required" style="color:red;display:none;padding-top:10px;"><b><?php echo $enteremail;?></b></span>
            		<span id="email_invalid" style="color:red;display:none;padding-top:10px;"><b><?php echo $entervalidemail;?></b></span>
					<span id="email_takenstu" style="color:red;display:none;font-size:14px;margin-top:10px;"><b><?php echo $emailTaken;?></b></span>
					<span style="color:red;display:none;font-size:17px;margin-top:14px;" id="remailstu"><?php echo $enteremail;?></span>
					<span style="color:red;display:none;font-size:17px;margin-top:14px;" id="vremailstu"><?php echo $entervalidemail;?></span>	
					</div>
		            <div class="sf_input sf_input_pass" id="rpass">
	                  	<input autocomplete="off" type="text" value="<?php echo $lPASSWORD;?>" name="password" placeholder="<?php echo $lPASSWORD;?>" size="25" class="txtbox iposition fake_password"/>
		            	<!--<input name="username" type="text" value="Password" size="25" class="txtbox iposition fake_password">-->
		                <input autocomplete="off" id="passwordstu" name="password" type="password" size="25" class="txtbox iposition password" style="display:none;">
						<span style="color:red;display:none;font-size:17px;margin-top:42px;" id="passstu"><?php echo $enterpass;?></span>
						<span style="color:red;display:none;font-size:17px;margin-top:40px;" id="stulong"><?php echo $sixmin;?></span>
		            </div>
		            <div class="sf_input sf_input_pass" id="rcpass">
		            	
							<input autocomplete="off" type="password" value="" name="cpassword" placeholder="<?php echo $lCPASSWORD;?>" size="25" class="txtbox iposition" id="fake_confirm_passwordstu"/>
							<input autocomplete="off" name="cpassword" type="password" size="25" class="txtbox iposition" id="fake_confirm_passwordstu" style="display:none;">
		            	
						<span style="color:red;display:none;font-size:17px;margin-top:42px;" id="cpassstu"><?php echo $confpass;?></span>
						<span style="color:red;display:none;font-size:17px;margin-top:32px;" id="cpassstumis"><?php echo $passmissmatch;?></span>
		            </div>
		            <!--<a class="signup_btn" id="registerButton" href="javascript:void(0)"><!--Sign Up--><?php //echo $lsign_up;?></a>-->
		            <input name="signup" type="button"  onclick="return validatestu();" value="<?php echo $lsign_up;?>" class="signup_btn" id="registerButton" >
				<input type="hidden" name="regPage"   value="ppc">
				<input type="hidden" name="regReturn" value="<?php echo Base_url();?>">
				</form>
                <a href="#" class="close_btn" id="close_btn"></a>
	        </div>
        </div>
    </div>
