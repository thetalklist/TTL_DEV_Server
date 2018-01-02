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
$arrVal = $this->lookup_model->getValue('192', $multi_lang);
$lcurrenttutor = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('193', $multi_lang);
$lhourlyrate = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('194', $multi_lang);
$lremove = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('195', $multi_lang);
$lprofile = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('196', $multi_lang);
$lappointment = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('197', $multi_lang);
$lpotentialtutor = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('324', $multi_lang);
$sessionratetext = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('321', $multi_lang);
$creditstext = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('731', $multi_lang);
$scheudle = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('740', $multi_lang);
$smessage = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('741', $multi_lang);
$tnow = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('925', $multi_lang);
$talknotavail = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1005', $multi_lang);	$tutorwillsend 	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1006', $multi_lang);	$tutotwillsendnoamount 	= $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1123', $multi_lang);
$ThisTutAffiliate = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('1124', $multi_lang);
$SelectToConfirm = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('901', $multi_lang);
$ConvesationS = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('900', $multi_lang);
$CUrriculams = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1057', $multi_lang);	$PleaseComplete 	= $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('1125', $multi_lang);
$InformalSpeaking = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1084', $multi_lang);	$insuuffi	= $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('1126', $multi_lang);
$StructureLearning = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('321', $multi_lang);
$CreditsTut = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('482', $multi_lang);
$Oks = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('412', $multi_lang);
$Cancels = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1127', $multi_lang);
$YouAreTryingTo = $arrVal[$multi_lang];
?>
<?php //$this->layout->appendFile('javascript',"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js");?>
<?php $this->layout->appendFile('javascript',"js/fullCalendar.js");?>
<?php $this->layout->appendFile('javascript',"js/jquery-jtemplates.js");?>
<?php $this->layout->appendFile('javascript',"js/calendar.js");?>
<?php $this->layout->appendFile('css',"css/calendar.css");?>
<?php $this->layout->appendFile('javascript',"js/jquery.blockUI.js"); ?>


 <div class="baseBox baseBoxBg clearfix">
 <div id="sendMessageView" class="sendMessageView" style="display:none;"></div>
        <div class="content_main fr">
        	<div class="main_inner">
                <?php /*<ul class="student_prof">
					<?php echo profile_menu('s_private','t_prof',$profile['uid']);?>
                </ul>*/?>
                <!--/student_prof-->
                <div id="student_prof_Wp">
                	<div class="mod">
                        
                            <div class="content tle" style="padding-top:0px;"><h2><?php 	echo $lcurrenttutor;?></h2></div>
                       
                        <div class="bd">
                        	<ul class="teacher_list clearfix">
                                <?php

//print_r($teachers);die();
								
								foreach($teachers as $k=>$teacher):?>
								<?php if($teacher['type']==0):?>
								<li class="teacher_box">
                                    <div class="techer_box_t"></div>
                                    <div class="techer_box_c">
                                    	<div class="teacher_info fl">
                                        	<div><a href="javascript:void(0)"  tid="<?php echo $teacher['id'];?>" class="c939393 delTeacher"><em class="ico_op ico_del2"></em><?php echo $lremove;?></a></div>
                                            <p class="c437a86"><?php echo $sessionratetext;?>:</p>
											<p><?php //if($profile['free_session'] == 'y'){ echo $rate =0; } if($profile['free_session'] == 'n'){ echo $rate=number_format(round($teacher['hRate'] * (1+$config['VEE_PRICE_PERCENT']['value']) * 100) /100,2,'.',''); }?> <?php //echo $creditstext;?></p>
											<p><?php echo $rate=number_format(round($teacher['hRate'] * (1+$config['VEE_PRICE_PERCENT']['value']) * 100) /100,2,'.','');?> <?php echo $creditstext;?></p>
                                        </div>
                                        <div class="teacher_header fr">
                                        	<p><a href="<?php echo tl_url('user/profile/uid/'.$teacher['tid'].'/'.$teacher['school_id'].'/'.$teacher['school_id']);?>" title=""><img src="<?php echo profile_image($teacher['pic']);?>" width="111"  alt="" style="max-height:125px"/></a></p>
                                           
                                        </div>
                                        <div class="spc10c"></div>
                                        <div class="teacher_name"><?php echo $teacher['firstName'].$teacher['uid'];?></div>
                                        <div class="agnC ">
                                        	<!--<a href="<?php echo tl_url('user/profile',$teacher['tid']);?>" class="norBtn grayRadiusBtn w96 f12"><?php echo $lprofile;?></a>
                                            <a href="<?php echo tl_url('user/calendar',$teacher['tid']);?>" class="norBtn redRadiusBtn2 w96 f12"><?php echo $lappointment;?></a>--->
											
											<div class="nw-tutr-btn">
                                                                <a class="icon1 icon-popup"  onclick="sendBeepBoxMessage(<?php echo $teacher['tid'] ;?>)">&nbsp;<span class="classic"><?php echo $smessage; ?></span></a>
                                                                <!---<a class="icon2 icon-popup" href="<?php echo base_url('/user/calendar/uid/'.@$newtutor['uid']); ?>">&nbsp;<span class="classic">Appointment</span></a>-->
			<a class="icon2 icon-popup" href="<?php echo tl_url('user/calendar',$teacher['tid']);?>">&nbsp;<span class="classic"><?php echo $scheudle; ?></span></a>
															   <?php  if($teacher['readytotalk'] == 1)
																{?>
																<a class="icon3 icon-popup" onclick="bookNow(<?php echo $teacher['tid'] ;?>,'<?php echo $teacher['firstName'];?>',<?php echo $teacher['school_id'];?>,<?php echo $rate;?>)">&nbsp;<span class="classic"><?php echo $tnow; ?></span></a>
                                                                <?}else{?>
																<a class="icon3 icon-popup icon3-gray" >&nbsp;<span class="classic"><?php echo $talknotavail;?></span></a>
																<?}?>
                                                            </div>
											
                                        </div>
                                    </div>
                                </li>
								<?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mod">
                       
                            <div class="content tle"><h2><?php echo $lpotentialtutor;?></h2></div>
                        
                        <div class="bd">
                        	<ul class="teacher_list clearfix">
                                <?php foreach($teachers as $k=>$teacher):?>
								<?php if($teacher['type']==1):?>
								<li class="teacher_box">
                                    <div class="techer_box_t"></div>
                                    <div class="techer_box_c">
                                    	<div class="teacher_info fl">
                                        	<div><a href="javascript:void(0)" class="c939393 delTeacher" tid="<?php echo $teacher['id'];?>"><em class="ico_op ico_del2"></em><?php echo $lremove;?></a></div>
                                            <p class="c437a86"><?php echo $sessionratetext;?>:</p>
											<!--<p><?php // echo @$teacher['hRate'];?> credits</p>-->
											<p><?php echo $rate=number_format(round($teacher['hRate'] * (1+$config['VEE_PRICE_PERCENT']['value']) * 100) /100,2,'.','');?> <?php echo $creditstext;?></p>
                                        </div>
                                        <div class="teacher_header fr">
                                        	<p><a href="<?php echo tl_url('user/profile/uid/'.$teacher['tid'].'/'.$teacher['school_id'].'/'.$teacher['school_id']);?>" title=""><img src="<?php echo profile_image($teacher['pic']);?>" width="111"  alt="" style="max-height:125px"/></a></p>
                                           
                                        </div>
                                        <div class="spc10c"></div>
                                        <div class="teacher_name"><?php echo $teacher['firstName'],'',$teacher['uid'];?></div>
                                        <div class="agnC ">
                                        	<!--<a href="<?php echo tl_url('user/profile',$teacher['tid']);?>" class="norBtn grayRadiusBtn w96 f12"><?php echo $lprofile;?></a>
                                            <a href="<?php echo tl_url('user/calendar',$teacher['tid']);?>" class="norBtn redRadiusBtn2 w96 f12"><?php echo $lappointment;?></a>-->
                                        </div>
										
										
										<div class="nw-tutr-btn">
                                                                <a class="icon1 icon-popup"  onclick="sendBeepBoxMessage(<?php echo $teacher['tid'] ;?>)">&nbsp;<span class="classic"><?php echo $smessage; ?></span></a>
                                                                <!---<a class="icon2 icon-popup" href="<?php echo base_url('/user/calendar/uid/'.@$newtutor['uid']); ?>">&nbsp;<span class="classic">Appointment</span></a>-->
			<a class="icon2 icon-popup" href="<?php echo tl_url('user/calendar',$teacher['tid']);?>">&nbsp;<span class="classic"><?php echo $scheudle;?></span></a>
															   <?php  if($teacher['readytotalk'] == 1)
																{?>
																<a class="icon3 icon-popup" onclick="bookNow(<?php echo $teacher['tid'] ;?>,'<?php echo $teacher['firstName']?>',<?php echo $teacher['school_id'];?>,<?php echo $rate;?>)">&nbsp;<span class="classic"><?php echo $tnow; ?></span></a>
                                                                <?}else{?>
																<a class="icon3 icon-popup icon3-gray"  >&nbsp;<span class="classic"><?php echo $talknotavail; ?></span></a>
																<?}?>
                                                            </div>
										
                                    </div>
                                </li>
								<?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!--/student_prof_Wp-->
            </div>
        </div>
        <!--/content_main-->
		<?php include dirname(__FILE__).'/../leftSide.php';?>
		<div id="dialog1" title="" style="display:None;">
			<div class="ratelist">
				<span class="title" style="float:left"><?php echo $ThisTutAffiliate;?></span>  
			</div>
			<div class="ratelist">
				<br><br><br><p><span class="title" style="float:left"><?php echo $SelectToConfirm;?></span>  </p>
				<br><br><br>
				<div  style="display:block;"  id="dispCurr">
				<input  id="conversationcheck" value="0" checked type="radio" name="amex">  <?php echo  $ConvesationS;?> <?php echo $InformalSpeaking ;?><span id="Conv" id="conversationprise"  > </span><?php  echo $CreditsTut;?><br><br>
 				</div>
				<input type="radio" name="amex"  value="1" >  <?php echo  $CUrriculams;?>     - <?php echo $StructureLearning ;?> <span id="Curr"> </span><?php echo $CreditsTut;?><br>
				
				<p class="clearer"></p>
			</div>
			<p><input type="button" value="<?php echo $Oks;?>" id="rateButtonStu" class="blu-btn"/>
			<input type="button" value="<?php echo $Cancels;?>" onclick="closeFunc();" class="blu-btn"/>
			</p>
		</div>
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
					<div class="title day_{$T.day.month}_{$T.day.day}">
						<span class="weekday">{$T.day.weekDay}</span>
						<span class="event"></span>
					</div>
					<div class="day">{$T.day.day}</div>  
				</td>
				{#/for}
			</tr>
			{#/for}
		</table>
		-->
	</textarea>
	<script>
	$(function(){
		$('.delTeacher').hide();
		$('.teacher_box').hover(function(){
			$('.delTeacher',this).show();
		},function(){
			$('.delTeacher',this).hide();
		})
        $('.delTeacher').click(function(){
            if(window.confirm('Are you sure you want to delete this tutor?')){
                var _id = $(this).attr('tid');
                var _delObj = $(this);
                $.get('<?php echo base_url('user/delTeacher');?>',{id:_id},function(msg){
                    
                    if (String == msg.constructor) {      
                        eval ('var json = ' + msg);
                    } else {
                        var json = msg;
                    }
                    if(json.success == 'false' || json.success == false){
                        alert(json.msg);
                    }
                    else {
                        //Calendar.getInstance().getEvent();
                        //alert('Delete success!');
                        _delObj.parents('.teacher_box').remove();
                    }

                })

            }

        })
	})
	</script>
	
	<script>
	function closeFunc()
{
	$('#dialog1').dialog('destroy');
}
function sendBeepBoxMessage(uid)
{  if(uid == '')
	{
		alert('Login First!');
		return false;
	}
	var lodUrl = '<?php echo base_url(); ?>user/load_send_message/uid/'+ uid;
	$('#sendMessageView').load(lodUrl);
	$('#sendMessageView').show();
}
var dg =0;
function bookNow(tid,username,schoolId,hrate)
{ 
if($(".icon3").hasClass("loadingBk")){
		return; 
	} 
	$(".icon3").addClass('loadingBk');

if (schoolId > 0)
   {
		jQuery("#Conv").text(hrate);
		pattern ='sdata='+schoolId +" &tid="+tid;;
		if(hrate > 0)
		{
		$.ajax({
					  type:'POST',
					 dataType: 'html',
					  url:'<?php echo base_url('user/GetMarkupByTut');?>',
					  async:false,
					  data:pattern,
					  success:function(msg){
					  if (String == msg.constructor)
					{
						var result;
						
						eval('result = ' + msg);
					} else {
						var result = msg;
					}
					
				
					/*var b = result.tutor_markup;
					var curr=parseFloat(hrate)+parseFloat(b);
					curr=parseFloat(hrate)+parseFloat(b);
					curr=(curr).toFixed(2);*/
					var curr = (result.totalrate*(1+33/100)).toFixed(2);
					var isCurr= result.curr;
					/*if(isCurr == 1)
					{
							$('#dispCurr').show();
					}
					else
					{	
							$('#dispCurr').hide();
					}*/
					jQuery("#Curr").text(curr);
					
					}});
		}else{
				jQuery("#Curr").text(hrate);
		}		
		
			$(".icon3").removeClass("loadingBk");
					$('#dialog1').dialog({
					modal:true,
					width:'430px',
					resizable:false,
					beforeclose: function( event, ui ) {closeFunc();return false;}
			});
			if(dg==0){
$('#rateButtonStu').click(function(){
					$('#dialog1').dialog('destroy');
					bookNow1(tid,username,schoolId);
					});
					dg=1;
			}
}else{bookNow1(tid,username,schoolId);}
					}
function bookNow1(tid,username,school_id)
{
var mu_uid = $("#uid").val();
 
if(mu_uid=='')
 {
	$('#dialog').attr('buttonType','doing');
	$('#dialog').dialog({modal:true});
	$('#dialog').attr('buttonType','done');
	$('#dialog').html('<?php echo $YouMust;?>');
	$( ".floating_form" ).show();
 }
 else
 {
 var lastClickedOnBook = false;
	//prevent multiple clicks
	if(lastClickedOnBook == true){return false;}
	lastClickedOnBook = true;
	var _data = {};
	<?php if($this->session->userdata('uid')): ?>
	_data['sid'] = <?php echo $this->session->userdata('uid'); ?>;
	<?php else: ?>
	_data['sid'] = 0;
	<?php endif; ?>
	_data['tid'] = tid;
	var refid ="<?php echo $Refid; ?>";
	
	var sessiontype=$('input[name=amex]:checked').val();
	if (sessiontype == 1 )
	{
	_data['schoolid']=school_id;
	 }
	 else
	 {
		_data['schoolid']=0;
	 }
	/* if(sessiontype==1 && refid != school_id)
	 {
		alert('You are not associated with this Tutor School Community.  You may book a conversation session with this tutor at the listed price or you may pick another school community tutor.');
		return false;
	 }*/
	$.post('<?php echo Base_url('user/checkClassBookNow');?>',_data,function(msg){
		if (String == msg.constructor) {
			eval ('var json = ' + msg);
		} else {
			var json = msg;
		}
		window.cost = json.cost;
		if(json.success == 'false' || json.success == false){
			alert(json.msg);
		}else if(json.enough == false || json.enough == 'false'){
			window.returnvar = false;
			window.avl = true;
			window.profileComplete = true;
			
		}else if(json.availabletobook==false || json.availabletobook=='false'){
			window.returnvar = false;
			window.avl = false;
			window.profileComplete = true;
			
		}else if(json.profileCompletion==false || json.profileCompletion=='false'){
			window.returnvar = false;
			window.avl = true;
			window.profileComplete = false;
			
		}else{
			window.returnvar = true;
		}
		if(json.firstBookNow == false || json.firstBookNow == 'false'){
			window.firstBookNow = false;
		}else{
			window.firstBookNow = true;
			window.profileComplete = false;
		}
		if(json.totalNumSess > 1){
			window.totalNumSess = false;
		}else{
			window.totalNumSess = true;
		}
		
		if(json.enough)
		{
		window.enough=true;
		}
		else
		{
		window.enough=false;
		}
		setTimeout();
	})
	function setTimeout(){
		$(".icon3").removeClass("loadingBk");  
		lastClickedOnBook = false;
		if(window.returnvar == false)
		{
			lastClickedOnBook = false;
			if(window.avl == false)
			{
				//var alertHTML = 'You have alredy booked.';
				if(window.firstBookNow == false){
					var alertHTML = '<?php echo $YouAreTryingTo;?>';
				}else{
					var alertHTML = '<?php echo $YouAreTryingTo;?>';
				}
				$( "#dialog").html(alertHTML);
				$( "#dialog").dialog({modal: true,title:" ",  close: function( event, ui ) {self.location = self.location.href;}});
				return false;
			}else if(window.profileComplete == false){
				alert('<?php echo $PleaseComplete;?>');
				window.location.href = "<?php echo base_url(); ?>user/registeredit/";
				return false;
			}
			
			else if(window.enough==true){
				 var message ="<?php echo $tutotwillsendnoamount;?>";
			      var conf = confirm(message);
				  var classcost = window.cost;
					if(conf == true)
					{
					// send message to tutor
						$.getJSON('<?php echo Base_url("user/sendBookNowMessage");?>',{tid:tid, cost:classcost,schoolId:_data['schoolid']},function(msg){
							
							//redirect to student dashboard page
								window.location.href = '<?php echo Base_url("user/dashboard");?>';
						});return;
					callback(false);
					}else{
						return;
					}
					callback(false);
			}
			else{
				var rechargeURL = '<?php echo base_url(); ?>user/account/';
				var alertHTML = '<?php echo $insuuffi;?>';
				$( "#dialog").html(alertHTML);
				$( "#dialog").dialog({modal: true,  buttons: [
         
        {
            text: "Ok",
            "class": 'saveButtonClass',
            click: function() {
                window.location.href = rechargeURL;
            }
        }
    ],
    close: function() {
       
    }});
				return false;
			}
		}else{
			if(window.firstBookNow == false){
				var message ="<?php echo $tutorwillsend;?>";
				}else{
				var message ="<?php echo $tutotwillsendnoamount;?>";
			}
			var conf = confirm(message);
			var classcost = window.cost;
			if(conf == true)
			{
				$.getJSON('<?php echo Base_url("user/sendBookNowMessage");?>',{tid:tid, cost:classcost,schoolId:_data['schoolid']},function(msg){
						/*alert(msg);
						return false;*/
						//redirect to student dashboard page
						window.location.href = '<?php echo Base_url("user/dashboard");?>';
				});
			return;callback(false);
			}else{
			  
				return false;
			}
			lastClickedOnBook = false;
		 
		}
		return false;
	}//,4000);return false;
}}
</script>
<style>
.ui-button-text{background-color: #3399CC !important;color:white}
  #sendMessageView .content_main{ border-radius:0 !important; border:4px solid #3399CC;}
  
.ui-widget-content{/*border: 4px solid #0087d0 !important;    border-radius: 0 !important;*/ background:#fff; padding:15px;}
.ui-widget-header{ background:none; border:0 none !important;}
.ui-widget-header{ float:right;}
</style>