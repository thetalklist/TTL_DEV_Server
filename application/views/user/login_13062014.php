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
$arrVal = $this->lookup_model->getValue('5', $multi_lang);
$vlogin = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('6', $multi_lang);
$forget_password = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('371', $multi_lang);
$vregister = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('20', $multi_lang);
$vpassword = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('35', $multi_lang);
$vemail = $arrVal[$multi_lang];
?>
<?php $this->layout->appendFile('css',"css/contact.css");?>
<div class="contact_us">
	<div class="contact_us_top"><?php echo $vlogin; ?></div>
	<div class="contact_us_mid">
		<p style="color:Red"><?php if(isset($error)) print_R($error);?></p>
		<form method="post" action="">
		<!-- remove username and add email address BY TECHNO-SANJAY -->
		<!--<p>Username:<input type="text" name="username" value="" id="username" /></p>-->
		<p><?php echo $vemail; ?>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" value="" id="email" /></p>
		<p><?php echo $vpassword; ?>:<input type="password" name="password" value="" id="password" /></p>

		<p>
		<input class="login-btn" type="submit" value="<?php echo $vlogin; ?>" name="submit" />
		
		<input class="reg-btn" type="button" value="<?php echo $vregister; ?>" name="register" onclick="document.location.href='<?php echo base_url('user/register');?>'"/>
		<br/>
		<p>OR</p>
		

<?php  if($multi_lang != 'ch'){?>
<a href="javascript:void(0);" class="reg-btn fb_connect" style="background:url('<?php echo base_url('images/main/fb_connect.png');?>');height: 47px;width: 170px;float:left;margin-left:100px;"></a>
<?php } else { ?>
<?php include_once("weibo/index.php");?>
<?php } ?>
	
		
		
		
		
		
		
        </p><br>
        <p class="fget"><a  href="forget"><?php echo $forget_password; ?></a></p>
		</form>
		
	</div>
</div>
