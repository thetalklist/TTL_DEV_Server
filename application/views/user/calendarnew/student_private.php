<?php

//echo "test";
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

$arrVal = $this->lookup_model->getValue('65', $multi_lang);
$lcalender = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('66', $multi_lang);
$lschsession = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('67', $multi_lang);
$ltestVeeSession = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('69', $multi_lang);
$lschsessionat = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('180', $multi_lang);
$ljoin_vee_session = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('68', $multi_lang);
$lsetupalerts = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('70', $multi_lang);
$l15min = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('71', $multi_lang);
$l30min = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('72', $multi_lang);
$l60min = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('73', $multi_lang);
$lset = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('35', $multi_lang);
$lemail	= $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('61', $multi_lang);
$ltext	= $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('328', $multi_lang);
$vtext = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('329', $multi_lang);
$clickupgradetext = $arrVal[$multi_lang];
//--R&D@Oct-31-2013 : Set Language Variables
$arrVal 	= $this->lookup_model->getValue('421', $multi_lang);	$lLOCAL_TIMEZONE   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('422', $multi_lang);	$lRECURRING_SESSION   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('423', $multi_lang);	$lSESSIONS   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('424', $multi_lang);	$lBOOKING   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('425', $multi_lang);	$lCREATE_SLOT   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('426', $multi_lang);	$lMY_SESSIONS   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('427', $multi_lang);	$lTIME_SLOT   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('428', $multi_lang);	$lMINUTES   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('429', $multi_lang);	$lSUBMIT   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('430', $multi_lang);	$lENDED   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('431', $multi_lang);	$lBREAK   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('432', $multi_lang);	$lLOCKED   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('433', $multi_lang);	$lSHARE_MAP_TIP   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('457', $multi_lang);	$lCALENDER   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('458', $multi_lang);	$lOPEN   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('459', $multi_lang);	$lCLICK_TO_OPEN   		= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('461', $multi_lang);	$lSPEAKING_LEVEl_TIP   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('462', $multi_lang);	$lSLEAKING_LEVEL   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('463', $multi_lang);	$lENTER_TOPIC   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('464', $multi_lang);	$lBEGINNER   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('465', $multi_lang);	$lINTERMEDIATE   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('466', $multi_lang);	$lADVANCED   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('467', $multi_lang);	$lBOOK_NOW   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('468', $multi_lang);	$lOPENED   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('469', $multi_lang);	$lBOOKED   				= $arrVal[$multi_lang];


$arrVal 	= $this->lookup_model->getValue('470', $multi_lang);	$lEMAIL   				= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('471', $multi_lang);	$lPASSWORD   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('472', $multi_lang);	$lFIRSTNAME   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('473', $multi_lang);	$lIM_STUDENT   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('474', $multi_lang);	$lIM_TUTOR   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('475', $multi_lang);	$lCANCEL_CLASS   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('476', $multi_lang);	$lSCHEDULED_SESSION_AT  = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('477', $multi_lang);	$lSELECT_ON_TYPE   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('478', $multi_lang);	$lDELETE_SESSION_MSG   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('479', $multi_lang);	$lDELETE_SUCCESS   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('480', $multi_lang);	$lLOCKED_TIP   			= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('481', $multi_lang);	$lHAVE_CHROME_QUE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('482', $multi_lang);	$lOK   					= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('483', $multi_lang);	$lYES   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('484', $multi_lang);	$lNO   					= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('485', $multi_lang);	$lADD_SUCCESS   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('486', $multi_lang);	$lEND_TIME_ALERT   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('487', $multi_lang);	$lINVALID_END_DATE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('488', $multi_lang);	$lINVALID_START_DATE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('489', $multi_lang);	$lIE_WARNING   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('490', $multi_lang);	$lDW_CHROME   			= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('491', $multi_lang);	$lLOGIN_CHROME   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('492', $multi_lang);	$lBOOKED_SUCCESS   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('493', $multi_lang);	$lYOUR_TOTAL_CHARGE   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('494', $multi_lang);	$lOK_TO_CONFIRM   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('495', $multi_lang);	$lBOOKING_SUMMARY   	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('496', $multi_lang);	$lREADY_TALK_OP   		= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('497', $multi_lang);	$lINSUFFICIENT_CREDITS  = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('498', $multi_lang);	$lPLEASE   				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('499', $multi_lang);	$lRECHARGE   			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('500', $multi_lang);	$lACCOUNT   			= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('501', $multi_lang);	$lNO_SESSION_SELECTED   = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('502', $multi_lang);	$lQUARANTINE		    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('503', $multi_lang);	$lSELECT_PAYPAL_POPUP	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('504', $multi_lang);	$lSESSION_RECURRENCE	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('505', $multi_lang);	$lLOADING				= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('506', $multi_lang);	$lSESSION_TIME			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('507', $multi_lang);	$lSTART			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('508', $multi_lang);	$lEND			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('509', $multi_lang);	$lRECURRENCE_PATTERN			= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('522', $multi_lang);	$thetimeshowntooltip = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('783', $multi_lang);	$lunothave	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('797', $multi_lang);	$clicktoconfirm	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('798', $multi_lang);	$open	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('799', $multi_lang);	$close	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('812', $multi_lang);	$iesupport	    = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('914', $multi_lang);	$tutorsetupcal	    = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('947', $multi_lang);	$clickday	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('948', $multi_lang);	$bookorrequest	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('949', $multi_lang);	$clickreccur	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('950', $multi_lang);	$threeway	    = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('974', $multi_lang);    $morning            = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('975', $multi_lang);    $afternoon          = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('976', $multi_lang);    $night              = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('978', $multi_lang);    $sun                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('979', $multi_lang);    $mon                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('980', $multi_lang);    $tue                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('981', $multi_lang);    $wed                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('982', $multi_lang);    $thu                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('983', $multi_lang);    $fri                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('984', $multi_lang);    $sat                = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('986', $multi_lang);    $closed             = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('799', $multi_lang);    $close              = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('458', $multi_lang);    $open               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('468', $multi_lang);    $opened             = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('469', $multi_lang);    $booked             = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('987', $multi_lang);    $book               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('804', $multi_lang);    $request               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('985', $multi_lang);    $requested               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('988', $multi_lang);    $confirm               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('989', $multi_lang);    $selecttopic               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('990', $multi_lang);    $bookslot               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1004', $multi_lang);    $confirmsession               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('993', $multi_lang);    $bookopentimeslotsadvance   = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1002', $multi_lang);    $selecttopictext   = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('992', $multi_lang);    $tutoravailable     = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('993', $multi_lang);    $bookopentimeslotsadvance   = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1003', $multi_lang);    $requestslot               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('998', $multi_lang);    $freesession               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('997', $multi_lang);    $successrequest               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('996', $multi_lang);    $successbooking               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1001', $multi_lang);    $nopermission               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1000', $multi_lang);    $firstlogin               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('999', $multi_lang);    $enoughmoney               = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1092', $multi_lang);    $MyBooking               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1093', $multi_lang);    $NowRealTime               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1094', $multi_lang);    $OpenClick               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1095', $multi_lang);    $ReccurSet               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1096', $multi_lang);    $RealTimeBooking               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1097', $multi_lang);    $opens               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1098', $multi_lang);    $AvailableSlot               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1099', $multi_lang);    $MonthCal               = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('434', $multi_lang);    $Nows              = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1129', $multi_lang);    $JoinS              = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('412', $multi_lang);    $CancelS              = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1152', $multi_lang);    $Availibility              = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1156', $multi_lang);    $BeAvail              = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1157', $multi_lang);    $ReciveSms             = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1141', $multi_lang);    $Ors             = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1158', $multi_lang);    $ClickOpen            = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1142', $multi_lang);    $StepThree            = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1164', $multi_lang);    $PleaseEnter         = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1165', $multi_lang);    $ItLookLike         = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1182', $multi_lang);    $MyConfirmBooking         = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1183', $multi_lang);    $ClickToslot         = $arrVal[$multi_lang];
$languageArray = array(
        "morning"=>$morning,"afternoon"=>$afternoon,'night'=>$night,
        'sun'=>$sun,'mon'=>$mon,'tue'=>$tue,'wed'=>$wed,'thu'=>$thu,'fri'=>$fri,'sat'=>$sat,
        'closed'=>$closed,'open'=>$open,'opened'=>$opened,
        'book'=>$book,'booked'=>$booked,'request'=>$request,'requested'=>$requested,'confirm'=>$confirm,
        'selecttopic'=>$selecttopic,'bookslot'=>$bookslot,'confirmsession'=>$confirmsession,'selecttopictext'=>$selecttopictext,'requestslot'=>$requestslot,
        'bookopentimeslotsadvance'=>$bookopentimeslotsadvance,'requestslot'=>$requestslot,'freesession'=>$freesession,'successrequest'=>$successrequest,
        'successbooking'=>$successbooking,'nopermission'=>$nopermission,'firstlogin'=>$firstlogin,'enoughmoney'=>$enoughmoney
        );
//echo $morning;
//--R&D@Oct-31-2013 : Set Language Variables
$arrVal 	= $this->lookup_model->getValue('1119', $multi_lang);	$NoSesssion 	= $arrVal[$multi_lang];
?>
<?php $this->layout->appendFile('javascript',"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js");?>
<?php $this->layout->appendFile('javascript',"js/mycalendar/mycalendar.js");?>
<?php $this->layout->appendFile('javascript',"js/jquery-jtemplates.js");?>
<?php $this->layout->appendFile('javascript',"js/calendar.js?");?>
<?php $this->layout->appendFile('javascript',"js/jquery.blockUI.js"); ?>
<?php $this->layout->appendFile('javascript',"js/jquery.poshytip.min.js");?>
<?php $this->layout->appendFile('css',"css/cupertino/theme.css");?>
<?php $this->layout->appendFile('css',"css/mycalendar/mycalendar.css");?>
<link rel="stylesheet" href="<?php echo base_url();?>css/popup-css.css">
<?php 
if($uri =='') 
{
?>
<script language="Javascript" type="text/javascript">
    $(document).ready(function() {
        var base_url = '<?php echo base_url();?>';
        var languageArray = '<?php echo json_encode($languageArray); ?>';
        var uid = '<?php echo $this->session->userdata['uid']; ?>';
        var coded = Project.modules.customcalendar.mycalendersetting('technocalendar','',base_url,'tutor',0,languageArray,1,uid);
        });
</script>

<script>
$(window).load(function() {
var x='<?php echo $this->session->userdata('firstTimeRegister'); ?>'; 
var a="<?php echo $_GET["step"];?>";
var rollId='<?php echo $this->session->userdata('roleId'); ?>'; 
	if(a ==2 && rollId >=1 && rollId <=3 && x!='')
	{
		
		window.scrollTo(0,550);			
		$('#firstTour').dialog({
					modal:true,
					width:'730px'
			});
			
$('.ui-dialog').wrap('<div class="main_popupdiv2"></span>' );
	}
	
	window.setInterval(function(){
  ChkNowSessionTutor1();
}, 1000);
});

function  ChkNowSessionTutor1()
{
	 
	 
	$.ajax({
		type:'POST',
		url:'<?php echo base_url('user/checkNext/');?>',
		success:function(msg){
			if (String == msg.constructor) {
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			//alert(json.success);
			if(json.success==true){	
			
				location.reload();
			}
			else{
				 
			}
		}
	});
  
}
</script>
<style>
.ui-widget-content{/*border: 4px solid #0087d0;    border-radius: 0 !important;*/ background:#fff; padding:15px;}
.ui-widget-header{ background:none; border:0 none !important;}
.ui-widget-header{ float:right;}
.three-why, .cl-new-why, .fc-header-left, .fulldiv, #sloat_ {z-index:999999 !important; position:relative;}
</style>
<div id="customcalendar"></div>
<?php 
}
?>
<?php 
// checks for quarantine users
if($profile['quarantine'] == 1){?>
	<script>
		alert("<?php echo $lQUARANTINE;?>");
		//return false;
	</script>
	<style>
		
		.mod .bd{display:none;}
		
	</style>
	
	
<?php } ?>

<script>
	$(document).ready(function(){
	$("span.ToolCal").hover(function () {
	<?php // $markup= "Tutor rate is"; ?>
		$(this).append('<div class="TipCal"><p><?php echo $NowRealTime ."<br>".$OpenClick ."<br>". $ReccurSet ;?></p></div>');
	}, function () {
		$("div.TipCal").remove();
	});
	});
	</script>
 <div class="baseBox baseBoxBg clearfix">
    	
        <div class="content_main fr">
        	<div class="main_inner">
                <?php /*<ul class="student_prof">
                    <?php echo profile_menu('s_private','c_prof',$profile['uid']);?>
                </ul>*/?>
                <!--/student_prof-->
                <div id="teacher_prof_Wp" class="cld-txt">
                	<?php if($uri ==''){?>
		            <div class="mod">
		            <div class="hd">
                            <div class="pro_tle tle"><h3 style="margin-top:0px;"><span class="ltimez12" style="width:345px;"><?php echo $MyConfirmBooking;?></span><div style="padding-top:0px;float: left;"> </div> </h3></div>
						<ul class="ratings_list2">
								<a class="aqua_btn norBtn redRadiusBtn2 w140 f12 vess-btn" href="<?php echo base_url('testveesession/testVeeSession');?>"><?php echo $ltestVeeSession;?></a>
							</ul>
						<p class="previewbutton"><?php echo $vtext;?><a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHMA&utm_campaign=en&utm_source=en-IN-ha-bk&utm_medium=ha&utm_term=%2Bchrome" target="_blank" >Chrome</a> and <a href="http://www.mozilla.org/en-US/firefox/new/" target="_blank" >Firefox. <?php echo $clickupgradetext;?></a> <?php echo $iesupport; ?></p>
						<ul class="ratings_list">
							 <?php if($classes==array()){?>
							 <p style="padding-top:100px;text-align:center;font-size:17px;color:#FF0000"><?php echo $lunothave; ?></p>
							 <?php }?>
							
                                <?php foreach($classes as $k=>$class):?>
								<li>
									<div class="header_pic_L fl">
										<div class="header_pic">
											<!--<a href="<?php echo Base_url("user/profile/uid/".$class['sid']);?>"><img src="<?php echo $class['pic']?Base_url('/uploads/images/thumb/'.$class['pic']):Base_url('images/header.jpg');?>" width="78" height="80" /></a> -->
											<img src="<?php echo $class['pic']?Base_url('/uploads/images/thumb/'.$class['pic']):Base_url('images/header.jpg');?>" width="78" height="80" />
										</div>
									</div>
									<div class="rating_ct">
										<!--<div class="agnR c939393"><a href="javascript:void(0)" theClassId='<?php echo $class['id'];?>' class="delClass"><em class="ico_op ico_del2"></em><?php// echo $lCANCEL_CLASS;?></a></div>-->
										<div class="classes_info clearfix f12 fb">
											<span class="fl">
												<?php 
												if($this->session->userdata('uid')==$class['tid'])
												{
													echo "Your Student: ".$class['firstName']; ?> <br> <br><?php echo  hiaOutTime($class['startTime']) ;
												}
												else
												{
													$tutorDetails = $this->user_model->getnameByUid($class['tid']);
													echo "Your Tutor: ".$tutorDetails['firstName'] ?> <br> <br><?php echo  hiaOutTime($class['startTime']) ;
												}?>
											</span>
											<span class="c06a0c1">&nbsp;&nbsp;</span>
											
											
											
											<span class="c06a0c1" id="join-vee-session">
											
											<?php 
											$Timer= strtotime($class['startTime']) -  now();
											if($class['Intent'] == 1){?>	
											
											<a class="red-btn enable-join btn-block" id="class_e_<?php echo $class['id']; ?>"  href="<?php echo base_url('classroom/index/cid/'.$class['id']);?>"><?php echo $ljoin_vee_session;?></a>
											<?php } else if($class['Intent'] == 2){?>
											
											<?php }
											else { ?>
											
												<?php if($class['locked'] == 1){ ?>
												<a class="grey-btn disable-join btn-block" id="class_d_<?php echo $class['id']; ?>"  href="javascript:void(0);"><span class="lockedtip" id="class_t_<?php echo $class['id']; ?>" ><?php echo $lLOCKED;?></span></a>
												<?php 
												if($Timer >= 1){
												//if($Timer > 43200){?>
												<a class="blu-btn btn-block" id="class_d_<?php echo $class['id']; ?>"  href="javascript:void(0);"><span style="color:white" theClassId='<?php echo $class['id'];?>' class="delClass" id="class_t_<?php echo $class['id']; ?>" ><?php echo $CancelS;?></span></a>
												<?php } ?>
												<?php } else { ?>
												<a class="grey-btn disable-join btn-block" id="class_d_<?php echo $class['id']; ?>" style="display:none;"  href="javascript:void(0);"><span class="lockedtip" id="class_t_<?php echo $class['id']; ?>" style="display:none;"><?php echo $lLOCKED;?></span></a>
												<?php  
												//echo $Timer."-".$class['id'];
												if($Timer < 900 && $Timer > -165) 
												{
												
												?>
												<a class="red-btn enable-join btn-block" id="class_e_<?php echo $class['id']; ?>"  href="<?php echo base_url('classroom/index/cid/'.$class['id']);?>"><?php echo $ljoin_vee_session;?></a>
												<?php } else{?>
												<span class="Disjoin btn-block"><a class="grey-btn disable-join" id="class_e_<?php echo $class['id']; ?>"><?php echo $JoinS;?></a></span>
												<?php }
												if($Timer >= 1){
													//if($Timer > 43200){?>
														<a class="blu-btn btn-block" id="class_d_<?php echo $class['id']; ?>"  href="javascript:void(0);"><span theClassId='<?php echo $class['id'];?>' style="color:white" class="delClass" id="class_t_<?php echo $class['id']; ?>" ><?php echo $CancelS;?></span></a>
													<?php } ?>
												<?php } ?>
												
												<?php }?>
												
											</span>
											
											
										</div>
									</div>
								</li>
								<?php endforeach;?>
                        	</ul>
							<br>
                        </div>

					 </div>
					 <?php }?>
					<!--<div class="mod">
                        <div class="hd">
                            <div class="pro_tle tle"><h3>Create Availability Time Slots</h3></div>
                        </div>
                        <div class="bd">
                          <div class="createSchedule createSchedule_teacher">
                               <form action="" method="">
                                    <div class="label_row f12"> 
                                        <label class="blk_label w80">Start Time:</label>
										<input type="text" class="raduisSelect w105" placeholder="Date like:08/22/2012" id="startDay">
										<input type="text" class="raduisSelect w105" placeholder="Time like:16:00"  id="startTime">
                                        <label class="blk_label w80">End Time:</label>
										
										<input type="text" class="raduisSelect w105" placeholder="Date like:08/22/2012" id="endDay">
										<input type="text" class="raduisSelect w105" placeholder="Time like:16:00" id="endTime">
                                        
                                        <a href="javascript:void(0)" class="norBtn blackRadiusBtn w55" id="addSlotTime">Add</a>
                                    </div>
                                    
                                    <div class="agnR"><a href="#">+ Add More</a></div>
                                    
                               </form>
                          </div>
                        </div>
                    </div>--><!--/mod-->
                    <?php if($uri !=''){?>
                    <div class="mod">
                        <div class="hd">
                            <div class="content tle"><h2><?php echo $lschsession;?></h2></div>
                        </div>
						
						<!--R&D@Sept-20-2013 : IE popup message -->
                        <div id="messageIe" style="display:none;">
							<div class="pro_tle tle">
							<p id="ieMainMessage">
							<h4><span id="ieMessageText"><p><?php echo $lHAVE_CHROME_QUE;?></p></span></h4>
							
							<p id ="ieCloseOption" style="display:none;"><a style="color:white;" class="blu-btn" href="javascript:void(0);" id="ieCloseOptionLink"><?php echo $lOK;?></a></p>
							
							
							<p id ="ieMainOption">
								<a style="color:white;" class="blu-btn" href="javascript:void(0);" id="browserChromeYes"><?php echo $lYES;?></a>
								<a style="color:white;" class="blu-btn" href="javascript:void(0);" id="browserChromeNo"><?php echo $lNO;?></a>
							</p>
							
							</p>
	
							<p id="ieSubMessage" style="display:none;">
							<a style="color:white;" class="blu-btn" href="javascript:void(0);"  id="browserChromeDownloadYes"><?php echo $lYES;?></a>
							<a style="color:white;" class="blu-btn" href="javascript:void(0);"  id="browserChromeDownloadNo"><?php echo $lNO;?></a>
							</p>
							
							</div>
                        </div>
						<!--R&D@Sept-20-2013 : IE popup message -->
						
						
						<!--R&D@Oct-70-2013 : Paypal Popup message -->
						<div id="messagePayPal" style="display:none;">
							<div class="pro_tle tle">
							<p id="payPalMainMessage">
							<h4><span id="paypalMessageText"><p><?php echo $lSELECT_PAYPAL_POPUP;?></p></span></h4>
							<a style="color:white;" class="blu-btn" href="javascript:void(0);"  id="ppLink"><?php echo $lOK;?></a>
							</p>
							</div>
						</div>
						<!--R&D@Oct-70-2013 : Paypal Popup message -->

                        <div class="bd">							
							<ul class="ratings_list2">
								<a class="aqua_btn norBtn redRadiusBtn2 w140 f12 vess-btn" href="<?php echo base_url('testveesession/testVeeSession');?>"><?php echo $ltestVeeSession;?></a>
							</ul>
							<p class="previewbutton"><?php echo $vtext;?><a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHMA&utm_campaign=en&utm_source=en-IN-ha-bk&utm_medium=ha&utm_term=%2Bchrome" target="_blank" >Chrome</a> and <a href="http://www.mozilla.org/en-US/firefox/new/" target="_blank" >Firefox. <?php echo $clickupgradetext;?></a> <?php echo $iesupport; ?></p>
							
                        	<ul class="ratings_list">
							 <?php if($classes==array()){?>
							 <p style="padding-top:100px;text-align:center;font-size:17px;color:#FF0000"><?php echo $lunothave; ?></p>
							 <?php }?>
							
                                <?php foreach($classes as $k=>$class):?>
								<li>
									<div class="header_pic_L fl">
										<div class="header_pic">
											<!--<a href="<?php echo Base_url("user/profile/uid/".$class['sid']);?>"><img src="<?php echo $class['pic']?Base_url('/uploads/images/thumb/'.$class['pic']):Base_url('images/header.jpg');?>" width="78" height="80" /></a> -->
											<img src="<?php echo $class['pic']?Base_url('/uploads/images/thumb/'.$class['pic']):Base_url('images/header.jpg');?>" width="78" height="80" />
										</div>
									</div>
									<div class="rating_ct">
										<!--<div class="agnR c939393"><a href="javascript:void(0)" theClassId='<?php echo $class['id'];?>' class="delClass"><em class="ico_op ico_del2"></em><?php echo $lCANCEL_CLASS;?></a></div>-->
										<div class="classes_info clearfix f12 fb">
											<span class="fl">
												<?php 
												if($this->session->userdata('uid')==$class['tid'])
												{
													echo "Your Student: ".$class['firstName']; ?> <br> <br><?php echo  hiaOutTime($class['startTime']) ;
												}
												else
												{
													$tutorDetails = $this->user_model->getnameByUid($class['tid']);
													echo "Your Tutor: ".$tutorDetails['firstName'] ?> <br> <br><?php echo  hiaOutTime($class['startTime']) ;
												}?>
											</span>
											<span class="c06a0c1">&nbsp;&nbsp;</span>
											<span class="c06a0c1" id="join-vee-session">
											
											<?php $Timer= strtotime($class['startTime']) -  now();
											if($class['Intent'] == 1){?>	
											<a class="red-btn enable-join btn-block" id="class_e_<?php echo $class['id']; ?>"  href="<?php echo base_url('classroom/index/cid/'.$class['id']);?>"><?php echo $ljoin_vee_session;?></a>
											<?php } else if($class['Intent'] == 2){?>
											
											<?php }
											else { ?>
											
											
												<?php if($class['locked'] == 1){ ?>
												<a class="grey-btn disable-join btn-block" id="class_d_<?php echo $class['id']; ?>"  href="javascript:void(0);"><span class="lockedtip" id="class_t_<?php echo $class['id']; ?>" ><?php echo $lLOCKED;?></span></a>
												<?php
												if($Timer >= 1){
												//if($Timer > 43200){ ?>
													<a class="blu-btn btn-block" id="class_d_<?php echo $class['id']; ?>"  href="javascript:void(0);"><span  theClassId='<?php echo $class['id'];?>' class="delClass" style="color:white" id="class_t_<?php echo $class['id']; ?>" ><?php echo $CancelS;?></span></a>
												<?php } ?>
												<?php } else { ?>
												<a class="grey-btn disable-join btn-block" id="class_d_<?php echo $class['id']; ?>" style="display:none;"  href="javascript:void(0);"><span class="lockedtip" id="class_t_<?php echo $class['id']; ?>" style="display:none;"><?php echo $lLOCKED;?></span></a>
												<?php  
												
												if($Timer < 900 && $Timer > -165) 
												{
												?>
												<a class="red-btn enable-join btn-block" id="class_e_<?php echo $class['id']; ?>"  href="<?php echo base_url('classroom/index/cid/'.$class['id']);?>"><?php echo $ljoin_vee_session;?></a>
												<?php } else{?>
												<span class="Disjoin btn-block"><a class="grey-btn disable-join" id="class_e_<?php echo $class['id']; ?>"  ><?php echo $JoinS;?></a></span>
												<?php }
												if($Timer >= 1){ 
													//if($Timer > 43200){ ?>											
														<a class="blu-btn btn-block" id="class_d_<?php echo $class['id']; ?>"  href="javascript:void(0);"><span theClassId='<?php echo $class['id'];?>' style="color:white" class="delClass" id="class_t_<?php echo $class['id']; ?>" ><?php echo $CancelS;?></span></a>
													<?php } ?>
												<?php } ?>
												
												<?php }?>
												
											</span>
											
										</div>
									</div>
								</li>
								<?php endforeach;?>
                        	</ul>
                            
							<!--
                            <div class="set_up_alerts fr">
								<div class="alters_tle">Set up Alerts</div>
								<div class="addBtn_Wp">
									<select class="raduisSelect w160 noMg fb alMin">
										<option value="15" <?php if($profile['alerts'] == '15') {echo "selected";}?> >15 Minutes prior</option>
										<option value="30" <?php if($profile['alerts'] == '30') {echo "selected";}?> >30 Minutes prior</option>
										<option value="60" <?php if($profile['alerts'] == '60') {echo "selected";}?> >60 Minutes prior</option>
									</select>
									<a class="norBtn blackRadiusBtn w55 setAlert" href="javascript:;">Set</a>
								</div>
								<?php
									$sendType1 = $profile['alertType'][0];
									$sendType2 = $profile['alertType'][1];
								?>
								<input type="checkbox" name="send_type" <?php if($sendType1==1) {echo 'checked';}?> class="vAgn_m"  value="1"/> Email
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="send_type" <?php if($sendType2==1) {echo 'checked';}?> class="vAgn_m"  value="2"/> Text
							</div>
							-->
                        	
                            <div class="spc10c"></div>
                        </div>
						
                    </div><!--/mod-->                    
					
					<?php }?>
                </div>
                <!--/student_prof_Wp-->
            </div>
        </div>
        <!--/content_main-->
		<?php include dirname(__FILE__).'/../leftSide.php';?>
    </div>
	<textarea id="calendarTemp" style="display:none"  rows="0" cols="0">
		<!--
		<table width="720px" height="500px" cellpadding="2" cellspacing="2" border="1">
			<thead>
				<th class="prev"> <a href="javascript:Calendar.getInstance().move(-1);"> < </a></th>
				<th colspan="5" class="month"> {$T.month} </th>
				<th class="next"> <a href="javascript:Calendar.getInstance().move(1);"> > </a> </th>
			</thead>
			{#foreach $T.rows as row}
			<tr>
				{#foreach $T.row as day}
				<td class="col {$T.day.thisMonth} {$T.day.today}">
					<a style="cursor:pointer;color:black;"  onclick="disptslot({$T.day.day},{$T.day.month});"><div class="title day_{$T.day.month}_{$T.day.day}">
						<span class="weekday">{$T.day.weekDay}</span>
						<span class="event"></span>
					</div>
					<div class="day">{$T.day.day}</div>  </a>
				</td>
				{#/for}
			</tr>
			{#/for}
		</table>
		-->
	</textarea>
	<div id="calendarEventDialog" class="er_arr" style="display:none">
		<div id="calanderdialogclose"> <a href="javascript:void(0);"><img src="<?php echo Base_url('images/close-gray.png'); ?>" alt="close" /></a></div>
		<div>
			<span class="fl createTs" ><?php echo $lCREATE_SLOT;?></span>
			<span class="statusBar" style="margin-left:10px;display:none">Loading...</span>
			<span class="fr myList" ><?php echo $lMY_SESSIONS;?></span>
			<span class="fr myCalendar" style="display:none;"><?php echo $lCALENDER;?></span>
		</div>
		<div class="clear"></div>
		<div class="dayStr">Tuesday 19 2012</div>
		<div style="height: 240px; overflow-y: auto;" class="slotList">
			<table width="100%">
				<thead>
					<th width="30%"></th>
					<th width="40%" style="text-align:left"><?php echo $lTIME_SLOT;?></th>
					<th width="30%" style="text-align:left"><?php echo $lMINUTES;?></th>
				</thead>
				<tbody>
				
				</tbody>
			</table>
		</div>
		<div class="myEvent" style="display:none" style="height: 240px; overflow-y: auto;">
			<table width="100%" border="1">
				<thead>
					<th width="25%"></th>
					<th width="20%" style="text-align:left">Time Slot</th>
					<th width="25%" style="text-align:left">Minutes</th>
					<th width="30%" style="text-align:left">Status</th>
				</thead>
				<tbody>
				
				</tbody>
			</table>
		</div>
		<div class="fr"><a href="javascript:void(0)" class="norBtn blackRadiusBtn w96"><?php echo $lSUBMIT;?></a></div>
		<div class="event_arr"></div>
	</div>
	
	
	
	<textarea id="eventDialogTemplate" style="display:none"  rows="0" cols="0">
		<!--<div id="calendarEventDialog" class="er_arr">
			<ul id="eventList">
				{#foreach $T.rows as row}
				<li>
					<div class="event_tle">{$T.row.title} </div> 
					<div class="event_time">{$T.row.start} - {$T.row.end} </div>
				</li>
				{#else}
				<li>
					There is no event.
				</li>
				{#/for}
			</ul>
			<div class="event_arr"></div>
		</div>-->
	</textarea>
	<table id="timeSlotListTemp" style="display:none"  rows="0" cols="0">
		<tbody>
		<tr>
			<td valign="top">__TIME__:00 __AP__</td>
				<td>
					<div class="timeSlot" key="__TIME__:00 __AP__" eregKey="__EREGKEY__"><?php echo $lCLICK_TO_OPEN;?></div>
					<div class="break"><?php echo $lBREAK;?></div>
					<div class="timeSlot" key="__TIME__:30 __AP__" eregKey="__EREGKEY1__"><?php echo $lCLICK_TO_OPEN;?></div>
					<div class="break"><?php echo $lBREAK;?></div>
				</td>
				<td>
					<div class="minuts">25</div>
					<div class="minuts">5</div>
					<div class="minuts">25</div>
					<div class="minuts">5</div>
				</td>
		</tr>
		</tbody>
	</table>
	<table id="MyEventListTemp" style="display:none"  rows="0" cols="0">
		<tbody>
		<tr>
			<td valign="top">__TIME__</td>
			<td class="minuts">
				__INDEX__
			</td>
			<td class="minuts">
				25
			</td>
			<td  class="tl">
				__STATUS__
			</td>
		</tr>
		</tbody>
	</table>
	<script>

	
	$('#readytotalk1').click(function(){ 
					var cellnumber = '<?php echo $profile['cell']; ?>';
					if(cellnumber == ''){
						alert('Please enter cell number in Contact Info. This is required for SMS alerts when you get a NOW booking.');
						window.location.href = '<?php echo base_url().'user/changeInfo'; ?>';
						return false;
					}
					var readyt = $('#readytotalk1').is(":checked");
					if(readyt == true){
						var readytotalk = 1;
					}else{
						var readytotalk = 0;
					}
					var ddataStringChecked = "readytotalk="+readytotalk;
					$.ajax({
						url: "<?php echo base_url();?>user/readytotalkUpdate",
						type: 'POST',
						data: ddataStringChecked,
						dataType: 'json',
						cache: false,
						success: function (msg){
						 
							if(msg.status == 'success'){	
								window.location.href = window.location.href;
							}
						}
					});
			})
	
		function disptslot(tid,mon)
	{	
	if(tid < 10)
	{
		tid= "0"+tid;
	}
	if(mon < 10)
	{
		mon= "0"+mon;
	}
	var tt="tst"+tid+mon;
	
		var day=document.getElementById(tt).value;	
		
				createTimeSlotList(day);
				$('#calendarEventDialog').show();
			
				
	}
		
	
	var _cond = 0;
	
	function showEvent(day){
		$.getJSON('<?php echo Base_url("user/ajax_eventDetail");?>',{start:day,rand:Math.random()},function(s){
			//console.info(s);
		});
	}
	function createTimeSlotList(day){
		
		var _day = day.replace('-','/').replace('-','/').replace('-','/');
		var _date = new Date(_day);
		_date = _date.toString();
		var _dateArray = _date.split(' ');
		//_dateArray = _dateArray.slice(0,4);
		//_dateStr = _dateArray.join(' ');
		
		var bv = navigator.userAgent.match(/(msie) (\d+)/i);
		bv = $.trim(bv);
		if(bv != '')
		{
			_dateArray_1 = _dateArray; 
			_dateArray = _dateArray.slice(0,3);
			_dateArray1 = _dateArray_1.slice(5,6);
			_dateStr = _dateArray.join(' ');
			_dateStr = _dateStr + ' ' + _dateArray1.join(' ');
			//alert(_dateStr)
			
		}else{
			//alert('hi')
			_dateArray = _dateArray.slice(0,4);
			_dateStr = _dateArray.join(' ');
			//alert(_dateStr)
		}
		

		
		$('.dayStr','#calendarEventDialog').html(_dateStr);
		$('.dayStr','#calendarEventDialog').data('day',_day);
		var i = 0;
		var _str = '';
		var _strTemp = $('#timeSlotListTemp tbody').html();
		for(i;i<24;i++){
			if(i==0){
				_ap = 'am';
				_hour = 12;
			}
			else if(i==12){
				_ap = 'pm';
				_hour = 12;
			}
			else if(i>12){
				_ap = 'pm';
				_hour = i%12;
			}
			else{
				_ap = 'am';
				_hour = i;
			}
			var _eregkey = _hour+'00'+_ap;
			var _eregkey1 = _hour+'30'+_ap;
			_str += _strTemp.replace('__TIME__',_hour).replace('__TIME__',_hour).replace('__TIME__',_hour).replace('__AP__',_ap).replace('__AP__',_ap).replace('__AP__',_ap).replace('__EREGKEY__',_eregkey).replace('__EREGKEY1__',_eregkey1);
			
		}
		$('.slotList tbody').html(_str);
	}
	$(function(){
		
		$("span.lockedtip").hover(function () {
			$(this).append('<div class="tooltip2"><p><?php echo $ItLookLike;?></p></div>');
		  }, function () {
			$("div.tooltip2").remove();
		  });
	    
		$("span.ltimez").hover(function () {
		  //$(this).append('<div class="tooltip3"><p>The times shown on your calendar and messaging are calculated based on the IP address where you are currently logged in. A booking message that occurs while you are on travel will be based on the timezone of last login.</p></div>');
		  $(this).append('<div class="tooltip3"><p><?php echo $thetimeshowntooltip;?></p></div>');
	    }, function () {
		  $("div.tooltip3").remove();
	    });
		
		$("span.svideo").hover(function () {
		  
		  $(this).append('<div class="tooltipr"><p><?php echo $tutorsetupcal;?></p></div>');
	    }, function () {
		  $("div.tooltipr").remove();
	    });
		
		$("span.Disjoin").hover(function () {
		$(this).append('<div class="Nosession"><p><?php echo $NoSesssion;?></p></div>');
	  }, function () {
		$("div.Nosession").remove();
	  });
		//recuring session start
		$('.rcr-ses').click(function(){
			//$('#calendarEventRecurringDialog').hide();
			//--R&D@Oct-07-2013 : Check for paypal acount
			
			var nullPaypal = false;
			$.getJSON( '<?php echo Base_url("user/checkTutorPaymentAccount");?>', function( data ) {
				var pplink = '<?php echo Base_url("user/account/uid/");?>/' + data.uId ;
				if(data.uStatus == false){ 
				
					alert('<?php echo $PleaseEnter;?>');
					$("#ppLink").attr("href", pplink);
					$('#messagePayPal').dialog({modal: true});
					$('#messagePayPal').css('display','block');
					$('#calendarEventRecurringDialog').hide();
					nullPaypal = true;
					//return false;
				} else {
					$('#calendarEventRecurringDialog').show();
				}
			})
			if(nullPaypal == true) { return false; }
			
			//--R&D@Oct-07-2013 : Check for paypal acount
		
			var crmonth = $('#current_month_name').val();
			$('#c_month_name').html(crmonth);
			//$('#calendarEventRecurringDialog').show();
			//alert('hi');
		})
		//recurring session end.
		
		$('.createTs').click(function(){
			$('.slotList').show();
			$('.myEvent').hide();
			$('.blackRadiusBtn','#calendarEventDialog').show();
		})
		$('.setAlert').click(function(){
			var _minute = $('.alMin').val();
			var _type = '';
			$('[name=send_type]').each(function(){
				if($(this).is(':checked')){
					_type += '1' ;
				}
				else{
					_type += '0' ;
				}
			})
			if(_type == '00'){
				alert('<?php echo $lSELECT_ON_TYPE;?>');
				return;
			}
			$.post('<?php echo base_url('user/editProfile');?>',{alerts:_minute,alertType:_type},function(){
				alert('Alert confirmed.');
			})
		})
		$('.myList').click(function(){
		 
			$('.myEvent').show();
			$('.myCalendar').show();
			$('.myList').hide();
			$('.slotList').hide();			
			$('.blackRadiusBtn','#calendarEventDialog').hide();
		})
		
		$('.myCalendar').click(function(){
			$('.myEvent').hide();
			$('.myCalendar').hide();
			$('.myList').show();
			$('.slotList').show();			
			$('.blackRadiusBtn','#calendarEventDialog').show();
		})
		$('.blackRadiusBtn','#calendarEventDialog').click(function() 
                {
                    var _conf = [];
                    var _conkey = [];
                    $('.timeSlot.setted.Confirm.test','#calendarEventDialog').each(function()
                    {
			//var key = $('.timeSlot.setted.confirm','#calendarEventDialog').attr('id');
                        _conf.push($(this).attr('id'));
                        _conkey.push($(this).attr('key'));
                    });
			//alert(_conf.length);
			 
		 
			var _day = $('.dayStr','#calendarEventDialog').data('day');
			var _seletedSlot = [];
			//console.info($('.timeSlot.setted','#calendarEventDialog'));
			$('.timeSlot.setted','#calendarEventDialog').each(function(){
				_seletedSlot.push($(this).attr('key'));
			})
			var _data = {};
			_data['day'] = _day;
			_data['seletedSlot'] = _seletedSlot;
			
			//alert(_data);
			
			$.post('<?php echo Base_url('user/addSlotTime');?>',_data,function(msg){
				if (String == msg.constructor) {      
					eval ('var json = ' + msg);
				} else {
				/* Otherwise assume it is a hash already. */
					var json = msg;
				}
				
				//--Detect IE browser
				if ( $.browser.msie || $.browser.mozilla) {
					var userAgentIe = true; 
				}else{
					var userAgentIe = false;
				}
				//alert('Is First-Time :' + json.firsttime);
				//--Check if IE and is Firsttime
				//$('#messageIe').dialog({modal: true});
				if(userAgentIe === true  && json.firsttime === true){
				//if(userAgentIe === true){
					
					$('#messageIe').dialog({modal: true});
					$('#messageIe').css('display','block');
				}
				if(json.success == 'false' || json.success == false){
					alert(json.msg);
				}
				else {
					//--Message on NewSession
					Calendar.getInstance().getEvent();
					alert('<?php echo $lADD_SUCCESS;?>');
					$('#calendarEventDialog').hide();
				}
			})
			//console.info(_data);
			
			
			//////add code for confirm start//////
			 //$('.timeSlot.setted.confirm','#calendarEventDialog').each(function(){
			//if( $('.timeSlot.setted.confirm','#calendarEventDialog').text() =='confirm'){
			//alert('god');
			
			//alert(_conf.length);
			if(_conf.length==0)
			{
			return;
			}
			else{
			 
				//var key = $('.timeSlot.setted.confirm','#calendarEventDialog').attr('id');
 // alert(key);
 
 	 $.getJSON('<?php echo Base_url("user/getconfirm");?>',{id:_conf[0]},function(data){
				
					 //alert(data[0].id);
				 	$uid = <?php echo $this->session->userdata('uid');?>;
					//alert($uid);
				 	$.post('<?php echo Base_url('user/buyClassesbytutor/uid/'.$this->session->userdata('uid'));?>',{seletedSlot:data[0].startTime,sid:data[0].stid,sTopic : data[0].stopic  , sLevel :  data[0].slevel , school_id : data[0].School_id},function(msg){
					
			 	// alert('rkkr1');
				
				var _days = {};
			_days['day'] = _day;
			
			//alert(_conkey[0]);
				
				sendMessage(data[0].startTime,_days['day'],data[0].stid,_conkey[0]);
				function sendMessage(selected_slot,days_date,sid,key){
		 //  alert('msg ss here');
		var _uidurl = sid;
		var _data = {subject:'Confirm schedule',message:'confirmed your Vee-session request for  '+ days_date  +' at '+ key +'. Have fun! ',uidurl:_uidurl,eventtime:selected_slot};
		//alert(_data.uname);return false;
		 
		$.post('<?php echo base_url("user/message_send_confirm_request");?>',_data,function(msg){
		 // alert(JSON.stringify(msg));
			if (String == msg.constructor) {      
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			//return false;
			if(json.status){
				//$('#dialog').html('Send Success..');
				 alert('Sent confirm request successfully');
				//$('#dialog').dialog({modal:true});
				$('#username').val('');
				$('#subject').val('');
				$('#message').val('');
				//document.location.href = '<?php echo base_url('user/inbox');?>';
				document.location.href="<?php echo base_url('user/calendar');?>";
			}
			else{
				$('#dialog').html(json.msg);
				$('#dialog').dialog({modal:true});
			}
			$('#send').attr('buttontype','done');
		})
	}
				
				
					
				 	});
					
					
			 });
 
 
 
 
 
 
			}
			
			
			////////add code for confirm end//////
			
			
		})
		
		
		
		
		//----IE Message Radio Button
		$('#browserChromeYes').click(function(){
			$('#ieMessageText').html('<?php echo $lLOGIN_CHROME;?>');
			$('#ieMainOption').css('display','none');
			$('#ieCloseOption').css('display','block');
		});
		$('#ieCloseOptionLink').click(function(){
			$( "#messageIe" ).dialog( "destroy" );
		});
		
		
		
		$('#browserChromeNo').click(function(){
			$('#ieMessageText').html('<?php echo $lDW_CHROME;?>');
			$('#ieSubMessage').css('display','block');
			$('#ieMainOption').css('display','none');
		});
		$('#browserChromeDownloadNo').click(function(){
			$('#ieMessageText').html('<?php echo $lIE_WARNING;?>');
			$('#ieSubMessage').css('display','none');
		});
		$('#browserChromeDownloadYes').click(function(){
			var targetUrl = "https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHMA&utm_campaign=en&utm_source=en-IN-ha-bk&utm_medium=ha&utm_term=%2Bchrome";
			//$( "#messageIe" ).dialog( "option", "blind", "explode" );

$( "#messageIe" ).dialog( "destroy" );
			window.open(targetUrl);
		});
		//----IE Message Radio Button

		
		$('.timeSlot').live('click',
			function(){  
				if($(this).hasClass('Booked')||$(this).hasClass('Ended')){
					return;
				}
				
				if($(this).hasClass('Confirm')){
				
				//alert('hrer');
				
					 $(this).addClass('setted test');
					//$(this).html('<?php echo "Confirm";?>');
					$(this).html('<?php echo $clicktoconfirm; ?>');
					$(this).css("font-weight","900");
				}
				
 //if($(this).hasClass('Open')){
			if($(this).hasClass('<?php echo "Open";?>')){				
				 //alert('hrer');
				
					 $(this).removeClass('Confirm');
					  $(this).addClass('Close');
					//$(this).html('<?php echo "Confirm";?>');
					 $(this).html('<?php echo $close;?>');
				}
				
				
				if(!$(this).hasClass('setted')){
					$(this).addClass('setted');
					//$(this).html('<?php echo $lOPEN;?>');
					$(this).css("font-weight","900");
					$(this).css("background-color", "#3399c9");
				}
				
				//if( (!$(this).hasClass('confirm')) && (!$(this).hasClass('setted')) )
				//{
				 else{
				if(!$(this).hasClass('Confirm') && $(this).hasClass('Close') )
				 {
					 $(this).removeClass('setted');
					 //$(this).html('<?php echo $lCLICK_TO_OPEN;?>');
					 $(this).html('<?php echo $close;?>');
					 }
				 }
			}
		)
		/*
		$('#calendarEventDialog').hover(function(){
				$(this).data('in',1)
			},
			function(){
				$(this).data('in',0);
				//$(this).hide();
			}
		)*/
		
		
		$('#calanderdialogclose a').click(function(){
			$('#calendarEventDialog').hide();
		})
		$('#calanderdialogRecurringclose a').click(function(){
			$('#calendarEventRecurringDialog').hide();
		})
		
		function closedialog()
		{
			$('#calendarEventDialog').hide();
		}
	
		Calendar.getInstance().eventCallback = function(){
			//var cd = Calendar.getInstance().getDay;
			//alert('current date = '+ cd);
			//alert('hi');
			$('.event a').toggle(function(){
				//alert('ok');
				//--R&D@Oct-07-2013 : Check for paypal acount
				
				$('#calendarEventDialog').hide();
				//$('#calendarEventDialog').css('display','none');
				var nullPaypal = false;
				$.getJSON( '<?php echo Base_url("user/checkTutorPaymentAccount");?>', function( data ) {
					var pplink = '<?php echo Base_url("user/account/uid/");?>/' + data.uId ;
					if(data.uStatus == false){
						$("#ppLink").attr("href", pplink);
						$('#messagePayPal').dialog({modal: true});
						$('#messagePayPal').css('display','block');
						$('#calendarEventDialog').hide();
						nullPaypal = true;
						//alert('ol');
						var alertHTML = 'Before opening timeslots, please enter your Payment Account email.';
						$( "#dialog").html(alertHTML);
				        $( "#dialog").dialog({
				        //modal: true
				        close: function() {
                         window.location.href = "<?php echo base_url(); ?>user/account/";
                             }
				         });
						//return false;
					}else{
						$('#calendarEventDialog').show();
						//$('#calendarEventDialog').css('display','block');
					}
				})
				if(nullPaypal == true) { return false; }
				
				//--R&D@Oct-07-2013 : Check for paypal acount
			
			
				var addedScrollClass = false;
				var day = $(this).attr('day');
				createTimeSlotList(day);
				//$('#calendarEventDialog').show();
				$('.statusBar').show();
				$.getJSON('<?php echo Base_url("user/ajax_eventDetail");?>',{start:day,rand:Math.random()},function(msg){
					//console.info(s);
					//alert(JSON.stringify(msg));
					
					$('.statusBar').hide();
					if (String == msg.constructor) {
						eval ('var s = ' + msg);
					} else {
						var s = msg;
					}
					//alert(s)
					if(typeof(s.status)!='undefined' &&!s.status){
						alert(s.msg);
						return;
					}
					var str = '';
					//var str += 'close';
					var strTemp = $('#MyEventListTemp tbody').html();
					//alert(strTemp)
					var countRec = "";
					
					//alert(s.rows[0][stid]);
				 	///alert(JSON.parse(s.rows[2]).stid);
					// alert(s.rows[1].openby);
					$.each(s.rows,function(k,v){
						
						var _k = v.start;
						_k = _k.replace(' ','');
						_k = _k.replace(':','');
						
						var status = '';
						if(_k.substr(0,1) == '0'){
							_k = _k.substr(1);
						}
						if( (typeof(v.sid)!='undefined')   ){
						$('.timeSlot[eregkey='+_k+']').addClass('Booked');
							status = '<?php echo $lBOOKED;?>';
							//$('.timeSlot[eregkey='+_k+']').addClass('Booked');
							//$
						}
						
						if(s.rows[k].stid!='undefined' && typeof(v.sid)=='undefined' ){
							//status = '<?php echo "Confirm";?>';
							 $('.timeSlot[eregkey='+_k+']').addClass('Confirm');
							 status = '<?php echo $clicktoconfirm;?>';
							 //$('.timeSlot[eregkey='+_k+']').addClass('Confirm');
							//$
						}
                         //if(s.rows[k].stid=='undefined' && typeof(v.sid)=='undefined' && s.rows[k].openby==1 )
						   if(s.rows[k].openby==0 ){
							status = '<?php echo $lOPEN;?>';
							//status = '<?php echo Open1;?>';
							// status = '<?php echo Open;?>';
							 //$('.timeSlot[eregkey='+_k+']').addClass('setted');
							//$
							$('.timeSlot[eregkey='+_k+']').addClass('Open');
						}
						///else{
							//status = '<?php echo $lOPENED;?>';
						//}
						str += strTemp.replace('__TIME__',v.start).replace('__INDEX__',(k+1)).replace('__STATUS__',status);
						//console.info('.timeSlot[eregkey='+_k+']');
							$('.timeSlot[eregkey='+_k+']').attr('id', s.rows[k].id);
						$('.timeSlot[eregkey='+_k+']').addClass('setted');
						$('.timeSlot[eregkey='+_k+']').html(status);
						
						$('.timeSlot[eregkey='+_k+']').addClass(status);
						

						
					})
					$('.myEvent tbody').html(str);
					_dayStr = $('.dayStr').html();//.replace('-','/').replace('-','/');
					$('.slotList .timeSlot').each(function(){
						var currentDT = new Date();
						var timeZoneOffset = currentDT.getTimezoneOffset() / 60;
						var currentUTCdtStr = <?php echo strtotime(date('Y-m-d H:i:s',time())); ?>;
						var loopDT = new Date( _dayStr + ' ' + $(this).attr('key') );
						var loopUTCdtStr = Date.parse(loopDT)/1000;
						
						//if(new Date( _dayStr + ' ' + $(this).attr('key') )  < new Date()){
						if(loopUTCdtStr  < currentUTCdtStr){
							$(this).addClass('Ended');
							$(this).html('<?php echo $lENDED;?>');
						}else{
							//--R&D@Sept-27-2013 : Scroll to Available session time	
							if(addedScrollClass == false){							 
								var currentDateE 	= new Date()
								var dayE 			= currentDateE.getDate();
								var monthE 			= currentDateE.getMonth() + 1;
								var yearE 			= currentDateE.getFullYear();
								var my_dateE 		=yearE +'-'+ ('0' + monthE).slice(-2) + '-'+ ('0' + dayE).slice(-2);

								if(day == my_dateE){
										//--Add unique ID to div
										var hasSetted = $(this).hasClass("setted");
										var hasOpened = $(this).hasClass("Opened");
										if(hasSetted == false && hasOpened == false){
											$(this).attr('id', 'av');
											//--ID has been added to div
											addedScrollClass = true;
										}
										
										//--Get the Slot of current time
										var ek 	= $(this).attr('eregkey');
										var height = $(this).parents('table').height();
										//--Check if Its AM or PM
										timeD = ek.replace(/[0-9]/g, '');
										ek 		= parseInt(ek);
										var perRow = height/22;
										if(timeD == "pm"){
											ek = ek + (perRow * 12);
										}
										var parent = $(this).parent();
										//--Add a td to set milestone for scroll
										$(parent).before( "<td style='display:none;'>0000</td>" );
										var scrollTo = (ek * perRow)/100;
										var howMuchToScroll =  scrollTo - 25;
										howMuchToScroll = Math.abs(howMuchToScroll);
										$( ".slotList" ).animate({scrollTop:howMuchToScroll}, 'slow');
								}
							}
							//--R&D@Sept-27-2013 : Scroll to Available session time	
						}
					})
				})
				$('#calendarEventDialog').data('in',1);
				//console.info($(this).offset().left + $('#calendarEventDialog').width())
				if($(this).offset().left + $('#calendarEventDialog').width() >document.documentElement.clientWidth){
					_pos = 'right';
					$('#calendarEventDialog').css('left' ,'');
					$('#calendarEventDialog').css('right' ,document.documentElement.clientWidth-$(this).offset().left-50);
				}
				else{
					$('#calendarEventDialog').css('right' ,'');
					$('#calendarEventDialog').css('left' ,$(this).offset().left);
				}
				
				var _bottomHeight = $('#calendarEventDialog').height() + $(this).offset().top;
				
				var _height = _bottomHeight - ( document.documentElement.clientHeight + $(window).scrollTop() );
				if(_height > 0 ) {
					$('#calendarEventDialog').css('top',$(this).offset().top - _height - 30);
				}
				else{
					$('#calendarEventDialog').css('top',$(this).offset().top);
				}
			
			},function(){
				$(this).trigger('click');
				if($('#calendarEventDialog').data('in')){
					return;
				}
				else{
					$('#calendarEventDialog').hide();
				}
			})
			$('#fromTime').trigger('change');
			//getNowDateAndShow();
		}
		Calendar.getInstance().setEventUrl('<?php echo Base_url("user/ajax_events");?>').render();
		/*$('.delClass').hide();
		$('.ratings_list li').hover(function(){
			$('.delClass',this).show();
		},function(){
			$('.delClass',this).hide();
		});*/
		
		$('.delClass').click(function(){
			if(!$(this).hasClass('disabled')){	
				if(window.confirm('<?php echo $lDELETE_SESSION_MSG;?>')){
					var bkclass = $(this);
					bkclass.addClass('disabled');
					var _id = $(this).attr('theClassid');
					var _delObj = $(this);
					$.get('<?php echo base_url('user/studentdelClass');?>',{id:_id},function(msg){
					/*alert(msg);
					return false;*/
						bkclass.removeClass('disabled');
						alert('<?php echo $lDELETE_SUCCESS;?>');
						window.location.href="<?php echo base_url();?>user/calendar/uid/<?php echo $profile['uid']; ?>";
						_delObj.parents('li').remove();
					});
				}
			}
        });

		$('#addSlotTime').click(function(){
			var _start = $('#startDay').val() + ' ' + $('#startTime').val();
			var _end = $('#endDay').val() + ' ' + $('#endTime').val();
			if ( new Date(_start) == 'Invalid Date'){
				alert('<?php echo $lINVALID_START_DATE;?>');
				return;
			}
			if(new Date(_end) == 'Invalid Date'){
				alert('<?php echo $lINVALID_END_DATE;?>');
				return;
			}
			start = new Date(_start);
			end = new Date(_end);
			if(end < start){
				alert('<?php echo $lEND_TIME_ALERT;?>');
				return;
			}
			$.post('<?php echo Base_url('user/addSlotTime');?>',{start:start.toString(),end:end.toString()},function(msg){
				if (String == msg.constructor) {
					eval ('var json = ' + msg);
				} else {
				/* Otherwise assume it is a hash already. */
					var json = msg;
				}
				//console.info(json.success);
				if(json.success == 'false' || json.success == false){
					alert(json.msg);
					
				}
				else {
					/*$('#startDay').val('') ;
					$('#startTime').val('');
					$('#endDay').val('');
					$('#endTime').val('');*/
					Calendar.getInstance().getEvent();
					alert('Session successfully created.');
					$('#calendarEventDialog').hide();
				}
			})
		})
		
	})
	
	
	$('.blackRadiusBtn','#calendarEventRecurringDialog').click(function(){
		var _data = {};
		
		_data['rstartTime'] = $('#rstartTime').val();
		_data['rendTime'] = $('#rendTime').val();
		_data['r_sunday'] = $('#r_sunday').is(":checked");
		_data['r_monday'] = $('#r_monday').is(":checked");
		_data['r_tuesday'] = $('#r_tuesday').is(":checked");
		_data['r_wednesday'] = $('#r_wednesday').is(":checked");
		_data['r_thursday'] = $('#r_thursday').is(":checked");
		_data['r_friday'] = $('#r_friday').is(":checked");
		_data['r_saturday'] = $('#r_saturday').is(":checked");
		_data['c_month'] = $('#current_month_no').val();
		_data['c_year'] = $('#current_year_no').val();
		
		$('#calendarEventRecurringDialog').hide();
		$.blockUI({ message: '<img src="<?php echo base_url();?>images/loading51.gif" />' });
		
		$.post('<?php echo Base_url('user/addSlotTimeRecurring');?>',_data,function(msg) 
                {
			if (String == msg.constructor) 
                        {
                            eval ('var json = ' + msg);
			} 
                        else 
                        {
                            /* Otherwise assume it is a hash already. */
                            var json = msg;
			}
			
			//--Detect IE browser
			if ( $.browser.msie || $.browser.mozilla) 
                        {
                            var userAgentIe = true; 
			}
                        else
                        {
                            var userAgentIe = false;
			}
			//alert('Is First-Time :' + json.firsttime);
			//--Check if IE and is Firsttime
			if(userAgentIe === true  && json.firsttime === true)
                        {
                            //if(userAgentIe === true){
                            $('#messageIe').dialog({modal: true});
                            $('#messageIe').css('display','block');
			}
			if(json.success == 'false' || json.success == false)
                        {
				alert(json.msg);
			}
			else 
                        {
                            //--Message on NewSession
                            //alert(json.rstartTime);
                            Calendar.getInstance().getEvent();
                            $.unblockUI();
                            alert('<?php echo $lADD_SUCCESS;?>');
                            $('#calendarEventRecurringDialog').hide();
                            //location.reload();
                            Project.modules.customcalendar.pagerefresh();
			}
		})
		//alert(r_sunday);
	})
	
	
	// skvirja - 05 Oct 2013  - checks for class locked
	var _noClasses = <?php echo count($classes); ?>;
	if(_noClasses > 0)
	{
		checkLockedClass();
	}
	mTimerClass = setTimeout('checkLockedClass();',5000);
	function checkLockedClass()
	{  
		var classLockedTimer;
		var _id = 0;
		$.getJSON('<?php echo base_url('user/checkLockedClass');?>',{id:_id},function(msg){
			//alert(msg);
		    mTimerClass = setTimeout('checkLockedClass();',5000);
			if (String == msg.constructor) {
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			
			/*var reload=json.reload;
			if(reload=="true")
			{
				location.reload();
			}*/
			var lockedclasses = json.classes;
			var lockedclass = '';
			var classId = '';
			var numClass =  json.count; 
			for(var i=0;i<numClass+1;i++)
			{
				if (typeof(lockedclasses[i]) != "undefined")
				{
					lockedclass = lockedclasses[i];
					classId = lockedclass['id'];
					var tooltipid = '#class_t_'+classId;
					var enableid = '#class_e_'+classId;
					var disableid = '#class_d_'+classId;

					$(tooltipid).show();
					$(disableid).show();
					$(enableid).hide();
				}
			}
		})
	}
	//--Set Language for Booking
	$( document ).ready(function() {
		$( '#bNote' ).html('');
		$( '#bNote' ).html('<img src="http://thetalklist.com/images/orange-dot.png"> = <?php echo $lBOOKING;?>');
	});
	//--Set Language for Booking
	
	
	</script>
<style>
.lockedtip{margin-left:0px !important;}
span.lockedtip{
  cursor: pointer;
  display: inline-block;
  color: White;
  font-size: 13px;
  font-weight: bold;
  border-radius: 8px;
  text-align: center;
  
}

div.tooltip2 {
  background-color: #037898;
  color: White;
  position: absolute;
  left:300px !important;
  top: -57px !important;
  z-index: 1000000;
  width: 250px; 
  border-radius: 5px;
  line-height:15px;
}
div.tooltip2:before {
  border-color: transparent #037898 transparent transparent;
  border-right: 6px solid #037898;
  border-style: solid;
  border-width: 6px 6px 6px 0px;
  content: "";
  display: block;
  height: 0;
  width: 0;
  line-height: 0;
  position: absolute;
  top: 40%;
  left: -6px;
}
div.tooltip2 p {
  margin: 10px;
  color: White;
}
span.ltimez{
  display: inline-block;
}

span.svideo{
  cursor: pointer;
  display: inline-block;
}

div.tooltip3 {
 /* background-color: #037898;
  color: White;
 
  z-index: 1000000;
  width: 250px; 
  border-radius: 5px;
  line-height:15px;  position: relative;  margin-top:19px !important;  margin-left:-90px !important;*/ /* position: absolute;
   margin-left:510px !important;
  top: 245px !important;*/
}
span.ltimez{float:left; width:350px;}

span.svideo{width:auto;}

div.tooltip3:before {
/*  border-color: transparent #037898 transparent transparent;
  border-right: 6px solid #037898;
  border-style: solid;
  border-width: 6px 6px 6px 0px;
  content: "";
  display: block;
  height: 0;
  width: 0;
  line-height: 0;
 
  float:left;  margin-top:-30px !important;*/ /* position: absolute;
  top: 40%; left:-6px;*/
}
/*div.tooltip3 p {
  margin: 10px;
  color: White;
  font-weight: normal;
  font-size:12px;
  text-decoration:none;   padding:5px 0;
}
*/

.ratings_list li{ height:100px; overflow:visible;}

div.tooltipr {
  background-color: #037898;
  color: White;
 /* position: absolute;
   margin-left:510px !important;
  top: 245px !important;*/
  z-index: 1000000;
  width: 80px; 
  border-radius: 5px;
  line-height:15px;  position: relative;  margin-top:-15px !important;  margin-left:0px !important;
}
div.tooltipr:before {
  border-color: transparent #037898 transparent transparent;
  border-right: 6px solid #037898;
  border-style: solid;
  border-width: 6px 6px 6px 0px;
  content: "";
  display: block;
  height: 0;
  width: 0;
  line-height: 0;
 /* position: absolute;
  top: 40%; left:-6px;*/
  float:left;  margin-top:28px !important;
}
div.tooltipr p {
  margin: 10px;
  color: White;
  font-weight: normal;
  font-size:12px;
  text-decoration:none;   padding:5px 0;
}
span.ToolCal {
  cursor: pointer;
  position: relative;
   
}
div.TipCal {
  background-color: #037898;
  color: White;
  position: absolute;
  left: 50px;
  top: 0px;
  z-index: 1000000;
  width: 250px;
  border-radius: 5px;
  margin-top:-11px;
  font-size:11px;
}
div.TipCal:before {
  border-color: transparent #037898 transparent transparent;
  border-right: 6px solid #037898;
  
  border-width: 6px 6px 6px 0px;
  content: "";
  display: block;
  height: 0;
  width: 0;
  line-height: 0;
  position: absolute;
  top: 40%;
  left: -6px;
}
div.TipCal p {
  margin: 10px;
  color: White;
  font-size:14px;
  font-weight:normal;
  line-height:16px;

}
div.Nosession {
  background-color: #037898;
  color: White;
  position: absolute;
  left:145px !important;
  top: -15px !important;
  z-index: 1000000;
  width: 250px; 
  border-radius: 5px;
  line-height:15px;
}
div.Nosession:before {
  border-color: transparent #037898 transparent transparent;
  border-right: 6px solid #037898;
  border-style: solid;
  border-width: 6px 6px 6px 0px;
  content: "";
  display: block;
  height: 0;
  width: 0;
  line-height: 0;
  position: absolute;
  top: 40%;
  left: -6px;
}
div.Nosession p {
  margin: 10px;
  color: White;
}

#calendarEventRecurringDialog{/* bottom:50px !important; */ top:inherit !important; left:inherit !important; z-index:9999999; margin:250px 0 0 180px !important;}
</style>

		
		<div id="firstTour" title="" style="display:None;">
    	
			<!--<div class="ratelist popup-row">
				<span class="title" style="float:left"><?php echo "Availibility";?></span>  
			</div>-->
			<div class="hight-cnt2">&nbsp;</div>
			<div class="popup-step tutoe-step2">
            	<span class="popup-no">2</span>
            	<div class="step-div-bg">
                	<div class="ratelist popup-row">
				<p>
				<span class="title" style="float:left;line-height:15px;">
				<?php echo $BeAvail;?>
				</span>  
				<?php echo $ReciveSms;?></span>  </p>
				<p><span style='margin-left:90px;'><?php echo $Ors;?></span></p>
				<p><span class="title" style="float:left"><?php echo  $ClickOpen;?></span></p>
			</div>
                	<div class="pop-pagin">
                    	<ul>
                        	<li><span><a href="<?php echo base_url('user/dashboard?step=1');?>">1</a></span></li>
                            <li  class="active"><span><a href="">2</a></span></li>
                           <li><span><a href="<?php echo base_url('testveesession/testVeeSession?step=3');?>">3</a></span></li>
                            <li><span><a href="<?php echo base_url('user/account?step=4');?>">4</a></span></li>
                            <li><span><a href="<?php echo base_url('user/changeInfo?step=5');?>">5</a></span></li>
                             
                        </ul>
                    </div>
            		<a href="<?php echo base_url('testveesession/testVeeSession?step=3');?>"> Next  </a>
                </div>
            </div>
		</div>
	<!--
	--prefix=/usr --libdir=/usr/lib --shlibdir=/usr/lib --mandir=/usr/share/man --incdir=/usr/include --disable-avisynth --extra-cflags='-O2 -g -pipe -Wall -Wp,-D_FORTIFY_SOURCE=2 -fexceptions -fstack-protector --param=ssp-buffer-size=4 -m32 -march=i686 -mtune=atom -fasynchronous-unwind-tables' --enable-avfilter --enable-avfilter-lavf --enable-libdc1394 --enable-libdirac --enable-libfaac --enable-libfaad --enable-libfaadbin --enable-libgsm --enable-libmp3lame --enable-libopencore-amrnb --enable-libopencore-amrwb --enable-librtmp --enable-libschroedinger --enable-libspeex --enable-libtheora --enable-libx264 --enable-gpl --enable-nonfree --enable-postproc --enable-pthreads --enable-shared --enable-swscale --enable-vdpau --enable-version3 --enable-x11grab
	ffmpeg -i 65f965f7f5cd57d3495971820d07a5fe.mp4 -acodec libvorbis -vcodec libtheora 65f965f7f5cd57d3495971820d07a5fe.mp4.ogv
	ffmpeg -i 65f965f7f5cd57d3495971820d07a5fe.mp4 -acodec libfaac -vcodec libx264 65f965f7f5cd57d3495971820d07a5fe.mp4.mp4
	ffmpeg -i 65f965f7f5cd57d3495971820d07a5fe.mp4 -acodec libfaac -vcodec libx264  65f965f7f5cd57d3495971820d07a5fe.mp4.webm
	ffmpeg -i 65f965f7f5cd57d3495971820d07a5fe.mp4 -acodec libfaac -vcodec libx264 -vpre medium 65f965f7f5cd57d3495971820d07a5fe.mp4.mp4
	ffmpeg -i 65f965f7f5cd57d3495971820d07a5fe.mp4 -acodec libfaac -vcodec libx264 -vpre medium 65f965f7f5cd57d3495971820d07a5fe.mp4.webm
	ffmpeg -i cacd4ba12ab6bf4cc45d7e2f9b6edf39.mp4 -vcodec libx264 -vpre medium cacd4ba12ab6bf4cc45d7e2f9b6edf39.mp4.mp4.mp4
	-->