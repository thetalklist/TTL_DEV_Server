<!DOCTYPE html>
<html>
<head>
<title>The Talk List  &shy;  Your Social e &shy; Learning Network</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" >
<meta name="robots" content="noindex,nofollow">
<!-- CSS START -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/testvs/html5reset-1.6.1.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/testvs/tools.css');?>">
<!-- CSS END -->
<!--[if lt IE 9]>
	<script src="<?php echo base_url('js/testvs/html5.js');?>"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/testvs/classroom-new.css');?>">
<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

<link type="image/x-icon" href="<?php echo base_url('talklist.ico');?>" rel="bookmark">
<link type="image/x-icon" href="<?php echo base_url('talklist.ico');?>" rel="shortcut icon">
<style type="text/css">
 .popUpDiv{
        border-radius: 5px;
    }
.popup-close {
    width:30px;
    height:25px;
    padding-top:4px;
    display:inline-block;
    position:absolute;
    top:0px;
    right:-95px;
    transition:ease 0.25s all;
    -webkit-transform:translate(50%, -50%);
    transform:translate(50%, -50%);
    border-radius:1000px;
    background:rgba(0,0,0,0.8);
    font-family:Arial, Sans-Serif;
    font-size:20px;
    text-align:center;
    line-height:100%;
    color:white;
}
 
 .popup-close:hover {
   color: white !important;
}
</style>
<style>
#Room_player1{width:160px;height:130px;border:1px solid red;}
#Room_player{border:1px solid gray;}
#audio_div{padding-left: 10px;padding-top: 150px; }
.opentok-hardware-setup-label{display:none;}
.opentok-hardware-setup-selector{display:none;}
 .opentok-hardware-setup .opentok-hardware-setup-preview {
  width: 220px;
}
  .opentok-hardware-setup .opentok-hardware-setup-activity-bg {
  height: 14px;
  background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg%20viewBox%3D%22-1%200%2010%2014%22%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20x%3D%220%22%20y%3D%220%22%20width%3D%2210px%22%20height%3D%2214px%22%3E%3Cg%3E%3Crect%20x%3D%220%22%20y%3D%220%22%20width%3D%227%22%20height%3D%2214%22%20fill%3D%22%23ffffff%22%20rx%3D%222.415%22%20ry%3D%222.415%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E');
  /* <svg viewBox="-1 0 10 14" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" width="10px" height="14px"><g><rect x="0" y="0" width="7" height="14" fill="#ffffff" rx="2.415" ry="2.415"/></g></svg> */
}

.opentok-hardware-setup .opentok-hardware-setup-activity-fg {
  height: 14px;
  background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg%20viewBox%3D%22-1%200%2010%2014%22%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20x%3D%220%22%20y%3D%220%22%20width%3D%2210px%22%20height%3D%2214px%22%3E%3Cdefs%3E%3ClinearGradient%20id%3D%22gradient1%22%20x1%3D%2250%25%22%20y1%3D%220%25%22%20x2%3D%2250%25%22%20y2%3D%22100%25%22%3E%3Cstop%20stop-color%3D%22%23acd24c%22%20stop-opacity%3D%221%22%20offset%3D%220%25%22%2F%3E%3Cstop%20stop-color%3D%22%2397d000%22%20stop-opacity%3D%221%22%20offset%3D%22100%25%22%2F%3E%3C%2FlinearGradient%3E%3C%2Fdefs%3E%3Cg%20id%3D%22Layer%25201%22%3E%3Crect%20x%3D%220%22%20y%3D%220%22%20width%3D%227%22%20height%3D%2214%22%20fill%3D%22url(%23gradient1)%22%20rx%3D%222.415%22%20ry%3D%222.415%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E');
  /* <svg viewBox="-1 0 10 14" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" width="10px" height="14px"><defs><linearGradient id="gradient1" x1="50%" y1="0%" x2="50%" y2="100%"><stop stop-color="#acd24c" stop-opacity="1" offset="0%"/><stop stop-color="#97d000" stop-opacity="1" offset="100%"/></linearGradient></defs><g id="Layer%201"><rect x="0" y="0" width="7" height="14" fill="url(#gradient1)" rx="2.415" ry="2.415"/></g></svg> */
}
</style>

<script type="text/javascript" src="<?php echo base_url('js/jquery.1.7.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/popupnew.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery-jtemplates.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.placeholder.js');?>"></script>
<script src="//static.opentok.com/v2/js/opentok.js"></script>  
<script src="<?php echo base_url('js/opentok-hardware-setup.js');?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.8.23/themes/base/jquery-ui.css" type="text/css" />

<script type="text/javascript">
$(function(){
	$('#Room_layer').height($(document).outerHeight());
	$("#Room_player1").css('position','absolute');
	$("#Room_player1").css('top',$('#sRoom_player').offset().top+10);
	$("#Room_player1").css('left',$('#sRoom_player').offset().left + 485);
	$('.Room_wrap.posR .spc50').css('line-height','50px');
	$('.Room_wrap.posR .spc50').css('font','14px');
	$('.Room_wrap.posR .spc50').css('color','red');
});
</script>
<style>
.ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-resizable
{
border:4px solid !important;
}
</style>
<script>
window.onload = function() {

	var a="<?php echo $_GET["step"];?>";
	var rollId='<?php echo $this->session->userdata('roleId'); ?>'; 
	var x='<?php echo $this->session->userdata('firstTimeRegister'); ?>'; 
	if(a==4 && a!='' && rollId==0 && x !='')
	{
		$('#firstTour').dialog({
			modal:true,
			width:'994px',
			resizable:false
		});
		$('.ui-dialog').wrap('<div class="main_popupdiv3"></span>' );
	}
	if(a ==3 && rollId >=1 && rollId <=3 && x !='') 
	{
		window.scrollTo(0,700);		
		$('#SecondTour').dialog({
			modal:true,
			width:'994px',
			resizable:false
		});
		$('.ui-dialog').wrap('<div class="main_popupdiv3"></span>' );
	}
			
};
</script>
<style>
.ui-widget-content{border: 4px solid #0087d0;border-radius: 0 !important; background:#fff; padding:15px;}
.ui-widget-header{ background:none; border:0 none !important;}
.ui-widget-header{ float:right;}
.student-high .gray-panel{z-index: 999 !important;}
</style>
<link href="<?php echo base_url('css/audioPlayer/jplayer.blue.monday.css');?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/popup-css.css">
<script type="text/javascript" src="<?php echo base_url('js/audioPlayer/jquery.jplayer.min.js');?>"></script>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function(){
	//jQuery.noConflict();
	jQuery("#jquery_jplayer_1").jPlayer({
		ready: function () {
			jQuery(this).jPlayer("setMedia", {
				mp3:"<?php echo base_url('css/audioPlayer/test_sound.mp3');?>"
			});
		},
		swfPath: "<?php echo base_url('js/audioPlayer/');?>",
		supplied: "mp3",
		wmode: "window"
	});
	jQuery("#jquery_jplayer_2").jPlayer({
			ready: function () {
				//alert('ready');
				jQuery("#jquery_jplayer_2").jPlayer("setMedia", {
					mp3:"<?php echo base_url('css/audioPlayer/Blop.mp3');?>"
				}).jPlayer("play");
			},
			swfPath: "<?php echo base_url('js/audioPlayer/Jplayer.swf');?>",
			supplied: "mp3",
			wmode:"window",
			preload: "auto",
			errorAlerts: false,
			warningAlerts: false,
			solution: "html,flash",
			autoplay: true,
			
	});
});
//]]>
</script>
<!--audio player end-->

<!--tabs start-->
<script src="<?php echo base_url('css/SpryAssets/SpryTabbedPanels.js');?>" type="text/javascript"></script>

<!--tabs end-->

<link rel="stylesheet"  href='<?php echo base_url('css/fileuploader.css');?>'  type="text/css" />
<script  src='<?php echo base_url('js/ajaxupload.3.6.js');?>'  type="text/javascript" ></script>

<!-- Opentok WebRTC js ---->
<script type="text/javascript">
	
	var apiKey = '<?php echo $apiKey;?>';
    var sessionId = '<?php echo $sessionId;?>';
    var token = '<?php echo $token;?>';
	
	var uid = '<?php echo $uid;?>';
	var roleId = <?php if($this->session->userdata('roleId') !='') echo $this->session->userdata('roleId'); else echo '1'; ?>;
	
	var user = <?php echo json_encode($user);?>;
	var _setintval = '';
	var initStatus = false;
	var _getedTime = 0;
	var publisher;
	var microphones = [];
	var microphoneGain = 100;
	var timthumbUrl = '<?php echo base_url()."timthumb.php?src=";?>';
	var profileImgNull = '<?php echo base_url()."images/base/hd-pic.png"; ?>';
	
	function showImage(src,width,height,obj){
	//alert(obj);
	/*alert(width);
	alert(height);*/
		if(height>500){ 
			width = width/2.5;
			height = height/2.5;
		}
		$('.gray-panel').css('z-index', '1');
		$('body').addClass('vspopup');
		$('#dialog2').children('img').remove();
		$('#dialog2').children('p').remove();
		$('#dialog2').children('a').remove();
		$('#dialog2').append('<img/>');
		$('#dialog2').children('img').attr('src', src).width(width).height(height);
		$('#dialog2').append('<p>&nbsp;</p>');
		var _str = $("<div></div>").append($(obj).clone()).html();
		window.shareImage = _str;
		//alert(window.shareImage);
		 $("#imgsrc").val(window.shareImage);
		$('#dialog2').append('<a href="javascript:;" class=" Btn Btn_blue  w66" onclick="shareImageFunction();" >Share It</a>');
		//$('.send_chat_ipt').val($('.send_chat_ipt').val() + _str);
		
		$('#dialog2').dialog({modal:true,width:'700',height:'500'});
	}

	function shareImageFunction (){
	
	 
		$('.send_chat_ipt').val(window.shareImage);
		$('#chatSend').trigger('click');
		$('#dialog2').dialog('close');
	}
	$(document).ready(function(){
		


		$('.stars a').hover(function(){
			var _aObj = $(this);
			var _star = _aObj.parent('.stars');
			var _index = _aObj.index() +1;
			/*console.info(_index, _aObj.index( _aObj.index()));
			$('a:lt('+_index+')',_star).removeClass('off').removeClass('on').addClass('on');
			*/
			setStars(_star,_index);
		})
		$('#rateButton').click(function(){
			var _data = {};
			$('.stars .on:last','.ratelist').each(function(){
				var _obj = $(this);
				//console.info(_obj.parent('.stars').attr('id'));
				_data[_obj.parent('.stars').attr('id')] = _obj.html();
			});
			_data['sendToAdmin'] = $('#sendToAdmin:checked').get(0)?1:0;
			_data['cid'] = cid;
			_data['msg'] = $('#msg').val();
			$.post('<?php echo base_url("classroom/feedback");?>',_data,function(result){
				if (String == result.constructor) {      
					eval ('var result = ' + result);
				}
				if(typeof(result.error) == 'undefined'){
					alert('Error..');
					return;
				}
				else if( result.error){
					alert(result.msg);
					return;
				}
				else{
					feedbacked = true;
					$('#dialog1').dialog('close');
					alert('Submitted, Thank You!');
					document.location.href="<?php echo base_url('user/calendar');?>";
				}
			})
		})
		//addMsg('Waiting for Vee-Session to start..');
		//addMsg('?_sessionId=<?php echo $sessionId;?>');
		if(uid == ''){
			addMsg('You must login first.');
			setTimeout(function(){
				document.location.href="<?php echo base_url('user/login');?>";
			},3000)
			return;
		}
		/*if(sessionId == ''){
			if (component.audioSource() && component.videoSource()) {
				addMsg('Welcome to the Test Vee-session. Play with all our widgets!');
				return;
			} else {
				addMsg('Sorry, please ensure your system devices (mic, webcam, speakers) are connected and enabled.');
				return;
			}
		}*/
		//console.info(_setintval);
	})
	function setStars(starObj,number){
		$('a',starObj).removeClass('off').removeClass('on').addClass('off');
		$('a:lt('+number+')',starObj).removeClass('off').addClass('on');
	}
	var showWithOutPay = false;

	function feedBack(){
		if(typeof(user.type)!='undefined' && user.type=='s' && !feedbacked) {
			$('#dialog1').dialog({
					modal:true,
					width:'430px'
			});
		}
	}
	function profileImgChatThumb(src){
		//alert(src);
		if(src=='' || src=="\'\'" || src=="&#39;&#39;"){
			
			//return timthumbUrl + profileImgNull + '&h=30&w=40&zc=0';
			return profileImgNull;
		}
		return src;
	}
	function playSound() {
		
		var soundfile = "<?php echo base_url('css/audioPlayer/Blop.mp3');?>";
		var soudHTML = "<embed src=\""+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
		$("#soundplayeach").html(soudHTML);
		
	}
	function addMsg(msg,imgClass,img,count){
		if(typeof(imgClass) =='undefined'){
			imgClass = '';
		}
		//alert(img)
		if(typeof(img) =='undefined' || img == ''){
			img = '<?php echo Base_url('images/base/chat.png');?>';
		}else{
			img = '<?php echo base_url().'uploads/images/thumb/';?>'+img;
		}
		
		//alert(msg);			
			var isFound = (msg).search(/http/i);
			 //	alert(isFound);
				
			//var a = document.createElement('a');
//var linkText = document.createTextNode("test");
//a.appendChild(linkText);
//a.title = "my title text";
//a.href = msg;


			 //alert(isFound);
				
			//$('.cent-bg').append(a);
			  
			 if(isFound==0)
{			 
			  var _str = '<li>';
		_str += '<span class="user_hdpic"><img src="'+profileImgChatThumb(img)+'" width="34" height="34" class="'+imgClass+'"/></span>';
		_str += '<span class="Room_feed"><span class="cent-bg"><p>';
		_str +='<a href="'+msg+'" target="_blank">'+msg+'</a>';
		_str += '</p></span><span class="botm-bg">&nbsp;</span>';
		_str+='</li>';
			  }
			 
	
		
		
		//alert(roleId);
		// sender and receiver condition
        // if ( roleId == 0)
		//if (count % 2 === 0)
		//{
		
		
		
		else
		{
		
		
		var _str = '<li>';
		_str += '<span class="user_hdpic"><img src="'+profileImgChatThumb(img)+'" width="34" height="34" class="'+imgClass+'"/></span>';
		_str += '<span class="Room_feed"><span class="cent-bg"><p>';
		_str += msg;
		_str += '</p></span><span class="botm-bg">&nbsp;</span>';
		_str+='</li>';
		}
			//alert(_str);
		
		//}
		//else 
		//{
		//var _str = '<li class="gary-row">';
		//_str += '<span class="Room_feed"><span class="cent-bg"><p>';
		//_str += msg;
		//_str += '</p></span><span class="botm-bg">&nbsp;</span></span><span class="user_hdpic"><img src="'+profileImgChatThumb(img)+'" width="34" height="34" class="'+imgClass+'"/></span>';
		//_str += '</span>';
		//_str+='</li>';
		//}
		
		
		//var _str = '<li>';
		//_str += '<span class="user_hdpic"><img src="'+profileImgChatThumb(img)+'" width="34" height="34" class="'+imgClass+'"/></span>';
		//_str += '<span class="Room_feed"><span class="cent-bg"><p>';
		//_str += msg;
		//_str += '</p></span><span class="botm-bg">&nbsp;</span>';
		//_str+='</li>';
		$('.Room_chat_view ul').append(_str);
		$(".Room_chat_view ").scrollTop($(".Room_chat_view ul").height()) ,$(".Room_chat_view ul").height();
		
		var elm = document.getElementById('mydiv');
	try
		{
		elm.scrollTop = elm.scrollHeight;
		}
	catch(e)
		{
		var f = document.createElement("input");
		if (f.setAttribute) f.setAttribute("type","text")
		if (elm.appendChild) elm.appendChild(f);
		f.style.width = "0px";
		f.style.height = "0px";
		if (f.focus) f.focus();
		if (elm.removeChild) elm.removeChild(f);
		}
		
		jpplay();
		playSound();
		
		
		
	}
    
	function jpplay()
	{	
		/*
		jQuery("#jquery_jplayer_2").jPlayer({
			ready: function () {
				//alert('ready');
				jQuery("#jquery_jplayer_2").jPlayer("setMedia", {
					mp3:"<?php echo base_url('css/audioPlayer/Blop.mp3');?>"
				}).jPlayer("play");
			},
			swfPath: "<?php echo base_url('js/audioPlayer/Jplayer.swf');?>",
			supplied: "mp3",
			wmode:"window",
			preload: "auto",
			errorAlerts: true,
			warningAlerts: false,
			solution: "html,flash",
			autoplay: true,
			
		});
		setTimeout(function(){
			jQuery("#jquery_jplayer_2").jPlayer("play");
		}, 2000);*/
		jQuery("#jquery_jplayer_2").jPlayer("play");
		//jQuery("#jquery_jplayer_1").jPlayer("play");
		
		//jQuery("#jquery_jplayer_2").jPlayer("play");
		//jQuery('.jp-play').trigger('click');
		
	}

	
    if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS) 
	{
		//alert("You don't have the minimum requirements to run this application."+ "Please upgrade to the latest version of Flash.");
		//alert("You must use one of the supported browsers to run our Vee-session:  Firefox, Chrome, or Opera.  Internet Explorer is not supported at this time.");
		alert("You must use one of the supported browsers to run our Vee-session:  Firefox, Chrome, or Opera.  If you continue with Internet Explorer, you will be prompted to install the Google Frame plugin.");
	} else 
	{
		if(sessionId == ''){
			//addMsg('You do not have class recent.');
		}
		
		TB.setLogLevel(TB.DEBUG);
		TB.addEventListener("exception", exceptionHandler);
		session = TB.initSession(sessionId);
		
		// Add event listeners to the session
		session.addEventListener("sessionConnected", sessionConnectedHandler);
		//session.addEventListener("streamCreated", streamCreatedHandler);
		//session.addEventListener("streamDestroyed", streamDestroyedHandler);
		//session.addEventListener("streamPropertyChanged", streamPropertyChangedHandler);
	}
	
	function exceptionHandler(event) {
		alert(event.code)
		alert("Exception:" + event.code + ". " + event.title + ". " + event.message);
	}
	
	function sessionConnectedHandler(event) 
	{
		session.connect(apiKey, token);
		//addMsg('connected to the server...');
	}
	
	function turnOffMyVideo() 
	{
		if (publisher) {
			session.unpublish(publisher);
		}
		publisher = null;
		//addMsg('disconnected...');
		//TECHNO-SANJAY  changes 10 July 2013
		$('#publisherContainer').html('');
		$('#publisherContainer').attr('style','');
		
		//var newDiv = document.createElement("div");
    	//newDiv.id = "publisherContainer";
    	//document.getElementById("Room_player").appendChild(newDiv);
		
		showTest('sRoom_player');
	}

	function turnOnMyVideo() {
		//addMsg('connecting wait...');
		//addMsg('connected to the server...');
		var browserName=navigator.appName;
		var det = IsGCFInstalled();
		//alert(det);
		
		//alert(window.chrome);
		
		//alert(navigator.plugins[0].description);
		//alert(window.chrome)
		if(browserName=="Microsoft Internet Explorer" && window.chrome == undefined)
		{
			alert('You must use one of the supported browsers to run our Vee-session:  Firefox, Chrome, or Opera.  If you continue with Internet Explorer, you will be prompted to install the Google Frame plugin.');
		
		}else{
			hideTest('sRoom_player');
			//addMsg('Please Click on allow to Test Video');
			
			var div = document.createElement('div');
			div.setAttribute('id', 'publisher');
			
			// checks for publisher container have or not
			if(document.getElementById('publisherContainer'))
			{
				var publisherContainer = document.getElementById('publisherContainer');  
				publisherContainer.appendChild(div);
			}else{
				var newDiv = document.createElement("div");
				newDiv.id = "publisherContainer";
				document.getElementById("Room_player").appendChild(newDiv);
				
				var publisherContainer = document.getElementById('publisherContainer');  
				publisherContainer.appendChild(div);
			}
			var publishProps = {height:452, width:671};
			publisher = TB.initPublisher(apiKey, 'publisherContainer', publishProps);
		}
	}
	function IsGCFInstalled() {

		  try {

			var i = new ActiveXObject('ChromeTab.ChromeFrame');
			if (i) {
			  return true;
			}
		  } catch(e) {
			//log('ChromeFrame not available, error:', e.message);
			// squelch
		  }

		  return false;

	}
	function turnOnMyAudio(){
		//alert('hi');
		if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS) {
			alert("You don't have the minimum requirements to run this application."
				  + "Please upgrade to the latest version of Flash.");
		} else {
			var parentDiv = document.getElementById("audPublisherContainer");
			var replacementDiv = document.createElement("div"); // Create a div for the publisher to replace
			replacementDiv.id = "opentok_publisher";
			parentDiv.appendChild(replacementDiv);
			var publisherProperties = {height:130, width:160};
			publisherProperties.publishVideo = false;
			//addMsg('Please Click on allow to Test Audio');
			
			//publisher = TB.initPublisher(replacementDiv.id);
			publisher = TB.initPublisher(apiKey, parentDiv.id, publisherProperties);
			//publisher.publishAudio(true);
			//publisher.detectMicActivity(true);
			publisher.addEventListener("devicesDetected", devicesDetectedHandler);
			publisher.addEventListener("microphoneActivityLevel", microphoneActivityLevelHandler)


			publisher.detectDevices();
			hideTest("manageDevicesBtn");
			//manageDevices();
		}
	}
	
	function turnOffMyAudio() 
	{
		publisher.publishAudio(false);
		if (publisher) {
				session.unpublish(publisher);
			}
		publisher = null;
		//addMsg('disconnected...');
		//var newDiv = document.createElement("div");
    	//newDiv.id = "audPublisherContainer";
		$('#call-status').after('<br /><br /><div id="audPublisherContainer" class="audPublisherContainer"></div>');
    	//document.getElementById("Room_player").appendChild(newDiv);
		showTest('sRoom_player');
	}
	
	function devicesDetectedHandler(event) {
		//alert('hi')
		var microphones = event.microphones;
		var micSelect = document.getElementById("mics");
		micSelect.innerHTML = "";
		for (i = 0; i < microphones.length; i++) {
			var micOption = document.createElement("option");
			var micName = microphones[i].name;
			micOption.setAttribute("value", micName);
			micOption.innerHTML = micName;
			micSelect.appendChild(micOption);
			if (micName == event.selectedMicrophone.name) {
				micSelect.selectedIndex = i;
			}
		}
		document.getElementById("call-status").innerHTML = "Devices detected.";
		//showTest("mics");
		//addMsg('Click on Manage Devices to See the Mic Activity');
		showTest("manageDevicesBtn");
	}
	
	
	function microphoneActivityLevelHandler(event) {
	//alert('hi');
		var volumeIndictatorMask = document.getElementById("volumeIndicatorMask");
		volumeIndictatorMask.style.width = (100 - event.value * microphoneGain / 100) + "%";
	}
		
	function detectDevices() {
		hideTest("mics");
		publisher.detectDevices();
	}

	// Called when the user clicks the manageDevicesBtn button
	function manageDevices() {
		showTest("manageDevicesDiv");
		publisher.detectMicActivity(true);
	}

	// Called when the user clicks the manageDevicesBtn button
	function closeManageDevices() {
		publisher.detectMicActivity(false);
		hideTest("manageDevicesDiv");
	}

	function setMicrophone() {
		var micsSelect = document.getElementById("mics");
		var micName = micsSelect.options[micsSelect.selectedIndex].value;
		publisher.setMicrophone(micName);
	}
			
	function showPanel(id){
		$('.search_type').hide();
		$('#'+id).slideUp().show('slow');
	}
	
	function showTest(id){
		$('#'+id).show('slow');
		
	}
	
	function hideTest(id){
		$('#'+id).hide('slow');
		
	}

	function streamCreatedHandler(event) {
		var stream = event.streams.shift();
		if(stream.connection.connectionId == session.connection.connectionId){
			window.setInterval(function() {recheck("publisher")}, 1000);
			//return false;
		}
		else {
			if( typeof($('#sRoom_player').get(0))=='undefined'){
				$('#Room_player').html('<div id="sRoom_player"></div>')
			}
			session.subscribe(stream, "sRoom_player", {height:$('#Room_player').height(), width:$('#Room_player').width()});
			window.setInterval(function() {recheck("subscriber")}, 1000);
			
			//addMsg(user['name']+' connected...');
		}
	}
	
	function streamDestroyedHandler(event) {
		//addMsg('disconnected...');
	}
	
	function recheck(type) {
		if (type == "publisher")
		{
			if ($("object", "#Room_player1").length > 0) {
				var id = $("object", "#Room_player1").attr("id");
				checkP2P(id);
			}
		}
		else
		{
			if ($("object", "#Room_player").length > 0) {
				var id = $("object", "#Room_player").attr("id");
				checkP2P(id);
			}
		}
	}
	
	function checkP2P(object_id) {
		//console.info(object_id);
		var element = document.getElementById(object_id);
		if (element)
		{
			if (!element.fetchData)
			{
				//swf hasn't loaded completely, check again in .5 second
				setTimeout('checkP2P("' + object_id + '");', 1000);
				return false;
			}
			var data = element.fetchData();
			var test = eval($(data).find("p2p").text()); //this will return true or false
			
			var new_status = "false";
			var new_color = "#ff7373";
			if (test)
			{
				new_status = "true"
				new_color = "#80ea69";
			}
			
			var status_container = $("#" + object_id).prev("div");
			//addMsg(new_status);
			status_container.text("P2P Status: " + new_status);
			status_container.css("background-color", new_color);
		}
		else
		{
			
		}
	}
	
	function exceptionHandler(event) {
		alert("Exception: " + event.code + "::" + event.message);
	}

	
	
	// $(document).ready(function() {
	// $('.send_chat_ipt').hover(function(){
	//alert('ol');
	
	 // var myimgsrc = $('#imgsrc').val();
	
	// var src = $('.send_chat_ipt').val();
	//alert(src);
	
	// var pval = $('.cent-bg p').val();
	// alert(pval);
	
	
	//var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
//img.attr('src', src);
//img.attr('width', "2.5");
//img.attr('height', "2.5");
//img.appendTo('.cent-bg');

// window.shareImage = img;

// var img = $('<img />').attr({ 'id': 'Myid', 'src': src, 'alt':'MyAlt' }).appendTo($('.cent-bg'));

//var elem = new Element('img', 
           //  { src: src, alt: 'alternate text', width:'10 px' ,height:'10 px'}); 
 //$('.cent-bg').appendTo(elem);
//elem.appendTo('.cent-bg');

	//$('#dialog2').children('img').remove();
	//	$('#dialog2').children('p').remove();
		//$('#dialog2').children('a').remove();
		//$('#dialog2').append('<img/>');
		//$('#dialog2').children('img').attr('src', src).width(2.5).height(2.5);
		//$('#dialog2').append('<p>&nbsp;</p>');
		//var _str = $("<div></div>").append($('this').clone()).html();
		//window.shareImage = _str;
		//alert(window.shareImage);
		//$('.send_chat_ipt').val(window.shareImage);
		// $('#chatSend').trigger('click');
		// $('#dialog2').dialog('close');
	
	// });
// });
</script>

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
$arrVal 	= $this->lookup_model->getValue('3', $multi_lang);
$vsearch	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('327', $multi_lang);
$vtestinstruction	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('87', $multi_lang);
$vdescription	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('342', $multi_lang);
$vtestinstructiondetails	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('343', $multi_lang);
$vtestvideo	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('344', $multi_lang);
$vclicktotestvideo	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('345', $multi_lang);
$vinstruction	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('346', $multi_lang);
$vtestvideodescription	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('347', $multi_lang);
$vtestaudio	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('348', $multi_lang);
$vclosevideotest	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('349', $multi_lang);
$vclicktotestaudio = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('350', $multi_lang);
$vaudiodescription = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('351', $multi_lang);
$vcloseaudiotest = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('352', $multi_lang);
$vimages = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('353', $multi_lang);
$vsearchimage = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('354', $multi_lang);
$vtranslate = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('355', $multi_lang);
$vdictionary = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('356', $multi_lang);
$vsearchdictionary = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('357', $multi_lang);
$vdefine = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('358', $multi_lang);
$vleave = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('361', $multi_lang);
$vchatwindow = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('34', $multi_lang);
$vsend = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('678', $multi_lang);
$vnewsfeed = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('679', $multi_lang);
$vsearchnews = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('680', $multi_lang);
$vgetnews = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('681', $multi_lang);
$vdragdrop = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('717', $multi_lang);
$vaudiomute = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('718', $multi_lang);
$vvideomute = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('719', $multi_lang);
$vupload = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1040', $multi_lang);
$vdetectingdevice = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1041', $multi_lang);
$vselectedmicrophone = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1042', $multi_lang);
$vclickonplay = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1043', $multi_lang);
$vupdaterequired = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1044', $multi_lang);
$vtoplaythemedia = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1045', $multi_lang);
$vflashplugin = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1046', $multi_lang);
$vplay = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1047', $multi_lang);
$vpause = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1048', $multi_lang);
$vstop = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1049', $multi_lang);
$vmute = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1050', $multi_lang);
$vunmute = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1051', $multi_lang);
$vmaxvolume = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1052', $multi_lang);
$vrepeat = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1053', $multi_lang);
$vrepeatoff = $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1130', $multi_lang);
$TestScenario = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1130', $multi_lang);
$TestScenario = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('755', $multi_lang);
$Credits = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1150', $multi_lang);
$PayCredits = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1151', $multi_lang);
$StepFive = $arrVal[$multi_lang];


$arrVal 	= $this->lookup_model->getValue('1143', $multi_lang);
$LiveVideo = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1145', $multi_lang);
$PractOr = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1147', $multi_lang);
$ChromeOr = $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('1149', $multi_lang);
$StepFour = $arrVal[$multi_lang];


$arrVal 	= $this->lookup_model->getValue('1143', $multi_lang);	$LiveVideo 	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1145', $multi_lang);	$PracitsOr 	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1147', $multi_lang);	$ChromeBrowser 	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1149', $multi_lang);	$Stepfour 	= $arrVal[$multi_lang];
$arrVal 	= $this->lookup_model->getValue('1166', $multi_lang);	$YouMustHave 	= $arrVal[$multi_lang];

?>

<body>
<div class="Room_wrap posR">
	<div class="blue-bg">
		<div class="Room_bd clearfix">
			<br><br>
            <br><br>
			<div class="str-info"></div>
                <div class="Room_view f1">
					<div id="Room_player" >
						<div id="publisherContainer"></div>
						<div  id="sRoom_player"><div>
							<div id="hardware-setup"></div>
						</div>
						<script type="text/javascript">
						var element = document.querySelector('#hardware-setup');
						var component = createOpentokHardwareSetupComponent(element, {
						  insertMode: 'append'
						}, function(error) {
							if (error) {
								console.error('Error: ', error);
								document.querySelector('#hardware-setup').innerHTML = '<strong>Error getting ' + 'devices</strong>: ' + error.message;
								return;
							}
							/*var button = document.createElement('button');
							button.onclick = component.destroy;
							button.appendChild(document.createTextNode('Destroy'));
							element.appendChild(button);*/
							if (component.audioSource() && component.videoSource()) {
								$(".vis-online-logo").show();
							} else if(!component.videoSource()) {
								$(".veeses-auoimg").show();
							}
							
							if(sessionId == ''){
								if (component.audioSource() && component.videoSource()) {
									addMsg('Welcome to the Test Vee-session. Play with all our widgets!');
									return;
								} else {
									addMsg('Sorry, please ensure your system devices (mic, webcam, speakers) are connected and enabled.');
									return;
								}
							}
						});
						</script>
					</div>
					<div id="audio_div" style="display:none">
						<div id="jquery_jplayer_1" class="jp-jplayer"></div>
						<div id="jp_container_1" class="jp-audio">
							<div class="jp-type-single">
								<div class="jp-gui jp-interface">
									<ul class="jp-controls">
										<li><a href="javascript:;" class="jp-play" tabindex="1"><?php echo $vplay; ?></a></li>
										<li><a href="javascript:;" class="jp-pause" tabindex="1"><?php echo $vpause; ?></a></li>
										<li><a href="javascript:;" class="jp-stop" tabindex="1"><?php echo $vstop; ?></a></li>
										<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute"><?php echo $vmute; ?></a></li>
										<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"><?php echo $vunmute; ?></a></li>
										<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume"><?php echo $vmaxvolume; ?></a></li>
									</ul>
									<div class="jp-progress">
										<div class="jp-seek-bar">
											<div class="jp-play-bar"></div>
										</div>
									</div>
									<div class="jp-volume-bar">
										<div class="jp-volume-bar-value"></div>
									</div>
									<div class="jp-time-holder">
										<div class="jp-current-time"></div>
										<div class="jp-duration"></div>

										<ul class="jp-toggles">
											<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat"><?php echo $vrepeat; ?></a></li>
											<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off"><?php echo $vrepeatoff; ?></a></li>
										</ul>
									</div>
								</div>
								<div class="jp-title">
									<ul>
										<li><?php echo $vclickonplay; ?></li>
									</ul>
								</div>
								<div class="jp-no-solution">
									<span><?php echo $vupdaterequired; ?></span>
									<?php echo $vtoplaythemedia; ?> <a href="https://get.adobe.com/flashplayer/" target="_blank"><?php echo $vflashplugin; ?></a>.
								</div>
							</div>
						</div>
					</div>
		
		
		
		
		 <!-- MIC TESTING START-->
				
				<div id="mic_div" style="display:none">
           <span id="call-status" style="color:#FFF"><strong><?php echo $vdetectingdevice; ?></strong></span>
             <br /><Br />
            <div id="audPublisherContainer" class="audPublisherContainer"></div>
            
            <br /><Br />
            <div id="links" style="height:22px">
                <input type="button" class="Btn Btn_red w140" value="Manage Devices" id ="manageDevicesBtn" onClick="manageDevices()" />
            </div>
            
            <div id="manageDevicesDiv" style="display:none; width: 260px; border:2px solid red; margin-top:25px;">
                <label style="color:#FFF"><strong><?php echo $vselectedmicrophone;?>:</strong></label>
                
                <select id="mics" class="mics" onChange="setMicrophone()"></select>
                <div style="background-color:#F00">
                    <div id="volumeIndicator" class="volume" style="width:100%; height:20px; margin-right:0; border:1px solid">
                        <div id="volumeIndicatorMask" style="position:relative; float:right; height:20px; width:100%; background-color:black"></div>
                    </div>
                    </div>
                <br/><br/>        
                
                <input type="button" class="Btn Btn_red w140" value="Close Devices" onClick="javascript:closeManageDevices()" style="display:block"/>
            </div>
          </div> 
           <!--MIC TESTING END-->
		   
		
		
		
		
		
		
		
        		
				   </div>
				   
				   
					<div class="leaveRoom">
                    	<!--<a href="#" class="icon3 tooltip">&nbsp;<span class="classic"><?php echo $vvideomute; ?></span></a>
                    	<a href="#" class="icon2 tooltip">&nbsp;<span class="classic"><?php echo $vaudiomute; ?></span></a>-->
						<?php $a=$this->session->userdata['uid'];
						
						$arg="Join";
						?>
						<?php if($a==''){?>
						<a href="<?php echo Base_url();?>" class="icon1 tooltip">&nbsp;<span class="classic"><?php echo $vleave; ?></span></a>
						<?php }else {?>
                    	<a href="<?php echo Base_url('user/dashboard');//Base_url('user/calendar/uid/'.$a.'/'.$arg);?>" class="icon1 tooltip">&nbsp;<span class="classic"><?php echo $vleave; ?></span></a>
						<?php }?>
                    </div>
                    <div class="vis-logo"><img alt="video-img" src="<?php echo base_url('images/testvs/ttl-vee-logo.png');?>"></div>
					<div class="vis-online-logo" style="display:none;"><img alt="video-img" src="<?php echo base_url('images/testvs/available-dot.png');?>"></div>
                    <!--<div class="vis-usr-img"><img alt="video-img" src="<?php echo base_url('images/testvs/video-img-sm.png');?>"></div>-->
                    <div class="veeses-auoimg" style="display:none;"><img alt="Audio-Img" src="<?php echo base_url('images/testvs/veeses-audioimg.png');?>"></div>
			  </div>
				
                <div class="Room_chat_wp fr">
                        <div class="Room_chat">
                       <h2><?php echo $vchatwindow;?></h2>
                        <div id="mydiv" class="Room_chat_view">
                            <ul>
                              
                            </ul>
                        </div>
                        <div class="cht-snbtn">
						
						<form onSubmit="$('#chatSend').click();return false">
                    <input type="text" class="send_chat_ipt" name=""    />
                    <span class="leaveRoom2"><a href="javascript:;"  id="chatSend"><?php //echo $vsend; ?></a></span>                                   
                	</form>
						
                        </div>
                    </div>
					
					<div class="Btn_wp agnR">
            	<!--<a href="#" class="Btn_audio"></a>-->
			
            </div>
					</div>
					
			
					
					<script>
		var pic = '<?php echo $user["pic"]; ?>';
    	$(function(){
		 var firstCnt = 0;
    		$('#chatSend').click(function(){
			//alert('hi');
			
			  firstCnt += 1;
			  //alert(firstCnt);
				addMsg($('.send_chat_ipt').val(),user.type,pic,firstCnt);
				$('.send_chat_ipt').val('');   		
			})
    	})
    </script>
	<style>
		div.ratelist {
			line-height: 31px;
			font-size: 14px;
			
		}
		.stars {
			margin-top: 5px;
		}
		.ratelist .title{
			width:320px
		}
		.clearer{clear:both}
		.stars a.on {
			background: url('https://www.ddxia.com/2012/images/star2.png');
		}
		.stars a.off {
			background: url('https://www.ddxia.com/2012/images/star2.png') 0 -18px;
		}
		.stars a {
			width: 16px;
			height: 16px;
			display: block;
			float: left;
			text-indent: -10000em;
		}
		.textareaMsg{width:340px;height:72px}
		#Room_sear_result .Room_search_iView a{
				height:150px;
				width:auto;
				}
		
	</style>

				<div id="dialog2" title="" style="display:none;">
		<img src="<?php echo base_url('images/base/chat.png');?>"/>
	</div>	
					
					 
		 
				 
    <link rel="stylesheet" href="code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="code.jquery.com/jquery-1.9.1.js"></script>
<script src="code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		         
        <script language="javascript" type="text/javascript">
            $(function() {
			
			
			var $gallery = $( "#gallery" );
			var $trash = $( "#mydiv" );

// let the gallery items be draggable
$( "li", $gallery ).draggable({
cancel: "a.ui-icon", // clicking an icon won't initiate dragging
revert: "invalid", // when not dropped, the item will revert back to its initial position
containment: "document",
helper: "clone",
cursor: "move"
});
			
	
$trash.droppable({
accept: "#gallery > li",
activeClass: "ui-state-highlight",
drop: function( event, ui ) {
//alert('om');
deleteImage( ui.draggable );
}
});

	
            });
        </script>
				
					
                
				<textarea id="imageResultTemp" style="display:none"  rows="0" cols="0">

		{#foreach $T.rows as row}
		<a target="_blank" title="{$T.row.name}" onClick="showImage('{$T.row.thumbnailUrl}',{#if $T.row.thumbnail.width>800}800{#else}{$T.row.thumbnail.width}{#/if},{#if $T.row.thumbnail.width>800}{ $T.row.thumbnail.height/($T.row.thumbnail.width/800) }{#else}{$T.row.thumbnail.height}{#/if},this)">
			<img src="{$T.row.thumbnailUrl}" height="{#if $T.row.thumbnail.height>150}150{#else}{$T.row.thumbnail.height}{#/if}px"/>
		</a> 
		 
		{#/for}
 
	</textarea>
	
				<script>
		function show(id){
			$('.search_type').hide();
			$('#'+id).show();
		}
		$(function(){
			$('#searchImageButton').click(function(){
			
				var _q = $('#searchImageInput').val();
				
				//alert(_q);
				
				if(_q.length < 2){
					alert('The keywords must have more than 2 characters.');
					return;
				}
				
				  
				$(this).attr('buttonType','doing');
				 
				$.get('<?php echo base_url("classroom/images");?>',{q:_q},function(result){
				//	alert(result);
					//console.info(result);
					//alert(result.constructor);
					$('#searchImageButton').attr('buttonType','done');
					if (String == result.constructor) {    
					
						eval ('var result = ' + result);
					}
					if(result.error){
					}
					else{
						$('#img_result').setTemplateElement('imageResultTemp').processTemplate(result);
					}
				})
			})
		})

		function clickVideo(){
			turnOnMyVideo();
			hideTest('test_vid');
			showTest('close_vid');
			hideTest('sRoom_player');
			hideTest('audio_div');
		}

		function clickMainVideo(){
			hideTest('close_audio');
			hideTest('audio_div');
			showTest('test_vid');
			hideTest('close_vid');
			turnOffMyVideo();
		}

		function clickMainAudio(){
		//alert('test');
			hideTest('close_audio');
			hideTest('audio_div');
			turnOffMyVideo();
			showTest('test_aud');
			hideTest('close_vid');
		}

		function clickCloseAudioVideo(){
			turnOffMyVideo();
			hideTest('close_audio');
			hideTest('audio_div');
			hideTest('close_vid');
			hideTest('test_vid');
			turnOffMyAudio();
			showTest('sRoom_player');
			showTest('check_mic');
			hideTest('close_mic');
		}
	</script>
	<script src="https://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>		         
        <script language="javascript" type="text/javascript">
            $(function() {
			  $("#allfields li").draggable({
                    appendTo: "body",
                    helper: "clone",
                    cursor: "select",
                    revert: "invalid"
					 
                });
             initDroppable($("#mydiv"));
				//initDroppable($("#chatSend_txt"));
                function initDroppable($elements) { 
				
				//alert($elements);
				
                    $elements.droppable({
					
				//alert($elements);
					
                        hoverClass: "textarea",
                        accept: ":not(.ui-sortable-helper)",
                        drop: function(event, ui) {
 
						$('#mydiv').val('');;
						
                            var $this = $(this);
     
                            var tempid = ui.draggable.text();
                            var dropText;
                            dropText = " " + tempid + " "+ "\r\n";
							//alert(dropText);
							
                            var droparea = document.getElementById('mydiv');
							
							//alert(droparea.value);
							
                            var range1 = droparea.selectionStart;
                            var range2 = droparea.selectionEnd;
                            var val = droparea.value;
                           var str1 = val.substring(0, range1);
                           var str3 = val.substring(range1, val.length);
                            droparea.value = str1 + dropText + str3;
							
						 // $("#TextArea1").append(dropText);
						  
						  $.post('<?php echo base_url('classroom/chatSend');?>',{msg:dropText,classId:cid},function(msg){
						if (String == msg.constructor) {
							eval ('var json = ' + msg);
						} else {
							var json = msg;
						}
						if(json.error){
							alert(json.msg);
						}
					})
						  
							  
                        }
                    });
                }
            });
        </script>
		<div class="gray-panel">
			<div class="mn-cnt">
				<div id="TabbedPanels1" class="VTabbedPanels">
					<ul id="allTabs" class="TabbedPanelsTabGroup Room_slide fl">
						<!--<li class="TabbedPanelsTab one current" data-tab="tab-1"><a href="javascript:void(0)"><span><?php echo $vtestinstruction; ?></span></a></li>
						<li class="TabbedPanelsTab two" data-tab="tab-2"><a href="javascript:void(0);"><span><?php echo $vtestvideo; ?></span></a></li>
						<li class="TabbedPanelsTab three" data-tab="tab-3"><a href="javascript:void(0);" onClick="clickMainAudio();"><span><?php echo $vtestaudio; ?></span></a></li>-->
						<!--<li class="TabbedPanelsTab two current" data-tab="tab-1"><a href="javascript:void(0)"><span><?php echo $vtestvideo; ?></span></a></li>-->
						<li class="TabbedPanelsTab four current" data-tab="tab-4"><a href="javascript:void(0)"><span><?php echo $vimages; ?></span></a></li>
						<li class="TabbedPanelsTab eight" data-tab="tab-8"><a href="javascript:void(0)"><span><?php echo $TestScenario;?></span></a></li>
						<li class="TabbedPanelsTab seven" data-tab="tab-7"><a href="javascript:void(0)"><span><?php echo $vnewsfeed;?></span></a></li>
						<li class="TabbedPanelsTab five" data-tab="tab-5"><a href="javascript:void(0)"><span><?php echo $vtranslate; ?></span></a></li>
						<!--<li class="TabbedPanelsTab six" data-tab="tab-6"><a href="javascript:void(0)"><span><?php echo $vdictionary;?></span></a></li>-->
					</ul>
				</div>
				<div class="drg-txt"><a href="#"><?php echo $vdragdrop; ?></a></div>
				
                <div class="credit-rules"><a href="<?php echo base_url().'article/Credit-rules.pdf';?>" target="_blank">
				<?php
				$arrVal= $this->lookup_model->getValue('1373', $multi_lang);
				echo $arrVal[$multi_lang]; //Credit Rules
				?>
				</a>
				
				</div>
				
			</div>
		</div>
		</div>
		</div>

        <div class="white-bg">
        	<div class="Room_tool">
            	<div class="TabbedPanelsContentGroup">
                	<!--<div class="TabbedPanelsContent current" id="tab-1">
						<div class="vdeo-cnt">
                        	<!--<span class="Btn-blue">
							<a href="Javascript:void(0);" id="test_vid" onClick="clickVideo();" class="Btn Btn_red w140"><?php echo $vclicktotestvideo; ?></a>
							<a href="Javascript:void(0);" id="close_vid" onClick="turnOffMyVideo();hideTest('close_vid');showTest('test_vid');" class="Btn Btn_red w140" style="display:none;"><?php echo $vclosevideotest; ?></a>
							</span>
							<p class="sDesc" id="allfields"><?php echo $vtestvideodescription; ?></p>
						</div>
                    	
                    </div>-->
                    
                    <div class="TabbedPanelsContent blu-bgexpnd current" id="tab-4">
                    	<div class="search_type" id="search_img">
                        	<div class="blubg-inr">
							<div class="bludv-cnt">
                        		<div class="Room_sear_wp">
                            	<form onSubmit="$('#searchImageButton').click();return false;">
								<input type="text" id="searchImageInput" class="Room_search_ipt" placeholder="<?php echo $vsearchimage; ?>" />								
                                <span class="leaveRoom2 Btn-blue fl-left"><a href="javascript:void(0)" id="searchImageButton" ><?php echo $vsearch; ?></a></span>
                                </form>
								<span class="leaveRoom2 Btn-blue">
								<a class="" id="profile_vedio_upload_true_test" href="javascript:void(0)" ><?php echo $vupload; ?></a>
								</span>
							</div>
                            </div>
                            </div>
                            <div class="whitdv-cnt">
                            <div id="Room_sear_result">
                                <div  class="Room_search_iView"  id="img_result">
								
								<?php foreach($gImages as $k=>$gImage):
							if($gImage['image']['thumbnailHeight'] > 150){
								$height = 150;
							}
							else{
								$height = $gImage['image']['thumbnailHeight'];
							}//echo '<pre>';var_dump($gImage);//link image link?>
							<a  href="<?php echo $gImage['image']['contextLink'];?>" target="_blank" title="<?php echo $gImage['htmlTitle'];?>" style="overflow:hidden">
								<img src="<?php echo $gImage['image']['thumbnailLink'] ;?>" height="<?php echo $height;?>px" />
							</a>
						<?php endforeach;?>
								
                                	
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="TabbedPanelsContent blu-bgexpnd" id="tab-5">
                    	<div id="gt-form-c" class="search_type">
                        <div class="blubg-inr">
                        	<div class="bludv-cnt">
                    			<div class="Room_sear_wp">
                            	<div id="gt-langs">
                                    <div  class="from_lang langs g-inline-block" onClick="showlng1();">
                                        <span dataid="" class="lang_op">From: Detect language</span>
                                        <s class="ico_arr ico_arr_down"></s>
                                    </div>
                                    <div id="transFrom2to" class="ico_trans g-inline-block">
                                        <s class="ico_arr_trans"></s>
                                    </div>
                                    <div class="to_lang langs g-inline-block" onClick="showlng2();">
                                        <span dataid="af" class="lang_op">TO: English</span>
                                        <s class="ico_arr ico_arr_down"></s>
                                    </div>
                                    <div id="gt-lang-submit" class="Btn-blue">
                                        <a href="javascript:void(0)" class=" Btn Btn_blue w66" id="gt-submit"><?php echo $vtranslate; ?></a>
                                    </div>
								</div>
                            </div>
                                <div style="display:none;" class="langList from langListfrom">
                               								  
		<?php foreach($gLangs['languages'] as $k=>$v):?>
			<span dataId="<?php echo $v['language'];?>" class="langItem"><?php echo $v['name'] ;?></span> <br>
								<?php endforeach;?>
                                </div>
                                <div style="display: none;" class="langList to langListto">
                                <?php foreach($gLangs['languages'] as $k=>$v):?>
                                    <span dataId="<?php echo $v['language'];?>" class="langItem"><?php echo $v['name'];?></span><br>
                                <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="whitdv-cnt">
                            
                            <div id="gt-text-source">
                            	<div class="lang-option">
									
									<div dataid="no" class="lang-inline-block selected lng-opp-sub">English</div>
                            	</div>
                                <div id="source-wrap" class="lng-tetxarea">
									<textarea id="source-textarea" name=""></textarea>
								</div>
                            </div>
                            <div id="gt-text-target">
                                <div class="lang-option">
                                    <div dataid="en" class="lang-inline-block lng-opp-sub">English</div> 
                                	<div dataid="en" class="lang-inline-block lng-opp-sub selected"></div>
                                </div>
                                <div id="target-wrap" class="lng-tetxarea">
                                    <textarea id="target-textarea" name=""></textarea>
                                </div>
							</div>
                        </div>
                        </div>
						<!--for translate script-->
            <script>
				$(function(){
					$('.from_lang').toggle(function(){
							$('.langList.from').show()
						},
						function(){
							$('.langList.from').hide()
						}
					)
					$('.langList.from').hover(function(){
						
						},
						function(){
							$('.from_lang').trigger('click');
						}
					)
					$('.langList.from .langItem').click(function(){
						var _clickObj = $(this);
						var _name = _clickObj.html();
						var _lang = _clickObj.attr('dataId');
						//$('.from_lang').trigger('click');
						$('.langList.from').hide()
						//console.info(_name,_lang);
						$('.from_lang .lang_op').html('FROM: '+_name).attr('dataId',_lang);
						var newLangSector = $('[dataId='+_lang+']','#gt-text-source .lang-option');
						
						$('#gt-text-source .lang-inline-block.selected').removeClass('selected');
						if(typeof(newLangSector.get(0))!='undefined'){
							newLangSector.addClass('selected');
						}
						else{
							var _listLength = $('#gt-text-source .lang-option .lang-inline-block').length;
							if(_listLength >0){
								$('.lang-inline-block:lt('+(_listLength - 0)+')','#gt-text-source .lang-option').remove()
							}
							$('#gt-text-source .lang-option').append('<div class="lang-inline-block selected" dataId="'+_lang+'" >'+_name+'</div>');
						}
					})

					$('.to_lang').toggle(function(){
							$('.langList.to').show()
						},
						function(){
							$('.langList.to').hide()
						}
					)
					$('.langList.to').hover(function(){
						
						},
						function(){
							$('.to_lang').trigger('click');
						}
					)
					$('.langList.to .langItem').click(function(){
						var _clickObj = $(this);
						var _name = _clickObj.html();
						var _lang = _clickObj.attr('dataId');
						//$('.from_lang').trigger('click');
						$('.langList.to').hide()
						//console.info(_name,_lang);
						$('.to_lang .lang_op').html('TO: '+_name).attr('dataId',_lang);
						var newLangSector = $('[dataId='+_lang+']','#gt-text-target .lang-option');
						//console.info(newLangSector,'#gt-text-target .lang-option[dataId='+_lang+']');
						$('#gt-text-target .lang-inline-block.selected').removeClass('selected');
						if(typeof(newLangSector.get(0))!='undefined'){
							newLangSector.addClass('selected');
						}
						else{
							var _listLength = $('#gt-text-target .lang-option .lang-inline-block').length;
							if(_listLength >0){
								$('.lang-inline-block:lt('+(_listLength - 0)+')','#gt-text-target .lang-option').remove()
							}
							
							$('#gt-text-target .lang-option').append('<div class="lang-inline-block selected" dataId="'+_lang+'" >'+_name+'</div>');
						}
					})
					//do translate
					$('#gt-submit').click(function(){
						var _q = $('#source-textarea').val();
						var _from = $('.lang-inline-block.selected','#gt-text-source').attr('dataId');
						var _to = $('.lang-inline-block.selected','#gt-text-target').attr('dataId');
						if(_q == '' ){
							alert('The word can not be empty.');
							return;
						}
						$.get('<?php echo base_url('classroom/translate');?>',{q:_q,from:_from,to:_to},function(result){
					//	alert(msg);
						//return false;
							if (String == result.constructor) {      
								eval ('var result = ' + result);
							}
							// console.info(result);
							//alert(result);
							if(result.error){
								alert(result.error);
							}
							else{
								if(typeof(result.rows.translations[0].detectedSourceLanguage)!='undefined'){
									 $('.langItem[dataId='+result.rows.translations[0].detectedSourceLanguage+']','.langList.from').trigger('click');
								}
								$('#target-textarea').val(result.rows.translations[0].translatedText);
							}
						})
					})

					$('#transFrom2to.ico_trans').click(function(){
						var _from = $('.from_lang .lang_op').attr('dataId');
						var _to = $('.to_lang .lang_op').attr('dataId');
						 $('.langItem[dataId='+_from+']','.langList.to').trigger('click');
						 $('.langItem[dataId='+_to+']','.langList.from').trigger('click');
					})
				})
			</script>
			<!--for translate script end-->

						
						
						
						
						
                    </div>
                    <div class="TabbedPanelsContent blu-bgexpnd" id="tab-6">
                    	<div id="search_dict" class="search_type">
                        	<div class="blubg-inr">
							<div class="bludv-cnt">
                    			<div class="Room_sear_wp">
                            	<form onSubmit="$('#gd-submit-dict').click();return false;">
                                <input type="text"   class="Room_search_ipt" placeholder="<?php echo $vsearchdictionary; ?>" id="dictFrom"/>
                                <span class="leaveRoom2 Btn-blue"><a id="gd-submit-dict" class=" Btn Btn_blue w66" href="javascript:void(0)"><?php echo $vdefine; ?></a></span>
                                </form>
                            </div>
                            </div>
                            </div>
                            <div class="whitdv-cnt">
                            <div id="Room_sear_result_dict" class="srch-result">
                            	
                            </div>
                            </div>
                        </div>
						
						<!--for dict script-->
			<script>
				$(function(){
					$('#gd-submit-dict').click(function(){
					
						var _q = $('#dictFrom').val();
						if(_q==''){
							alert('Enter a word to define.');
							return;
						}
						//$.getJSON('https://www.google.com/dictionary/json?q='+_q+'&sl=en&tl=en&restrict=pr&client=te&callback=?',function(result){
							//$.getJSON('https://api.pearson.com/v2/dictionaries/entries?headword='+_q+'&apikey=h3aGyEoHI1YIlycgPCuXaahkRoVJBXZ9',function(result){
							$.getJSON('https://api.pearson.com/v2/dictionaries/entries?headword='+_q,function(result){
							
							 if (String == result.constructor) {      
						eval ('var s = ' + result);
					} else {
						var s = result;
					}
				// alert(s.results.length)
				 var _html ="";
				 _html ="<b>Word: </b>"+_q;
				 
				 if(s.results.length == 0)
				 {
				 _html += '<div>';
				  _html ="<b>Word: </b>"+_q +" not found in the dictionary.";
				 _html += '</div>';
				 $('#Room_sear_result_dict').html(_html);
				 }
				 
				for (var i = 0;  i < 100; i++) {
				if(s.results[i]['senses'][0]['definition']!=undefined)
				{
   _html += '<div>';
_html += '<ul type="square"><img src="../../../images/bullet_black.png" alt="Smiley face" > <span>'+s.results[i]['senses'][0]['definition']+'</span></li></ul>';
_html += '</div>';
}
$('#Room_sear_result_dict').html(_html);
}
				
				 	/*  var _html ="";
							 _html += '<div>';
							_html += '<p class="nw-ttl">'+s.results[0]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[1]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[2]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[3]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[4]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[5]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[6]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[7]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[8]['senses'][0]['definition']+'</span>';
							_html += '<p class="nw-ttl">'+s.results[9]['senses'][0]['definition']+'</span>';
							
							_html += '</div>';
							$('#Room_sear_result_dict').html(_html); */
			
				  
					 // alert(s.results[1]['senses'][0]['definition']);
					 
					//alert(aaa);
							//console.log(result.primaries);
							
							//if(typeof(result.primaries)=='undefined'){
								//$('#Room_sear_result_dict').html('This word is not found.  Please check spelling.');
								//return;
							//}
							//var _html ="";
							//_html += '<div>';
							//_html += '<span>'+s.results[0]['senses'][0]['definition']+'</span>';
							//_html += '</div>';
							//var _index = 1;
							/* $.each(result.primaries,function(k,v){
								
								_html += '<div class="info">';
								$.each(v.terms,function(kk,vv){
									if(vv.type=="sound"){
										_html += '<span class="'+vv.type+'" onclick="$(this).children(\'audio\').get(0).play()"> &nbsp;<audio id="media" src="'+vv.text+'" ></audio></span>';
									}
									else{
										_html += '<span class="'+vv.type+'">'+vv.text+'</span>';
									}
									if(typeof(vv.labels)!='undefined'){
										$.each(vv.labels,function(kkk,vvv){
											_html += '<span class="type">'+vvv.text+'</span>';
										})
									}
								})
								_html +='</div>';
								$.each(v.entries,function(kk,vv){
									//console.info('entries',vv);
									if(vv.type=='related'){
											return;
									}
									$.each(vv.terms ,function(kkk,vvv){
										
										_html += '<div class="sampleList">';
										_html += _index + '. &nbsp;&nbsp;&nbsp;' + vvv.text;
										_html += '</div>';
										_index++;
									})
								})
								$('#Room_sear_result_dict').html(_html);
							}) */
							//console.info(t.primaries)
							 //$('#Room_sear_result_dict').html(_html);
						})
					})
				})
			</script>
            <!--for dict script end-->
						
						
                    </div>
                    <div class="TabbedPanelsContent blu-bgexpnd" id="tab-7">
                    	<div  class="search_type">
                        
                        <div class="blubg-inr">
						<div class="bludv-cnt">
                    		<div class="Room_sear_wp">
							
							<form onSubmit="$('#gd-submit-feed').click();return false;">
							 <input type="text" name="country" id="country" class="Room_search_ipt" placeholder="<?php echo $vsearchnews; ?>"/>
							 <span class="leaveRoom2 Btn-blue"><a id="gd-submit-feed" class=" Btn Btn_blue w66" href="javascript:void(0)"><?php echo $vgetnews; ?></a>
					 
                            	                 </span>
                                </form>
                            </div>
                        </div>
                        </div>   
                         <div class="whitdv-cnt"> 
                            <div id="Room_sear_result_feed" >
                            	
                            </div>
						 </div>
                         
							<p class="sDesc">
					
					</p>
							
                        </div>
                    </div>
                    <div class="TabbedPanelsContent test-scenarios" id="tab-8">
                    	
					<!--	<h1><?php //echo $TestScenario; ?></h1>-->
						<p class="">
							
						 <span class="">Language</span>
									
									<select name="lang" id="lang"  onchange="searchscenario();">
									
										<option value="3">English</option>
										<option value="1">CN Simplified</option>
										<option value="2">CN Traditional</option>
										<option value="5">Japanese</option>
										<option value="6">Korean</option>
										<option value="7">Portuguese</option>
										<option value="8">Spanish</option>
										<option value="4">French</option>
									</select> 
							<span style="margin-left:50px;">Categories</span>
						 
	
								<select name="categories" id="categories" onChange="searchscenario();">
								<!--<option value="sel"> Select</option>-->
								<?php for($i=0;$i<count($cat);$i++)
								{?>
								<option value="<?php echo $cat[$i]['guide_categories_id'];?>"> <?php echo $cat[$i]['name']?></option>
								<?php }?>
								</select></p>			
							<div id="dynamictest">									
                        <span id="testscn">
                        <?php if(count($testScenario)>0){?>
						<?php for($i=0;$i<count($testScenario);$i++){?>
                        
						<?php 
							$pdf=base_url('uploads');
							$pdfurl=$pdf.'/testscenario/'.$testScenario[$i]['pfile'];
						?>
                        <li><a target='_blank' href="<?php echo $pdfurl; ?>"><?php echo $testScenario[$i]['Title']?></a></li>
						<p><?php echo $testScenario[$i]['Description']?> </p>
						<?php }?>
						</span>
					<?php }?>	
					</div>
                    </div>
                </div>
				
		
				
            </div>
        </div>
	</div>
    <div id="jquery_jplayer_2" class="jp-jplayer"></div>
	<script>
	
	function searchscenario()
	{
		var lang=$('#lang').val();
		var cat=$('#categories').val();
		var pattern ='lang='+lang + "&cat="+cat;
			$.ajax({
					  type:'POST',
					 dataType: 'html',
					  url:'<?php echo base_url('testveesession/getDynamicscenario');?>',
					  data:pattern,
					  success:function(msg){
					  if (String == msg.constructor)
					{
						var result;
						
						eval('result = ' + msg);
					} else {
						var result = msg;
					}
					$('#dynamictest').empty();
					
					if(result.length > 0)
					{	
						for (var i = 0;  i < (result.length); i++)
						{
						 var title=result[i]['Title'];
						 var file=result[i]['pfile'];
						 var pdf="<?php echo base_url('uploads');?>";
						 var link=pdf+"/testscenario/"+file; 
						 var disc=result[i]['Description'];
						$("#dynamictest").append('<span><li><a target="_blank" href='+link+'>'+title+'</a></li><p>'+disc+'</p></span>'); 
					 
						}
					}	
					else
					{
						$("#dynamictest").append('<ul>no record found</ul>');
					} 
				 } 
			});
	}
	</script>
	<script type="text/javascript">
		//var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
		
		$(function(){
			//$('#Room_sear_result_feed').css('overflow-y','auto');	
			$('#gd-submit-feed').click(function(){
				//alert('hi');
				
				var _q = $('#country').val();
				if(_q==''){
					//alert('Select Country');
					alert('Enter Search Word');
					return;
				}
				var _data = {};
				_data["country"] = _q;
				
				$(this).attr('buttonType','doing');
				
				$.ajax({
						url: "<?php echo base_url("classroom/getnewsfeed");?>",
						type: 'GET',
						data: _data,
						dataType: 'html',
						cache: false,
						success: function (msg){
						//alert(msg);
								if (String == msg.constructor) {
									var result;
									 
									eval('result = ' + msg);
								} else {
									var result = msg;
								}
								$('#gd-submit-feed').attr('buttonType','done');
								var _html = result.html;
								//alert(_html);
								var noScrol = 0;
								if(_html == ''){
									_html = '<div style="margin:20px;font-weight: bold;font-size: 16px;" >No Records Found</div>';
									noScrol = 1;
								}
								//alert(_html);
								$('#Room_sear_result_feed').html(_html);
								if(_html.len < 0)
								{
									//$('#Room_sear_result_feed').css('overflow-y','auto');
								}else{
									//$('#Room_sear_result_feed').css('overflow-y','scroll');
								}
								if(noScrol == 1)
								{
									//$('#Room_sear_result_feed').css('overflow-y','auto');
								}
								
						}
					 });
				
			})
			
			
			
			//upload document function 
			var button1 = $('#profile_vedio_upload_true_test'), interval1;
			
			 
			
			s = new AjaxUpload(button1,{
				action: '<?php echo Base_url('user/upload_testvee_chat_document');?>', 
				enable:true,
				name: 'userfile',
				onSubmit : function(file, ext){
					if(typeof(this._input.files)!='undefined')
					{		
						if(typeof(this._input.files[0])!='undefined' && typeof(this._input.files[0].size)!='undefined' && this._input.files[0].size != ''){
							if(this._input.files[0].size > 20971520){
								alert('Filesize too large, please use a video less than 20mb.  Converting to MP4 can reduce filesize considerably.');
								return false;
							}
						}
					}	
					if(ext == 'jpg'|| ext == 'jpef' || ext == 'png'|| ext == 'gif'|| ext == 'bmp'|| ext == 'txt'|| ext == 'xls'|| ext == 'rtf' || ext == 'doc'){
					}
					else{
						$( "#dialog p").html('The file can not be supported.');
							$( "#dialog" ).dialog({
								modal: true
							});
							return false;
					}		
					// change button text, when user selects file			
					$( "#dialog p").html('Uploading.');
					$( "#dialog" ).dialog({
						modal: true
					});
					this.disable();
					interval1 = window.setInterval(function(){
						var text = $( "#dialog p").html();
						if (text.length < 13){
							$( "#dialog p").html(text + '.');
						} else {
							$( "#dialog p").html('Uploading');				
						}
					}, 200);
				},
				onComplete: function(file, response){
					$( "#dialog p").html('Uploaded');
					$( "#dialog").dialog('close');			
					window.clearInterval(interval1);
					this.enable();
					//response = JSON.parse(response);
					if (String == response.constructor) {
						eval ('var jsonres = ' + response);
					} else {
						var jsonres = response;
					}
					//alert(jsonres.filetype)
					if(jsonres.filetype == 'image')
					{
						var link = jsonres.source;
						var onclick = "showImage('"+jsonres.source+"','','',this)";
						var html = '<a class="hdshareimg" target="_blank" title="Share Image" onclick="'+onclick+'" ><img src="'+link+'" alt="image" /></a>';
						document.getElementById('hidden_documents').innerHTML = html;
						setTimeout(function() {
							var sendHtml = document.getElementById('hidden_documents').innerHTML;
							$('.send_chat_ipt').val(sendHtml);
							$('#chatSend').trigger('click');
							$('#dialog2').dialog('close');
						}, 2000);
						
						
					}else
					{
						var link = jsonres.source;
						var html = '<a class="hdshareimg" target="_blank" href="'+link+'" ><img src="<?php echo Base_url('images/document.jpg'); ?>" alt="document" /></a>';
						document.getElementById('hidden_doc').innerHTML = html;
						setTimeout(function() {
							var sendHtml = document.getElementById('hidden_doc').innerHTML;
							$('.send_chat_ipt').val(sendHtml);
							$('#chatSend').trigger('click');
							$('#dialog2').dialog('close');
						}, 2000);
					}
					
				}
			});
			
			
		})
    </script>
	

<script>
$(document).ready(function(){

$('ul.TabbedPanelsTabGroup li').click(function(){
var tab_id = $(this).attr('data-tab');
 

$('ul.TabbedPanelsTabGroup li').removeClass('current');
$('.TabbedPanelsContent').removeClass('current');

$(this).addClass('current');
$("#"+tab_id).addClass('current');
})

})
/*
function showlng1(){
		$('.langListfrom').toggle(
					  {}
					  );
}
function showlng2(){
		$('.langListto').toggle(
					  {}
					  );
}
*/
$(".langListfrom").mouseleave(function(){
  $(".langListfrom").css("display","none");
});

$(".langListto").mouseleave(function(){
  $(".langListto").css("display","none");
});
</script>

		  <div class="spc20"></div>
	<div id="hidden_document" style="display:none;">
		<div id="hidden_documents" ></div>
		<div id="hidden_doc" ></div>
		
	</div>
	<style>
	#hiddenshare img {max-height:82px;}
	.Room_feed a img {max-height:82px;}
	.hdshareimg img{max-height:82px;}
	</style>

		<div id="SecondTour" title=""  style="display:None;">
        	
            
		 
			
            <div class="popup-step tutoe-step3">
            	<div class="step-div-bg">
                	<span class="popup-no">3</span>
                <div class="ratelist popup-row">
                	<h2 class="poupttl">Video Talk</h2>
                    <p><span class="title" style="float:left"><?php echo $PractOr;?></span>  </p>
                    <p><span class="title" style="float:left"><?php echo $ChromeOr;?></span>  </p>
                    <p class="clearer"></p>
				</div>
                	<div class="pop-pagin">
                    	<ul>
                        	<li><span><a href="<?php echo base_url('user/profile?step=1');?>">1</a></span></li>
                            <li><span><a href="<?php echo base_url('user/calendar/uid/'.$this->session->userdata('uid').'?step=2');?>">2</a></span></li>
                            <li class="active"><span><a href="">3</a></span></li>
                            <li><span><a href="<?php echo base_url('user/account?step=4');?>">4</a></span></li>
                            <!--<li><span><a href="<?php echo base_url('user/changeInfo?step=5');?>">5</a></span></li>-->
                        </ul>
                    </div>
            		<a  style="cursor:pointer" href="<?php echo base_url('user/account?step=4');?>"><?php //echo $StepFour;?>Next</a>
                </div>
            </div>
            <div class="hight-cnt3">&nbsp;</div>
		</div>
        
        
        <div id="firstTour" title="" style="display:None;">
    	
		 
			
            <div class="popup-step tutoe-step3">
            	<div class="step-div-bg">
                	<span class="popup-no">3</span>
                <div class="ratelist popup-row">
                	<h2 class="poupttl">Video Talk</h2>
                    <p><span class="title" style="float:left"><?php echo $PracitsOr;?></span>  </p>
                    <p><span class="title" style="float:left"><?php echo $ChromeBrowser;?></span>  </p>
                    <p class="clearer"></p>
				</div>
                	<div class="pop-pagin">
                    	<ul>
                        	<li><span><a href="<?php echo base_url('search/search?step=1');?>">1</a></span></li>
                            <!--<li><span><a href="<?php echo base_url('user/profile/uid/12512?step=2');?>">2</a></span></li>-->
                            <li><span><a href="<?php echo base_url('user/profile/uid/12512?step=3');?>">3</a></span></li>
                            <li class="active"><span><a href="<?php echo base_url('testveesession/testVeeSession?step=4');?>">4</a></span></li>
                            <li><span><a href="<?php echo base_url('user/account?step=5');?>">5</a></span></li>
                            <!--<li><span><a href="<?php echo base_url('user/changeInfo?step=6');?>">6</a></span></li>-->
                        </ul>
                    </div>
            		<a  style="cursor:pointer" href="<?php echo base_url('user/account?step=5');?>"><?php //echo $StepFive;?>Next</a>
                </div>
            </div>
            <div class="hight-cnt3">&nbsp;</div>
		</div>
 <li id="open" class="basicDemo_open"></li>
<div  id="basicDemo" class="popUpDiv" style="opacity: 0.6 !important; width:500px; height:310px; padding:0px;"/> 
	<img src="<?php echo base_url('images/OverlayGraphic2.png');?>" width="620px;">
	
 <br />    
    <a class="popup-close basicDemo_close" style="text-decoration:none" data-popup-close="popup-1" href="">x</a>
</div>
<div id="basicDemo_background" class="popup_background" style="background-color: none !important;"></div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
	$('#basicDemo').popup(); 
	$("#categories option:first").attr("selected","selected");	
	searchscenario();
});
</script>