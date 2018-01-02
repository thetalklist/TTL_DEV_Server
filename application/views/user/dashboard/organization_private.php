<?php
/*
* @autor TECHNO-SANJAY
* @package student private dashboard
* @date 10 May 2013
**/
header("Cache-Control: no-cache,no-store, must-revalidate" ); 
header("Pragma: no-cache" );
header("Expires: -1" );

?>
<?php $this->layout->appendFile('javascript',"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js");?>
<?php $this->layout->appendFile('javascript',"js/chat.js");?>
<?php $this->layout->appendFile('javascript',"js/jquery-jtemplates.js");?>
<?php $basePath =  substr(BASEPATH,0,-7);  

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

$arrVal = $this->lookup_model->getValue('524', $multi_lang);
$linvitetxt = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('525', $multi_lang);
$lenternametxt = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('439', $multi_lang);	
$ltypemessage = $arrVal[$multi_lang];
// checks for quarantine users
if($profile['quarantine'] == 1){?>
	<script>
		//alert("Your account has been quarantined possibly due to inappropriate content. Please remove from Profile or Video Lessons and send message to support@thetalklist.com to reinstate your account.");
		alert("Your account has been made invisible to the membership. Either you have an incomplete profile (photo, video greeting, bio, rate, and open calendar sessions) or you have inappropriate content. Please edit so we can maintain a complete and professional profile for all visible tutors. Once updated, your profile may automatically become visible or else send an email to support@thetalklist.com.");
	</script>
	<style>
		.from {display:none;}
	</style>
<?php } ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/palyerTheme/style.css">
<script type="text/javascript" src="<?php echo base_url();?>js/projekktor-1.2.26r246.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/banner.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/buzzword_medium.js"></script>



    <script src="<?php echo base_url();?>js/bjqs-1.3.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bjqs.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/demo.css">



<?php
$arrVal = $this->lookup_model->getValue('34', $multi_lang);
$lsend = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('259', $multi_lang);
$ldashboard = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('260', $multi_lang);
$lnextsession = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('261', $multi_lang);
$lmessages = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('262', $multi_lang);
$llivechat = $arrVal[$multi_lang];


if($multi_lang != 'ch'){ 
$arrVal = $this->lookup_model->getValue('264', $multi_lang);
$lfacebookfeed = $arrVal[$multi_lang];
}else{
$lfacebookfeed = 'Sina Weibo Feed';
} 


$arrVal = $this->lookup_model->getValue('265', $multi_lang);
$lcompletedsessions = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('270', $multi_lang);
$lchatinvite = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('272', $multi_lang);
$lstudentstatistics = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('293', $multi_lang);
$linviteonlineuser = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('283', $multi_lang);
$lok = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('298', $multi_lang);
$lcancel = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('299', $multi_lang);
$lprivatechatinvitations = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('300', $multi_lang);
$lendprivatechat = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('824', $multi_lang);
$cbooking = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('886', $multi_lang);
$buzzword = $arrVal[$multi_lang];
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="iEdit.css">
<script>
$(document).ready(function(){

	function windowOffset(elem){
		var iTop = elem.offset().top;
		var iLeft = elem.offset().left;
		var res = {
			top: iTop - $(window).scrollTop(),
			left: iLeft - $(window).scrollLeft()
		}
		return res;
	} 


	//Inserting required elements.
	var iEditHTML = '<div class="iEdit-img-edit"><canvas class="iEdit-img-edit-can"></canvas><canvas class="iEdit-img-edit-process-can"></canvas><div class="iEdit-img-edit-select"><div class=""></div></div><div class="iEdit-img-edit-act iEdit-img-edit-save"> Crop </div><div class="iEdit-img-edit-act iEdit-img-edit-cancel"> Cancel </div></div>';
	$("body").append(iEditHTML);
	
	
	//Main Image Editor Object
	window.iEdit = {

		//Caching Selectors
		can: $('.iEdit-img-edit-can')[0],
		processCan: $('.iEdit-img-edit-process-can')[0],
		selectionBox: $('.iEdit-img-edit-select'),
		container: $('.iEdit-img-edit'),
		saveBtn: $(".iEdit-img-edit-save"),
		cancelBtn: $('.iEdit-img-edit-cancel'),

		//Internal Properties
		drag: false,
		resize: false,
		square: true,
		status: false,
		grcx: null,
		grcy: null,
		callback: null,
		imageType: null,
		imageQuality: 1,

		//Open the Image Editor with appropriate settings
		open: function(imgObj, square, callback, imageType, imageQuality){

			this.drag = false,
			this.resize = false,

			this.square = square || false,
			this.imageQuality = imageQuality || 1;

			if(imageType == "jpeg" || imageType == "png" || imageType == "gif" || imageType == "bmp"){ //JPG and any other would default to JPEG//
				this.imageType = imageType || "jpeg";
			}else{
				this.imageType = "jpeg";	
			}

			//niu = Not In Use
			this.grcx = "niu",
			this.grcy = "niu",
			
			//Specifyinf user callback
			this.callback = callback,
			this.status = true;

			var ctx = this.can.getContext("2d");

			//Shwoing the conatiner on screen
			iEdit.container.css("display","block").stop().animate({"opacity":"1"});

			var img = new Image();
			var that =  this;

			//Draw the image on the visible canvas depending on the aspect ratio of the image.
			$(img).on("load", function(){
				if(img.width > img.height){
					that.can.width = img.width;
					that.can.height = img.height;

					that.can.style.width = ($(window).width()/2*1)+"px"; 
					that.can.style.height = (img.height*(($(window).width()/2*1)/img.width))+"px";
	
					
					ctx.fillStyle = '#fff'; 
					ctx.fillRect(0, 0, that.can.width, that.can.height);

					ctx.drawImage(img, 0, 0, that.can.width, that.can.height);

					//iEdit.selectionBox.height($(that.can).height()-20);
					//iEdit.selectionBox.width($(that.can).height()-20);
					
					iEdit.selectionBox.css({'left': '42%' ,'top': '40%','height':'150px','width': '275px'});
				}else if (img.width < img.height){
					that.can.width = img.width;
					that.can.height = img.height;

					that.can.style.width = (img.width*(($(window).height()/3*2)/img.height)) + "px";
					that.can.style.height = ($(window).height()/3*2) + "px"; 

					ctx.fillStyle = '#fff'; 
					ctx.fillRect(0, 0, that.can.width, that.can.height);

					ctx.drawImage(img, 0, 0, that.can.width, that.can.height);

					//iEdit.selectionBox.height($(that.can).width()-20);
					//iEdit.selectionBox.width($(that.can).width()-20);

					iEdit.selectionBox.css({'left': '42%' ,'top': '40%','height':'150px','width': '275px'});


				}else{
					that.can.width = img.width;
					that.can.height = img.height;

					that.can.style.width = ($(window).height()/4.8*3.3) + "px";
					that.can.style.height = ($(window).height()/4.8*3.3) + "px";					


					ctx.fillStyle = '#fff'; 
					ctx.fillRect(0, 0, that.can.width, that.can.height);

					ctx.drawImage(img, 0, 0, that.can.width, that.can.height);

					//iEdit.selectionBox.height($(that.can).width()-20);
					//iEdit.selectionBox.width($(that.can).width()-20);
				
					iEdit.selectionBox.css({'left': '42%' ,'top': '40%','height':'150px','width': '275px'});
				
				}
		/*		if(img.width > img.height){
					that.can.width = img.width;
					that.can.height = img.height;

					that.can.style.width = ($(window).width()/2*1)+"px"; 
					that.can.style.height = (img.height*(($(window).width()/2*1)/img.width))+"px";
	
					
					ctx.fillStyle = '#fff'; 
					ctx.fillRect(0, 0, that.can.width, that.can.height);

					ctx.drawImage(img, 0, 0, that.can.width, that.can.height);

					iEdit.selectionBox.height($(that.can).height()-20);
					iEdit.selectionBox.width($(that.can).height()-20);

					iEdit.selectionBox.css({'left': (($(window).width()/2) - $(that.can).height()/2) + 10  + 'px' ,'top': $(window).height()/2 - $(that.can).height()/2 - 15 + 'px' });

				}else if(img.width < img.height){

					that.can.width = img.width;
					that.can.height = img.height;

					that.can.style.width = (img.width*(($(window).height()/3*2)/img.height)) + "px";
					that.can.style.height = ($(window).height()/3*2) + "px"; 

					ctx.fillStyle = '#fff'; 
					ctx.fillRect(0, 0, that.can.width, that.can.height);

					ctx.drawImage(img, 0, 0, that.can.width, that.can.height);

					iEdit.selectionBox.height($(that.can).width()-20);
					iEdit.selectionBox.width($(that.can).width()-20);

					iEdit.selectionBox.css({'left': (($(window).width()/2) - $(that.can).width()/2) + 10  + 'px' ,'top': $(window).height()/2 - $(that.can).width()/2 - 15 + 'px' });


				}else{

					that.can.width = img.width;
					that.can.height = img.height;

					that.can.style.width = ($(window).height()/4.8*3.3) + "px";
					that.can.style.height = ($(window).height()/4.8*3.3) + "px";					


					ctx.fillStyle = '#fff'; 
					ctx.fillRect(0, 0, that.can.width, that.can.height);

					ctx.drawImage(img, 0, 0, that.can.width, that.can.height);

					iEdit.selectionBox.height($(that.can).width()-20);
					iEdit.selectionBox.width($(that.can).width()-20);
				
					iEdit.selectionBox.css({'left': (($(window).width()/2) - $(that.can).width()/2) + 10  + 'px' ,'top': $(window).height()/2 - $(that.can).width()/2 - 15 + 'px' });
				} */

			});
			
			img.src = URL.createObjectURL(imgObj);
			
		},

		//Close the image editor and reset the settings.
		close: function(){
			this.drag = false;
			this.resize = false;
			this.square = true;
			this.status = false;
			this.grcx = undefined;
			this.grcy = undefined;
			this.callback = undefined;

			this.can.height = 0;
			this.can.width = 0;

			this.processCan.height = 0;
			this.processCan.width = 0;

			var pCtx = this.processCan.getContext("2d");			
			var ctx = this.can.getContext("2d");

			ctx.clearRect(0, 0, 0, 0);
			pCtx.clearRect(0, 0, 0, 0);
		
			iEdit.selectionBox.css({
				"height":'0px',
				"width":'0px',				
			});		

			iEdit.container.stop().animate({
				"opacity":"0"
			}, 300);

			setTimeout(function(){
				iEdit.container.css({"display":"none"});
			}, 300);

		}
	}

	//Set flags to stop trachong mouse movement.
	$(document).on("mouseup",function(){
		iEdit.drag = false;
		iEdit.resize = false;	

		iEdit.grcx = 'niu';
		iEdit.grcy = 'niu';
	});


	//Set flags to start trachong mouse movement.
	iEdit.selectionBox.on("mousedown",function(e){
		var that = $(this);

		var rcx = e.clientX - windowOffset(that).left;
		var rcy = e.clientY - windowOffset(that).top;

		iEdit.grcx = 'niu';
		iEdit.grcy = 'niu';

		if( (iEdit.selectionBox.width() - rcx <= 28) && (iEdit.selectionBox.height() - rcy <= 28)){
			iEdit.drag = false;
			iEdit.resize = true;
		}else{
			iEdit.drag = true;
			iEdit.resize = false;
		}


	});


	//Track mouse movements when the flags are set.
	$(document).on('mousemove', function(e){

		var rcx = e.clientX - windowOffset(iEdit.selectionBox).left;
		var rcy = e.clientY - windowOffset(iEdit.selectionBox).top;

		if(iEdit.drag === true && iEdit.status){

			if(iEdit.grcx === 'niu'){
				iEdit.grcx = rcx;
			}

			if(iEdit.grcy === 'niu'){
				iEdit.grcy = rcy;
			}

			var xMove = e.clientX - iEdit.grcx;
			var yMove = e.clientY - iEdit.grcy;


			if( (xMove + iEdit.selectionBox.width() >= $(iEdit.can).width() + windowOffset($(iEdit.can)).left) || xMove <= windowOffset($(iEdit.can)).left){
				if(xMove <= windowOffset($(iEdit.can)).left){
					iEdit.selectionBox.css({"left":windowOffset($(iEdit.can)).left+"px"});
				}else{
					iEdit.selectionBox.css({"left":windowOffset($(iEdit.can)).left + $(iEdit.can).width() - iEdit.selectionBox.width() + "px"});						
				}
			}else{
				iEdit.selectionBox.css({"left":xMove+"px"});
			}


			if((yMove + iEdit.selectionBox.height() >= $(iEdit.can).height() + windowOffset($(iEdit.can)).top) || (yMove <= windowOffset($(iEdit.can)).top) ){
				if(yMove <= windowOffset($(iEdit.can)).top){
					iEdit.selectionBox.css({"top":windowOffset($(iEdit.can)).top+"px"});
				}else{
					iEdit.selectionBox.css({"top":windowOffset($(iEdit.can)).top + $(iEdit.can).height() - iEdit.selectionBox.height() + "px"});
				}
			}else{
				iEdit.selectionBox.css({"top":yMove+"px"});
			}

		}else if(iEdit.resize === true && iEdit.status){

			var nWidth = rcx;
			var nHeight = rcy;

			if(iEdit.square){
				if(nWidth >= nHeight){//Width is the dominating dimension; 
					nHeight = nWidth/2;
					if(nWidth < 100){
						nWidth = 100;
						nHeight = 100;						
					}
				}else{//Height is the dominating dimension; 
					nWidth = nHeight*2;
					if(nHeight < 100){
						nWidth = 100;
						nHeight = 100;
					}
				}				

				if((nWidth + windowOffset(iEdit.selectionBox).left) >= $(iEdit.can).width() + windowOffset($(iEdit.can)).left){
					nWidth = (windowOffset($(iEdit.can)).left + $(iEdit.can).width()) - (windowOffset(iEdit.selectionBox).left);
					if(windowOffset(iEdit.selectionBox).top + nWidth > $(iEdit.can).height() + windowOffset($(iEdit.can)).top){
						nWidth = (windowOffset($(iEdit.can)).top + $(iEdit.can).height()) - (windowOffset(iEdit.selectionBox).top);
					}
					nHeight = nWidth;
				}else if((nHeight + windowOffset(iEdit.selectionBox).top) >= $(iEdit.can).height() + windowOffset($(iEdit.can)).top){
					nHeight = (windowOffset($(iEdit.can)).top + $(iEdit.can).height()) - (windowOffset(iEdit.selectionBox).top);
					if(windowOffset(iEdit.selectionBox).left + nHeight > $(iEdit.can).width() + windowOffset($(iEdit.can)).left){
						nHeight = (windowOffset($(iEdit.can)).left + $(iEdit.can).width()) - (windowOffset(iEdit.selectionBox).left);
					}
					nWidth = nHeight;
				}


			}else{

				if(nWidth <= 100){
					nWidth = 100;
				}
				if(nHeight <= 100){
					nHeight = 100;
				}			
				if(e.clientX >= $(iEdit.can).width() + windowOffset($(iEdit.can)).left){    //REASON: nWidth + windowOffset(iEdit.selectionBox).left = e.clientX;
					nWidth = (windowOffset($(iEdit.can)).left + $(iEdit.can).width()) - (windowOffset(iEdit.selectionBox).left);
				}
				if(e.clientY >= $(iEdit.can).height() + windowOffset($(iEdit.can)).top){	//REASON: Same logic as nWidth
					nHeight = (windowOffset($(iEdit.can)).top + $(iEdit.can).height()) - (windowOffset(iEdit.selectionBox).top);
				}

			}


			iEdit.selectionBox.css({
				"width":nWidth+"px",
				"height":nHeight+"px",				
			});
	
		}

	});

	//Process the selected region and return it as an image to the user defined callback.
	iEdit.saveBtn.on("click", function(){

		if(iEdit.callback == undefined){
			iEdit.close();
			return;
		}

		var ratio = iEdit.can.width/$(iEdit.can).width();

		var h = iEdit.selectionBox.height() * ratio;
		var w = iEdit.selectionBox.width() * ratio;		
		var x = (windowOffset(iEdit.selectionBox).left - windowOffset($(iEdit.can)).left) * ratio;
		var y = (windowOffset(iEdit.selectionBox).top - windowOffset($(iEdit.can)).top) * ratio;		

		iEdit.processCan.height = h;
		iEdit.processCan.width = w;		
		
		var pCtx = iEdit.processCan.getContext("2d");

		pCtx.drawImage(iEdit.can, x, y, w, h, 0, 0, w, h);


	    iEdit.callback(iEdit.processCan.toDataURL("image/"+iEdit.imageType, iEdit.imageQuality));
		var image = document.getElementById('result').src;
		iEdit.close();
		
		var aj_uid = '<?php echo @$profile['uid']; ?>';
		var dataTtUpdate = '';
		dataTtUpdate +='uid='+aj_uid+'&image='+image;
			$.ajax({
					  type:'POST',
					  data:dataTtUpdate,
					  url:'<?php echo base_url('user/updateProfile_pic/');?>',
					  success:function(msg){
						  //alert(msg);
						  //return false;
						  
					  } 
				});
		

	});

	//Close the canvas without processing the image on cancel.
	iEdit.cancelBtn.on("click", function(){
		iEdit.close();
	});

	//Setup canvas when window is resized. 
	$(window).on("resize", function(){
		if(iEdit.status){
			iEdit.selectionBox.css({'left': (($(window).width()/2) - $(iEdit.can).height()/2) + 10  + 'px' ,'top': $(window).height()/2 - $(iEdit.can).height()/2 + 10 + 'px' });
		}
	});	
});
</script>

<script>
$(document).ready(function(){

	$("#file").change(function(e){
		
		var img = e.target.files[0];

		if(!img.type.match('image.*')){
			alert("Whoops! That is not an image.");
			return;
		}
		iEdit.open(img, true, function(res){
			$("#result").attr("src", res);
		});
	});

});
</script>
<style>
.iEdit-img-edit{
	display: none;
	position: fixed;
	height: 100%;
	width: 100%;
	background-color:rgba(10,10,10,0.7);
	top:0px;
	left: 0px;
	z-index: 8;
	opacity: 0;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.iEdit-img-edit-act {
    height: 50px;
    width: 90px;
    position: absolute;
    border-radius: 20px;
    background-color: #3399cc;
    left: 50%;
    margin-left: -110px;
    bottom: 33px;
    cursor: pointer;
    text-align: center;
    line-height: 48px;
    color: rgba(10,10,10,0.55);
    font-family: helvetica neue, segoe ui, roboto, sans-serif;
    font-weight: 300;
    text-transform: uppercase;
    font-size: 8pt;
    color: #fff;
}

.iEdit-img-edit-cancel{
	margin-left: 16px;
	background-color: #3399cc;
}

.iEdit-img-edit-can{
	position: fixed;
	top: 0px;
	left: 0px;
	bottom: 50px;
	right: 0px;
	margin:auto;
}

.iEdit-img-edit-process-can{
	display: none;
}

.iEdit-img-edit-select{
	
	position: fixed;
	
	background-color: rgba(10,10,10,0.5);
	box-shadow: inset 0px 0px 0px 3px rgba(256,256,256,0.8);
}

.iEdit-img-edit-select-resize{
	position: absolute;
	height: 17px;
	width: 17px;
	background-color: rgba(255,255,255,0.8);
	right: 3px;
	bottom: 3px;
	cursor: nwse-resize;
}
.fileContainer {
    overflow: hidden;
    position: relative;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}

/* Example stylistic flourishes */

.fileContainer {
 
    border-radius: .5em;
    float: left;
    padding: .5em;
}

.fileContainer [type=file] {
    
}

.top_link2{
	height:85px !important;
}
p{
	margin-bottom:0px !important;
}
.top_navi .navi_col ul li{
	z-index:0 !important;
}


.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  opacity: 0;
  filter: alpha(opacity=0);
  background-color: rgba(0,0,0,0.5);
  -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
  transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
  transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
}

.hovereffect a.info {
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  color: #fff;
  border: 1px solid #fff;
  background-color: transparent;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
  margin: 50px 0 0;
  padding: 7px 14px;
}

.hovereffect a.info:hover {
  box-shadow: 0 0 5px #fff;
}

.hovereffect:hover img {
  -ms-transform: scale(1.2);
  -webkit-transform: scale(1.2);
  transform: scale(1.2);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
}

.hovereffect:hover h2,.hovereffect:hover a.info {
  opacity: 1;
  filter: alpha(opacity=100);
  -ms-transform: translatey(0);
  -webkit-transform: translatey(0);
  transform: translatey(0);
}

.hovereffect:hover a.info {
  -webkit-transition-delay: .2s;
  transition-delay: .2s;
}
.speak_like_native{
	font-size:1.4em !important;
	font-weight:500 !important;
}
.footer .socialize span{
	font-size:14px !important;
}
.footer_links{
	font-size:12px !important;
}
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:250px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table .text {
  position:absolute;   
  z-index:2;
  width:65%;
  background-color:#D3D3D3;
}
#table-wrapper table .text1 {
  position:absolute;   
  z-index:2;
  width:10%;
   background-color:#D3D3D3;
}
#table-wrapper table .text2 {
	 position:absolute;     
  z-index:2;
  width:20%;
   background-color:#D3D3D3;
}
#table-wrapper_session {
  position:relative;
}
#table-scroll_session {
  height:250px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper_session table .text {
  position:absolute;   
  z-index:2;
  width:10%;
  background-color:#D3D3D3;
}
#table-wrapper_session table .text1 {
  position:absolute;   
  z-index:2;
  width:15%;
   background-color:#D3D3D3;
}
#table-wrapper_session table .text2 {
	 position:absolute;   
     text-align:left;   
	 z-index:2;
	 width:20%;
     background-color:#D3D3D3;
}
.header .top_navi .navi_col ul li ul{
	top:85px;
}
.header .inner-navi .navi_col2 a.top_link2{
	font-weight:normal;
}

</style>
		<script type="text/javascript" src="iEdit.js"></script>
		<script type="text/javascript" src="script.js"></script>
<script>
$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"';

				// Deliberate 'false', see comment below
        if (false && window.navigator.msSaveBlob) {

						var blob = new Blob([decodeURIComponent(csv)], {
	              type: 'text/csv;charset=utf8'
            });
            
            // Crashes in IE 10, IE 11 and Microsoft Edge
            // See MS Edge Issue #10396033: https://goo.gl/AEiSjJ
            // Hence, the deliberate 'false'
            // This is here just for completeness
            // Remove the 'false' at your own risk
            window.navigator.msSaveBlob(blob, filename);
            
        } else if (window.Blob && window.URL) {
						// HTML5 Blob        
            var blob = new Blob([csv], { type: 'text/csv;charset=utf8' });
            var csvUrl = URL.createObjectURL(blob);

            $(this)
            		.attr({
                		'download': filename,
                		'href': csvUrl
		            });
				} else {
            // Data URI
            var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

						$(this)
                .attr({
               		  'download': filename,
                    'href': csvData,
                    'target': '_blank'
            		});
        }
    }

    // This must be a hyperlink
    $(".export").on('click', function (event) {
        // CSV
        var args = [$('#dvData>table'), 'organization_payment.csv'];
        
        exportTableToCSV.apply(this, args);
        
        // If CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
	
	 $(".export_table").on('click', function (event) {
        // CSV
        var args = [$('#dvData_table>table'), 'session_trasaction.csv'];
        
        exportTableToCSV.apply(this, args);
        
        // If CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
</script>




<div>
	<div style="width:100%; margin:0 auto;">
		<div style="width:100%" class="hd">
           <div class="content"><h2 style="font-size:32px; padding-bottom:15px;"><?php echo $ldashboard;?></h2></div>
        </div>
		
		<div style="width:100%;">
			<div style="width:30%; float:left;">
				<!-- <img src="dddaew" style="width:250px; height:150px;"> 		 -->	
				<!--	<div id="ProfImg" style="background:none !important;cursor:pointer" class="user_header posR">
								<img height="245" src="http://dev.thetalklist.com/images/header.jpg" width="245" id="profile_image_show">
							<a href="#" style="display:none;" class="upload_hdpic" id="profile_image_upload">Upload Picture</a>
						
					</div>  -->
					<div class="fileContainer">
					<div class="hovereffect">
						<img id="result" style="width:275px; height:150px;" src="<?php echo $profile['pic']?Base_url('/uploads/images/'.$profile['pic']):Base_url('images/header.jpg');?>">
						<div class="overlay">
							<a class="info" href="#"><input id="file" type="file">upload</a>
						</div>
					</div>
				<!--	<a href="#" style="cursor:pointer">
					<input id="file" type="file" class="form-control" >
					<img id="result" style="width:275px; height:150px;" src="<?php echo $profile['pic']?Base_url('/uploads/images/'.$profile['pic']):Base_url('images/header.jpg');?>"></a>
					</div>  -->
					
					</div>
				</div>
			
			<div style="width:70%; float:left;">
				<div style="width:90%; float:left; ">
					<p style="font-size:18px; padding-bottom:22px; padding-top: 15px;">Organization: <span><?php echo $profile['firstName']; ?></span></p>
					<p style="font-size:18px; padding-bottom:22px;">Affiliate Link:<span><?php  if($profile['roleId'] == 5 || $profile['roleId'] == 4){?> <span style="font-size:18px;" class="AffiTool"><span><?php  echo str_replace(" ","-",$encode);?></span></span> <?php }?> </span></p>
					<p style="font-size:18px; padding-bottom:22px;">Current Credit Balance: <span><?php if($profile['credit_balance'] == ''){ echo '0';}else{echo $profile['credit_balance']; } ?></span></p>
				</div>
				<div style="width:10%;">
				
				</div>
			</div>
			</div>
			
			<div style="width:100%; float:left;">
				<div style="width:85%; float:left" class="hd">
					<div class="content"><h2 style=" border-bottom: 3px dotted #D3D3D3;; font-size:22px; padding-bottom:15px;"><span style="color:#E8B800">Organization Payments</span> <a href="#" class="export">[Export]</a> </h2></div>

				</div>	
				<div style="width:15%; float:left;  border-bottom: 3px dotted #D3D3D3;"><p style="font-size:18px; padding-top: 4px;padding-bottom: 18px; float:right; color:#E8B800">Total: <?php if($sum == ''){ echo '$0';}else{echo '$'.$sum; } ?></p></div>
			</div>
			
			
			
	<div style="width:100%; float:left; padding-bottom:25px; margin-top: -20px;">
		<div id="table-wrapper">
			<div id="table-scroll">
				<div id="dvData">
				<table style="width:100%;">
				<tr style="width:100%; background-color:#D3D3D3; font-size:18px; color: #fff; height:52px; padding:13px;">
					<td style="width:20%;"><span style="width:21%;  padding: 15px 10px;" class="text2">Date</span></td>
					<td style="width:70%;"><span style="width:70%;  padding: 15px 10px;" class="text">Item</span></td>
					<td style="width:10.5%;"><span style="width:10%; padding: 15px 10px;" class="text1">Amount</span></td>
				</tr>
			<?php
					if(empty($organization)){ ?>
						<tr style="width:100%; font-size:16px;">	
							<td colspan="3" style="width:100%; padding: 15px 10px; text-align:center;">No payments made yet.</td>
						</tr>
			<?php 	}else { ?>
		
				<?php foreach ($organization as $detais=>$key){?> 
						<tr style="width:100%; font-size:16px; padding:10px">	
								<td style="width:20%;  padding: 5px 10px;"><?php echo $key->date; ?></td>
								<td style="width:65%;  padding: 5px 10px;"><?php echo $key->description; ?></td>
								<td style="width:10%;  padding: 5px 10px;"><?php echo '$'.$key->credit_balance; ?></td>
						</tr>
				<?php } }?>
				
				</table>
				</div>
			</div>
		</div>
	</div>
			
			<div style="width:100%; float:left;">
				<div style="width:85%; float:left" class="hd">
					<div class="content"><h2 style=" border-bottom: 3px dotted #D3D3D3; font-size:22px; padding-bottom:15px;"><span style="color:#E8B800">Session Transaction</span> <a href="#" class="export_table">[Export]</a></h2></div>

				</div>	
				<div style="width:15%; float:left;  border-bottom: 3px dotted #D3D3D3;"><p style="font-size:18px; padding-top: 4px;padding-bottom: 18px; float:right; color:#E8B800">Total: <span><?php if($total_session == ''){echo "0";}else{echo $total_session;} ?></span></p></div>
			</div>
			
			
			
	<div style="width:100%; float:left; margin-top: -20px;">
		<div id="table-wrapper_session">
			<div id="table-scroll_session">
				<div id="dvData_table">
					<table style="width:100%;">
						<tr style="width:100%; background-color:#D3D3D3; font-size:18px; color: #fff; height:52px; padding:13px;">
							<td style="width:15%;"><span style="width:15%; padding: 15px 10px;" class="text">Date</span></td>
							<td style="width:15%;"><span style="width:16%; padding: 15px 10px;" class="text1"> Student Name</span></td>
							<td style="width:10%;"><span style="width:11%; padding: 15px 10px;" class="text">Student ID</span></td>
							<td style="width:30%;"><span style="width:30%; padding: 15px 10px;" class="text2">Email</span></td>
							<td style="width:15%;"><span style="width:15%; padding: 15px 10px;" class="text">Tutor ID</span></td>
							<td style="width:15%;"><span style="width:15%; padding: 15px 10px;" class="text">Credits</span></td>
						</tr>
						<?php
			if(empty($session)){ ?>
				<tr style="width:100%; font-size:16px;">	
					<td colspan="8" style="width:100%; padding: 15px 10px; text-align:center;">No sessions completed yet.</td>
				</tr>
		<?php 	}else {
						foreach ($session as $detais=>$key){
							?> 
						<tr style="width:100%; font-size:16px;">	
								<td style="width:15%; padding: 5px 10px;"><?php echo substr($key->createAt,0,10); ?></td>
								<td style="width:15%; padding: 5px 10px;"><?php echo $key->firstName; ?></td>
								<td style="width:10%;  padding: 5px 10px;"><?php echo $key->uid; ?></td>
								<td style="width:30%;  padding: 5px 10px;"><?php echo $key->email; ?></td>
								<td style="width:15%;  padding: 5px 10px;"><?php echo $key->tid; ?></td>
								<td style="width:15%;  padding: 5px 10px;"><?php echo $key->fee; ?></td>
						</tr>
			<?php } } ?>

							
					</table>
				
				</div>
			</div>
		</div>
	</div>
		</div>

