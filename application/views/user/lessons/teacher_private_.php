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
$arrVal 		= $this->lookup_model->getValue('714', $multi_lang);
$lpremiummember	= $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('94', $multi_lang);
$laddmore = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('85', $multi_lang);
$llessons = $arrVal[$multi_lang];
?>
<?php $this->layout->appendFile('javascript',"js/jquery-jtemplates.js");?>
<?php $this->layout->appendFile('javascript',"js/jquery.poshytip.min.js");?>
<?php $this->layout->appendFile('css',"css/cupertino/theme.css");?>
 <div class="baseBox baseBoxBg clearfix">
    	
        <div class="content_main fr">
        	<div class="main_inner">
                <ul class="student_prof teacher_prof">
                    <?php echo profile_menu('t_private','l_prof',$profile['uid']);?>
                </ul>
                <!--/student_prof-->
                <div id="teacher_prof_Wp">
                    <div class="mod">
                        <div class="hd">
                            <div class="pro_tle tle"><h3><?php echo $llessons; ?></h3></div>
                        </div>
		                <div>
							<?php echo $lpremiummember; ?>		                	
		                </div>
                        <div class="bd">
                            <ul class="archivedList lessonsList">
                                <?php foreach($lessons as $k=>$lesson):?> 
                                <li class="lesson"  >
                                	<div class="video_pic_163x90 posR fl">
                                    	<a href="javascript:void(0)">
                                        	<img src="<?php echo profile_video($lesson['source']);?>" width="163" height="90" />
                                            <span class="video_ic video_ic_s"></span>
                                        </a>
                                    </div>
                                    <div class="video_pic_intro c666">
                                    	<div class="video_hd clearfix">
                                        	<h3 class="c424242 f14 fl">
                                            	<a href="javascript:void(0)" class="lname"><?php echo $lesson['name'];?></a> - <span class="c047d9e"><a href="<?php echo tl_url('user/profile',$lesson['uid']);?>" class="tname"><?php echo $lesson['firstName'],' ',$lesson['lastName'];?></a></span>
                                                 - Price <span class="cbd0000 lprice" >$<?php echo $lesson['price'];?></span>
                                            </h3>
                                        </div>
                                        <div class="archived_desc">
                                        	<strong>Description: </strong> 
                                            <?php echo $lesson['desc'];?> 
                                       	</div>

                                        <div class="archived_info clearfix">
                                        	<!--<span class="fl">Recorded: <?php echo date( 'h:i a, M d, Y' , outTime($lesson['creat_at']));?></span>-->
                                            <span class="fl">Recorded: <?php echo date( 'M d, Y' , outTime($lesson['creat_at']));?></span>
                                        	<span class="fr">Length: <?php echo sec2min($lesson['length']);?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="set_price">
                                    	New Price<br />
                                        $ <input type="text" class="new_prize_ipt price"  value="<?php echo $lesson['price'];?>"/>
										<input type="hidden" value="<?php echo $lesson['id'];?>" class="lesson_id"/>
                                        <div class="addBtn_Wp">
                                        	<a class="norBtn redRadiusBtn2 w80 setPrice" href="javascript:void(0)">Set Price</a>
                                        
                                        	<a class="norBtn redRadiusBtn2 w55 deleteLesson" href="javascript:void(0)">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>
								<li class="addnewTemplate" style="display:none">
                                	<div class="video_pic_163x90 posR fl">
                                    	<a href="#">
                                        	<img src="<?php echo Base_url('images/base/video_pic163x90.jpg');?>" width="163" height="90" />
                                            <!--<span class="video_ic video_ic_s"></span>-->
											<div class="nick_name "  style="display:none"></div>
											<a href="javascript:void(0)" class="upload_hdpic upload_videopic" ></a>
                                        </a>
                                    </div>
                                    <div class="video_pic_intro c666">
                                    	<div class="video_hd clearfix">
                                        	<h3 class="c424242 f14 fl">
                                            	Lesson Name:<input type="text" class="lesson_name" placeholder="Lesson Name"> 
                                            </h3>
                                        </div>
                                        <div class="archived_desc">
                                        	<strong>Description: </strong> <br/>
                                            <textarea class="lesson_desc" cols="50" rows="4"> </textarea>
                                       	</div>

                                        <div class="archived_info clearfix">
                                        	<!--<span class="fl">Recorded: June 18, 2012 - 3:49 PM</span>
                                        	<span class="fr">Length: 2:05:05</span>-->
                                        </div>
                                    </div>
                                    
                                    <div class="set_price">
                                    	Set Price<br />
                                        $ <input type="text" class="new_prize_ipt price" />
										<input type="hidden" value="0" class="lesson_id"/>
                                        <div class="addBtn_Wp">
                                        	<a href="javascript:void(0)" class="norBtn redRadiusBtn2 w96 doAddLesson">Add</a>
                                        	
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
						<div class="bd">
							<div class="addBtn_Wp">
								<a href="javascript:void(0)" class="norBtn redRadiusBtn2 w96" onclick="addLessons()"><?php echo $laddmore; ?></a>
							</div>
						</div>
                    </div><!--/mod-->
                    
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
	<textarea  id="lessonListTemp" style="display:none"  rows="0" cols="0">
		<!--<li class="lesson">
			<div class="video_pic_163x90 posR fl">
				<a href="javascript:void(0)">
					<img src="{$T.source}" width="163" height="90" />
					<span class="video_ic video_ic_s"></span>
				</a>
			</div>
			<div class="video_pic_intro c666">
				<div class="video_hd clearfix">
					<h3 class="c424242 f14 fl">
						<a href="javascript:void(0)" class="lname">{$T.name}</a> - <span class="c047d9e"><a href="#" class="tname">{$T.firstName} {$T.lastName}</a></span>
						 - Price <span class="cbd0000 lprice">${$T.price}</span>
					</h3>
				</div>
				<div class="archived_desc">
					<strong>Description: </strong> 
					{$T.desc}
				</div>

				<div class="archived_info clearfix">
					<span class="fl">Recorded: {$T.creat_at}</span>
					<span class="fr">Length: {$T.length}</span>
				</div>
			</div>
			
			<div class="set_price">
				New Price<br />
				$ <input type="text" class="new_prize_ipt price"  value="{$T.price}"/>
				<input type="hidden" value="{$T.id}" class="lesson_id"/>
				<div class="addBtn_Wp">
					<a class="norBtn redRadiusBtn2 w80 setPrice" href="javascript:void(0)">Set Price</a>
                                        
                    <a class="norBtn redRadiusBtn2 w55 deleteLesson" href="javascript:void(0)">Delete</a>
				</div>
			</div>
		</li>-->
	</textarea>
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
	<div id="dialog1" title="Upload Video" style="display:none">
		<p>Video has been uploaded. </p>
		<p> Please confirm text descriptions.  After clicking Yes, only the price can be edited.</p>
	</div>

	<script>
	var intervals = {};
	var buttons = {};
	var addRows = {};
	function addLessons(){
		if(<?php echo $profile['roleId'];?> != 2 ){
			alert('Video Sales are reserved for premium members. You can purchase an upgrade on your Account page.');
			return;
		}
		var _temp = $('.addnewTemplate').clone();
		_temp = $(_temp).removeClass('addnewTemplate').addClass('addNewLesson').show();
		$('.lessonsList').append(_temp);
		var _index = _temp.index();
		_temp.attr('index',_index);
		buttons[_index] = _temp.find('.upload_hdpic');
		intervals[_index] = '';
		addRows[_index] = _temp;
		new AjaxUpload(buttons[_index],{
			action: '<?php echo Base_url('user/lesson_video');?>', 
			enable:true,
			name: 'userfile',
			onSubmit : function(file, ext){
				if(typeof(this._input.files[0])!='undefined' && typeof(this._input.files[0].size)!='undefined'){
					if(this._input.files[0].size > 52428800){
						alert('Filesize too large, please use a video less than 50mb.  Converting to MP4 can reduce filesize considerably.');
						return false;
					}
				}
				var _lesson_id = addRows[_index].find('.lesson_id').val();
				this.setData ({lesson_id:_lesson_id});
				var _showText = addRows[_index].find('.nick_name').show();
				_showText.text('Uploading');//$( "#dialog p").html('Uploading.');
				_showText.attr('buttontype','doing');
				this.disable();
				/*intervals[_index] = window.setInterval(function(){
					var text = _showText.text();
					if (text.length < 13){
						_showText.text(text + '.');
					} else {
						_showText.text('Uploading');				
					}
				}, 200);*/
			},
			onComplete: function(file, response){
			alert(response);
				var _showText = addRows[_index].find('.nick_name').show();;
				_showText.text('Uploaded');
				_showText.attr('buttontype','done');
				//window.clearInterval(intervals[_index]);
				this.enable();
				//console.info(response);
			
				try{
					if (String == response.constructor) {      
						eval ('var response = ' + response);
					} 
				}
				catch(e){
					$("#dialog").html('Uploading error. Video may be in an unsupported format. Must be in MP4,AVI,3GP, and maximum of 50mb.');
					$("#dialog").dialog({
						modal: true,
						show: "blind",
						hide: "explode"
					});
					return;
				}
				if(response.error){
					$("#dialog").html('Uploading error.'+response.error);
					$("#dialog").dialog({
						modal: true,
						show: "blind",
						hide: "explode"
					});
					return;
				}
				addRows[_index].find('.video_pic_163x90 img').attr('src',response.image+'.jpg');
				addRows[_index].find('.lesson_id').val(response.lesson_id);
				addRows[_index].data('videoUploaded',true);
				_showText.hide(3000);
				//createVideo(response.image+'.jpg',response.video);
			}
		});

		_temp.find('.doAddLesson').click(function(){
			var _data = {};
			var _button = $(this);
			var _li = $(this).parents('li.addNewLesson');
			_data['id'] = _li.find('.lesson_id').val();
			_data['name'] = _li.find('.lesson_name').val();
			_data['desc'] = _li.find('.lesson_desc').val();
			_data['price'] = _li.find('.price').val();
			if(_data['name'] == null||_data['name'] == ''){
				$('#dialog').html('The lesson name can not be null!');
				$( "#dialog" ).dialog({
					modal: true,
					show: "blind",
					hide: "explode"
				});
				return false;
			}
			if(_li.data('videoUploaded')!=true){
				$('#dialog').html('You must upload vedio first!');
				$( "#dialog" ).dialog({
					modal: true,
					show: "blind",
					hide: "explode"
				});
				return false;
			}
			if(_button.attr('buttontype') == 'doing'){
				return false;
			}
			_button.html('Updating');
			_button.attr('buttontype','doing');
			$.post('<?php echo base_url("user/updateLession");?>',_data,function(msg) {
				if (String == msg.constructor) {      
					eval ('var json = ' + msg);
				} else {
					var json = msg;
				}
				if(json.status == true || json.status == 'true'){
					$('#dialog1').dialog({
						modal:true,
						buttons: {
							"Yes": function() {
								//console.info(json);
								container = $('<div></div>').setTemplateElement('lessonListTemp').processTemplate(json.lesson);
								//_data['price'] = _data['price']	* (1-(-window.configs['LES_PRICE_PERCENT']['value']) )	;
								//_data['price']  = Math.round(parseInt(_data['price'] *10000) /100)  /100;
								//$('.lprice',container).html(_data['price']);
								$('.lessonsList').append(container.children());
								//$('#dialog').html('Update success..').dialog({modal: true});
							
								_li.remove();
								$( this ).dialog( "close" );
							},
							Cancel: function() {
								$( this ).dialog( "close" );
							}
						}
					})

					//$('#dialog').html('Update success..').dialog({modal: true});
				}
				else {
					$('#dialog').html(json.msg).dialog({modal: true});
				}
				_button.attr('buttontype','done').html('Add');
			});
		})
	}
	$(function(){
		$('.setPrice').live('click',function(){
			var _data = {};
			var _button = $(this);
			var _li = $(this).parents('li.lesson');
			_data['id'] = _li.find('.lesson_id').val();
			_data['price'] = _li.find('.price').val();
			if(isNaN(_data['price'])){
				$('#dialog').html('Price must be number.').dialog({modal: true});
			}
			//_button.html('Updating..');
			if(_button.attr('buttontype') == 'doing'){
				return false;
			}
			_button.html('Updating').attr('buttontype','doing');
			$.post('<?php echo base_url("user/updateLession");?>',_data,function(msg){
				if (String == msg.constructor) {      
					eval ('var json = ' + msg);
				} else {
					var json = msg;
				}
				if(json.status == true || json.status == 'true'){
					//_data['price'] = _data['price']	* (1-(-window.configs['LES_PRICE_PERCENT']['value']) )	;
					//_data['price']  = Math.round(parseInt(_data['price'] *10000) /100)  /100;
					$('.lprice',_li).html(_data['price']);
					$('#dialog').html('Update success..').dialog({
						modal: true,
						buttons: {
							"Ok": function() {
								$( this ).dialog( "close" );
							}
						}
					});
				}
				else {
					$('#dialog').html(json.msg).dialog({modal: true});
				}
				_button.attr('buttontype','done').html('Set Price');
			});
		})

		$('.deleteLesson').live('click',function(){
			if(!window.confirm('Are you sure you want to delete it?')){
				return;
			}
			var _data = {};
			var _button = $(this);
			var _li = $(this).parents('li.lesson');
			_data['id'] = _li.find('.lesson_id').val();
			
			//_button.html('Updating..');
			if(_button.attr('buttontype') == 'doing'){
				return false;
			}
			_button.html('Deleting').attr('buttontype','doing');
			$.post('<?php echo base_url("user/delete_lesson");?>',_data,function(msg){
				if (String == msg.constructor) {      
					eval ('var json = ' + msg);
				} else {
					var json = msg;
				}
				_button.attr('buttontype','done').html('Delete');
				if(json.status == true || json.status == 'true'){
					_li.remove();
				}
				else {
					$('#dialog').html(json.msg).dialog({modal: true});
				}
			});
		})
		
	})
	</script>