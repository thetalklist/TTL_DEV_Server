<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.


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
$arrVal = $this->lookup_model->getValue('74', $multi_lang);
$beepbox = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('75', $multi_lang);
$newbeepmsg = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('76', $multi_lang);
$subjecttext = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('77', $multi_lang);
$fromtxt = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('78', $multi_lang);
$datetxt = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('79', $multi_lang);
$deltext = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('80', $multi_lang);
$applytxt = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('326', $multi_lang);
$lmsgsettings = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('988', $multi_lang);
$Confirm = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('801', $multi_lang);
$Areusure = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('1030', $multi_lang);
$DeleteThis = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('412', $multi_lang);
$Cancel = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('479', $multi_lang);
$deleteSucc = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1192', $multi_lang);
$Inbox = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1193', $multi_lang);
$Sent = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1194', $multi_lang);
$Too = $arrVal[$multi_lang];

?>
<?php $this->layout->appendFile('javascript',"js/jquery-jtemplates.js");?>
<?php $this->layout->appendFile('javascript',"js/jquery.poshytip.min.js");?>
<?php $this->layout->appendFile('css',"css/cupertino/theme.css");?>
<?php $this->layout->appendFile('css',"css/search.css");?>
<?php 
// checks for quarantine users
if($profile['quarantine'] == 1){?>
	<script>
		alert("Your account has been made invisible to the membership. Either you have an incomplete profile (photo, video greeting, bio, rate, and open calendar sessions) or you have inappropriate content. Please edit so we can maintain a complete and professional profile for all visible tutors. Once updated, your profile may automatically become visible or else send an email to support@thetalklist.com.");
	</script>
	<style>
		.mod .bd{display:none;}
	</style>
<?php } ?>

<script>
function download(id)
{
	var url="<?php echo base_url('user/DownloadAttach/')?>"+"/"+id;
	window.open(url);
 
}
</script>
 


<div class="baseBox baseBoxBg clearfix">
    	
        <div class="content_main fr">
        	<div class="main_inner">
                <?php if($this->session->userdata['roleId']==4){
                 echo organization_menu($linkType,'i_prof');
                 }
				 else if($this->session->userdata['roleId']==5){
				 echo Affiliate_menu($linkType,'i_prof');
				 }
				 {
			    //echo profile_menu($linkType,'i_prof',$profile['uid']);
                }?>
                <!--/student_prof-->
                <div id="student_prof_Wp">
                    <div class="mod">
                       
                            <div class="content tle" style="padding-top:0px;"><h2><?php echo $beepbox; ?> 
							 <span style="color:#3399CC;font-size:14px;margin-left:10px;"><?php echo $this->session->userdata('succsend');
							$this->session->set_userdata('succsend', '');
							?></span>
							<?php $ul=$this->uri->segment(2);?>
							<a style="<?php if($ul=='sent'){ ?>font-weight:bold;<?php }?>font-size:19px;margin-left:10px;margin-right:80px;" class="msg-lnk" href="<?php echo base_url('user/sent');?>"><?php echo $Sent;?></a>
							<a style="<?php if($ul=='inbox'){ ?>font-weight:bold;<?php }?>font-size:19px;margin-left:10px;margin-right:10px;" class="msg-lnk" href="<?php echo base_url('user/inbox');?>"><?php echo $Inbox;?></a>
							</h2></div>
                       
                        <div class="bd">
					 
							<div class="search_rt_mid_t">
								<span class="search_rt_mid_t_lf lh30">
									<a class="aqua_btn_msg redRadiusBtn2 " style="color:white" href="<?php echo base_url('user/send_message');?>"><?php echo $newbeepmsg; ?></a>
								</span>
							 
								<div class="search_rt_mid_t_rt" style="float:right;">
									<div class="v_ajax_page"><?php echo $pagination;?></div>
								</div>
							</div>
							<table class="history_table f14">
								<thead>
									<tr><th width="3%"><!--<input type="checkbox"  class="idAll">--></th><th><?php echo $subjecttext; ?></th><th><?php echo $Too; ?></th><th><img style="width:14px;" src="<?php echo base_url('images/clip.png');?>" /></th><th><?php echo $datetxt; ?></th></tr>
								</thead>
								<tbody id="nbmesg">
									<?php
									$fullname = $profile['firstName'].' '.$profile['lastName'];
									//print_r($sents);
									if($sents !=array()){	
									for($i=0;$i<count($sents);$i++){?>
									
								
									<tr class="read" inboxId="<?php echo $sents[$i]['sentbox_id'];?>">
										<td><input type="checkbox" value="<?php echo $sents[$i]["sentbox_id"];?>" class="ids"></td>
										
										<td><a href="<?php echo base_url('user/ViewsentItem/id/'.$sents[$i]['sentbox_id']);?>" ><?php echo $sents[$i]['subject'];?></a></td>
										<td>
											 
											<p  <?php echo "style='color:#000000;font-weight:bold;'";  ?>><?php     echo $sents[$i]['username'];?></p>
											
											 
											 
										</td>
										<td style="width:10px;"><?php if($sents[$i]['attach'] !=''){?><img style="width:14px;cursor:pointer" onclick="download(<?php echo $sents[$i]['sentbox_id'];?>)" src="<?php echo base_url('images/clip.png');?>" /><?php }?></td>
										<td><div <?php  echo "style='color:#000000;font-weight:bold;'";   ?>><?php echo date( 'M d, Y | h:i a ' , outTime( $sents[$i]['createAt']) );?></div></td>
										
									<?php } }?> 
								</tbody>
								<tfoot>
									<tr><td colspan=5>
										<table>
											<tr>
										<td>
											<select id="applys" onchange="Myfucntion();">
												<option value="d"><?php echo $deltext; ?></option>
												<option value="s">Select all</option>
												<option value="u">Unselect all</option>
											</select>
											<a href="javascript:;"  class="aqua_apply_btn grayRadiusBtn delInbox" style="padding:0px 5px;line-height: 24px;height:24px;margin-right:0px !important; "><?php echo $applytxt; ?></a>
										</td>										
									</tr>
										</table>
									</td></tr>
									
								</tfoot>
							</table>
                        </div>
                    </div>
                </div>
                <!--/student_prof_Wp-->
            </div>
        </div>
        <!--/content_main-->
		<?php include dirname(__FILE__).'/leftSide.php';?>
    </div>
	
	<script>
	
	function Myfucntion()
	{
		if($('#applys').val() =='s'){
			$('.ids').each(function() { //loop through each checkbox
               // this.checked = true;  //select all checkboxes with class "checkbox1"              
			   $('.ids').attr("checked", "checked");
			   
            });
			
			}
			if($('#applys').val() =='u'){
			$('.ids').each(function() { //loop through each checkbox
               // this.checked = true;  //select all checkboxes with class "checkbox1"              
			   $('.ids').removeAttr("checked", "checked");
			   
            });
			
			}
	}
	</script>
	<script>
	window.delClickData = '';//save the param del data
	$(function(){
	
		$('a@[href=#]').attr('href','javascript:void(0)');
		$('.del').click(function(){
			
			//return false;
			var _tr = $(this).parents('tr');
			var _delId = _tr.attr('inboxId');
			var _data = {id:_delId}; 
			window.delTrObj = _tr;
			$('#dialog1').dialog({
			
				modal:true,
				resizable: false,
				buttons: {
					"<?php echo "Delete";?>": function() {
						delDo();
						$( this ).dialog( "close" );
					},
					<?php echo $Cancel;?>: function() {
						$( this ).dialog( "close" );
					}
				}
			})
		})
		$('.delInbox').click(function(){
		    
			 
			if($('#applys').val() =='d'){
			
			
			window.delTrObjs = [];
			$('.ids:checked').each(function(){
				window.delTrObjs.push($(this).parents('tr'));
			});
			 
			$('#dialog1').dialog({
				modal:true,
				resizable: false,
				buttons: {
					"<?php echo "Delete";?>": function() {
				
						delDom();
						$( this ).dialog( "close" );
					},
					<?php echo $Cancel;?>: function() {
						$( this ).dialog( "close" );
					}
				}
			})
			
			}
			
		})
		
		$('.forwardmsg').click(function(){
			var _forId = [];
			$('.ids:checked').each(function(){
				//alert($(this).parents('tr').attr('inboxId'));
				_forId.push($(this).parents('tr').attr('inboxId'));
			});
			var _data = {id:_forId}; 
			$.post('<?php echo base_url("user/forward_messages");?>',_data,function(msg){
				if (String == msg.constructor) {      
					eval ('var json = ' + msg);
				} else {
					var json = msg;
				}
				if(json.status){
					$('#dialog').html('Forward Success to '+json.email);
					$('.ids:checked').each(function(){
						$('.ids').removeAttr('checked');
					});
					$('#dialog').dialog({modal:true});
					
				}
				else{				
					$('#dialog').html(json.msg);
					$('#dialog').dialog({modal:true});
				}
				
			})
			
			
		})
		
	})
	function delDom(){
		var _delId = [];
		$.each(window.delTrObjs,function(k,v){
			_delId.push(v.attr('inboxId'));
		})
		var _data = {id:_delId}; 
		 
		$.post('<?php echo base_url("user/DeleteSentItem");?>',_data,function(msg){
			if (String == msg.constructor) {      
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			if(json.status){
				/*$('#dialog').html('<?php echo $deleteSucc;?>');
				$('#dialog').dialog({modal:true,resizable: false,buttons: { "Ok": function() { $(this).dialog("close"); } } 
});*/
				//window.delTrObj.remove();
				$.each(window.delTrObjs,function(k,v){
					v.remove();
				})
				window.delTrObjs = [];
			}
			else{				
				$('#dialog').html(json.msg);
				$('#dialog').dialog({modal:true});
			}
			//$('#send').attr('buttontype','done');
		})	
	}
	function delDo(){
				
		var _delId = window.delTrObj.attr('inboxId');
		var _data = {id:_delId}; 
		
		$.post('<?php echo base_url("user/DeleteSentItem");?>',_data,function(msg){
			if (String == msg.constructor) {      
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			if(json.status){
				//$('#dialog').html('<?php echo $deleteSucc;?>');
				//$('#dialog').dialog({modal:true,resizable: false});
				window.delTrObj.remove();
			}
			else{				
				$('#dialog').html(json.msg);
				$('#dialog').dialog({modal:true});
			}
			//$('#send').attr('buttontype','done');
		})		
	}
	</script>
	
	<div id="dialog1" title="<?php echo $Confirm;?>" style="display:none">
		<p><?php echo  "Please confirm deletion.";?></p>
	</div>
	
    <style>
	.read0 td a{color:#000;}
    .redRadiusBtn2 { padding:0 10px;}
    </style>
