<?php $this->layout->setLayoutData('content_for_layout_title','School Payments');?>
<?php $currentUrl = base_url('admin/schoolpayment');?>
<?php $this->layout->setLayoutData('content_for_layout_links','<div style="float:left;font-weight:bold;"><input style="width:22%;padding:4px;float:left;margin-right: 5px;" class="adm_box1" type="text" placeholder="select date" value="'.$dsearch.'" name="dsearch" id="events_widget" /><input style="width:23%;padding:4px;float:left;margin-right: 5px;" class="adm_box1" type="text" value="'.$search.'" name="search" id="search" /><a href="javascript:void(0);" class="button submit-search" style="height:17px;line-height:19px;">Search</a> </div>');?>
<?php $this->layout->appendFile('javascript',"js/jquery.mtz.monthpicker.js");?>
<table class="data_table">
    <thead>
        <tr>
            <th>
				ID
				<?php if($sortorder == 'asc' && $sort == 'id'): ?>
					<a href="<?php echo $currentUrl.'/start/'.$start.'/sortorder/desc/sort/id'; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
					<?php else: ?>
					<a href="<?php echo $currentUrl.'/start/'.$start.'/sortorder/asc/sort/id'; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
					<?php endif;?>
			</th>
			<th>
				School Name
				<?php if($sortorder == 'asc' && $sort == 'name'): ?>
					<a href="<?php echo $currentUrl.'/start/'.$start.'/sortorder/desc/sort/name'; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
					<?php else: ?>
					<a href="<?php echo $currentUrl.'/start/'.$start.'/sortorder/asc/sort/name'; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
					<?php endif;?>
			</th>
			<th>T-sessions</th>
			<th>T-payments</th>
			<th>S-sessions</th>
             <th>S-payments</th>
            <th>Payments Due</th>
           <th>Payments Action</th>
        </tr>
    </thead>
	<tbody>
	<?php $j = 0; foreach ($payments as $key => $val) :
		if($val['id'] != '4845'){
		?>
        <tr id="id_<?php echo $val['id'];?>">
            <td><?php echo $val['id'];?></td>
			<td><?php echo @$val['schoolname'];?></td>
			<td><?php echo @$val['tsession'];?></td>
			
			<td><?php echo "$". number_format(@$val['tpayment'],2,'.','');?></td>
			<td>
            <?php
            	echo @$val['ssession'];
            ?>
            </td>
             <td>
				 <?php if(@$val['spayment'] !='')echo @$val['spayment']; else echo '0.00';?>
			</td>
			<td><?php 
				if(@$val['dues'] !=''){echo "$". number_format(@$val['dues'],2,'.','');}else{echo "0";} ?>
			</td>
			 
			<td id="actions" class="<?php echo $class; ?>" >
				<!--<?php if($val['postpone'] == 1 || $val['dues'] <= 0){?>
				<img alt="Postpone" src="<?php echo base_url('/images/postpon-gray.png');?>" />
				<?php }else{ ?>
				<a href="javascript:void(0);" class="poscat" mid="<?php echo $val['id']; ?>" title="Postpone"><img alt="Postpone" src="<?php echo base_url('/images/postpon-red.png');?>" /></a>
				<?php } ?> -->
				<?php if($val['dues'] > 0){?>
				<a href="javascript:void(0);" class="appcat" mid="<?php echo $val['id']; ?>" val="<?php echo $val['dues']; ?>" title="Approve"><img alt="Approve" src="<?php echo base_url('/images/approve-red.png');?>" /></a>
				<?php } else {?>
				 <img alt="Approve" src="<?php echo base_url('/images/approve-gray.png');?>" /> 				 
				<?php }?>
				<!--<?php if($val['dues'] > 0){?>
				<a href="javascript:void(0);" class="delcat" mid="<?php echo $val['id']; ?>" title="Delete"><img alt="delete" src="<?php echo  base_url('images/close-red.png')?>" /></a> 
				<?php } else {?>
				 <img alt="delete" src="<?php echo  base_url('images/close-gray.png')?>" />
				<?php }?>-->
				<a href="<?php echo base_url('admin/get_school_note/id/'.$val['School_id']);?>" title="User Notes"><img alt="Note" src="<?php echo base_url('/images/cm_note.png');?>" /></a>
			</td>
			 
		</tr>
		<?php }
		endforeach; ?>
    </tbody>
    <tfoot>
	</tfoot>
</table>
<script type="text/javascript">
function changelimit(limit)
{
	window.location.href="<?php echo base_url().'admin/schoolpayment/limit/'?>"+limit;
}
setTimeout('showmenu("financial",8)',1000);
function del(_id){
if(window.confirm('Are you sure you want to delete this?')){
		$.post('<?php echo Base_url("admin/disputes_del")?>',{id:_id},function(msg){
			if (String == msg.constructor) {
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			if(json.status){
				$.each(json.ids,function(k,v){
					$('#id_'+v).remove();
				})
				alert('Successfully deleted');
			}
			else{
				alert(json.msg);
			}
		})
	}
}
function pospond(_id)
{
if(window.confirm('Are you sure you want to postpone this payment?')){
		$.post('<?php echo Base_url("admin/disputes_postpond")?>',{id:_id},function(msg){
			if (String == msg.constructor) {
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			if(json.status){
				alert('Successfully postponed');
				window.location.reload(true);
			}
			else{
				alert(json.msg);
			}
		})
	}
}
function approve(_id,_val)
{
  
if(window.confirm('Are you sure you want to approve this payment?')){
		$.post('<?php echo Base_url("admin/AproveSchoolPayment")?>',{id:_id,approveval:_val},function(msg){
			
			if (String == msg.constructor) {      
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			if(msg.status){
				$('.appcat').attr('val',json.val);
				alert('Payment successfully done');
				 document.location.href="<?php echo base_url('admin/schoolpayment');?>";
			}
			else{
				alert(json.msg);
			}
		})
	}
}
$(function(){
	$(".check-all").click(function() {
		$("input[name='ids[]']").attr('checked', this.checked);
	});
	$(".submit-search").click(function() {
		var search = $('#search').val();
		var dsearch = $('#events_widget').val();
		var currentPage = window.location.href;
		$form = $("<form id='disputeslist' method='post' action='"+currentPage+"'></form>");
		if(search !='' || search == '')
		{
		$form.append('<input type="hidden" name="search" id="search" value="'+search+'" />');
		}
		if(dsearch !='')
		{
			$form.append('<input type="hidden" name="dsearch" id="dsearch" value="'+dsearch+'" />');
		}
		$('body').append($form);
		$('#disputeslist').submit();
	});
	$('#search').on('keypress', function (event) {
		 if(event.which == '13'){
			//$(this).attr("disabled", "disabled");
			$(".submit-search").trigger('click');
		 }
	});
	
	$('#apply').click(function(){
		var _checked = $("input[name='ids[]']:checked");
		if($('#action').val() ==0 ){
			alert('Choose an action first');
			return;
		}
		if(_checked.size()>0){
			var _checkedVal = [];
			_checked.each(function(k,v){
				_checkedVal.push($(this).val());
			})
			del(_checkedVal)
		}
		else{
			alert('Must check one item.');
			return;
		}
	});
	$('.delcat').click(function(){
		del([$(this).attr('mid')]);
	})
	$('.poscat').click(function(){
		pospond([$(this).attr('mid')]);
	})
	$('.appcat').click(function(){
		approve([$(this).attr('mid')],[$(this).attr('val')]);
	})
})
</script>
<script>
	$(function(){
		$('a@[href=#]').attr('href','javascript:void(0)');
	})
$("#dsearch,#exp_session").datepicker({ dateFormat: 'yy-mm-dd' } );

$('#events_widget').monthpicker();

$('#events_widget').monthpicker().bind('monthpicker-click-month', function (e, month) {
   // alert('You clicked on month ' + month);

}).bind('monthpicker-change-year', function (e, year) {
 //   alert('You chosed the year ' + year);

}).bind('monthpicker-show', function () {
   // alert('showing...');

}).bind('monthpicker-hide', function () {
  //  alert('hiding...');
});
</script>
</body>
</html>