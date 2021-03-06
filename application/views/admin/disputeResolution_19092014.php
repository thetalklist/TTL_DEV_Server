<?php $this->layout->setLayoutData('content_for_layout_title','Dispute Resolution');?>
<?php //$this->layout->setLayoutData('content_for_layout_links','<a href="'.base_url('admin/messaging_send').'">Send New Message</a> <a style="margin-left:10px;" href="'.base_url('admin/messaging_affiliate_send').'">Send New Affiliate Message</a>');?>
<?php $currentUrl = base_url('admin/disputeResolution');?>
<?php $this->layout->setLayoutData('content_for_layout_links','<div style="float:left;font-weight:bold;"><input style="width:55%;padding:4px;float:left;margin-right: 5px;" class="adm_box1" type="text" value="'.$search.'" name="search" id="search" /><a href="javascript:void(0);" class="button submit-search" style="height:17px;line-height:19px;">Search</a> </div>');?>
<table class="data_table">
    <thead>
        <tr>
            <!--<th><input type="checkbox" class="check-all" /></th>-->
            <!--<th>Id</th>-->
            <th>
				Student
				<?php if($sortorder == 'asc' && $sort == 'sid'): ?>
				<a href="<?php echo $currentUrl.'/sortorder/desc/sort/sid'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
				<?php else: ?>
				<a href="<?php echo $currentUrl.'/sortorder/asc/sort/sid'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
				<?php endif;?>
			</th>
			
			
            <th>
				Tutor
				<?php if($sortorder == 'asc' && $sort == 'tid'): ?>
				<a href="<?php echo $currentUrl.'/sortorder/desc/sort/tid'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
				<?php else: ?>
				<a href="<?php echo $currentUrl.'/sortorder/asc/sort/tid'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
				<?php endif;?>
			</th>
			
            <th>
				Type
				<?php if($sortorder == 'asc' && $sort == 'type'): ?>
				<a href="<?php echo $currentUrl.'/sortorder/desc/sort/type'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
				<?php else: ?>
				<a href="<?php echo $currentUrl.'/sortorder/asc/sort/type'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
				<?php endif;?>
			</th>

			
			
            <th>
				Payment Status
				<?php if($sortorder == 'asc' && $sort == 'paymentstatus'): ?>
				<a href="<?php echo $currentUrl.'/sortorder/desc/sort/paymentstatus'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
				<?php else: ?>
				<a href="<?php echo $currentUrl.'/sortorder/asc/sort/paymentstatus'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
				<?php endif;?>
			</th>
             <th>Amount</th>
            <th>
				Payment Date
				<?php if($sortorder == 'asc' && $sort == 'createAt'): ?>
				<a href="<?php echo $currentUrl.'/sortorder/desc/sort/createAt'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-n"></span></a>
				<?php else: ?>
				<a href="<?php echo $currentUrl.'/sortorder/asc/sort/createAt'.'/limit/'.$limit.'/page/'.$page; ?>"><span class="css_right ui-icon ui-icon-triangle-1-s"></span></a>
				<?php endif;?>
			</th>
           <th>Status</th>
            
           
        </tr>
    </thead>

    <tbody>
	<?php

	?>
    <?php $j = 0; foreach ($payments as $key => $val) :?>
        <tr id="id_<?php echo $val['id'];?>">
           <!-- <td><input type="checkbox" name="ids[]" value="<?php echo $val['id'];?>" /></td>-->
            <!--<td><?php echo $val['id'];?></td>-->
			<td><?php echo @$val['student'];?></td>
			<td><?php echo @$val['tutor'];?></td>
			<td><?php echo @$val['type'];?></td>
			
            <td>
            <?php
            	//if($val['status'] == 1)
				if($val['status'] == 'paid'){
            		echo $val['status'];
				}else{
					echo "Unpaid";
				}
            	//else 
            		//echo "UnPaid";
            ?>
            </td>
             <td>
				<?php 
					//echo $val['money'];
					echo $val['tutorhRate'];
				?>
			</td>
			<td>
				<?php
					$currentDtStr = strtotime($val['creatAt']);
					$hourdiff = 72;
					
					echo date('Y-m-d',$currentDtStr + ($hourdiff * 3600) );
				?>
			</td>
			 <!--  <td><?php echo $val['date'];?></td>-->
            <?php 
            	// hour calculation
            	$h1 = date('Y-m-d H:i:s',time());
            	$h1 = strtotime($h1);
            	
            	$h2  = strtotime($val['creatAt']);
            	//calcaulate difference
            	$diff = round(($h1 - $h2) / 3600);
            	
            	if($diff >= 72)
            	{
            		$class = "actiondisabled";
					?>
					<td id="actions" class="<?php echo $class; ?>" >
						<img alt="Postpone" src="<?php echo base_url('/images/postpon-gray.png');?>" />
						<img alt="Approve" src="<?php echo base_url('/images/approve-gray.png');?>" />
						<img alt="delete" src="<?php echo  base_url('images/close-gray.png')?>" />
					</td>
					
				<?php	
            	}else{
					$class = "actionenabled";
					?>
					<td id="actions" class="<?php echo $class; ?>" >
						<?php if($val['postpone'] == 1 OR $val['approve'] == 1){?>
						<img alt="Postpone" src="<?php echo base_url('/images/postpon-gray.png');?>" />
						<?php }else{ ?>
						<a href="javascript:void(0);" class="poscat" mid="<?php echo $val['id']; ?>" title="Postpone"><img alt="Postpone" src="<?php echo base_url('/images/postpon-red.png');?>" /></a>
						<?php } ?>
						<?php if($val['approve'] == 1){?>
						<img alt="Approve" src="<?php echo base_url('/images/approve-gray.png');?>" />
						<?php }else{?>
						<a href="javascript:void(0);" class="appcat" mid="<?php echo $val['id']; ?>" val="<?php echo $val['approve']; ?>" title="Approve"><img alt="Approve" src="<?php echo base_url('/images/approve-red.png');?>" /></a>
						<?php } ?>
						<?php if($val['approve'] == 1){?>
							<img alt="delete" src="<?php echo  base_url('images/close-gray.png')?>" />
						<?php }else{?>
						<a href="javascript:void(0);" class="delcat" mid="<?php echo $val['id']; ?>" title="Delete"><img alt="delete" src="<?php echo  base_url('images/close-red.png')?>" /></a> 
						<?php } ?>
					</td>	
					<?php
				}
            	
            	
            ?>
            
			
        </tr>
	<?php endforeach; ?>
    </tbody>
    <tfoot>
	
        <tr>
            <td colspan="6">
            <div class="bulk-actions align-left">
			<span>Display</span>
            <select name="limit" id="limit" onchange="changelimit(this.value);">
                <option value="10" <?php if($limit == 10){echo 'selected="selected"';} ?>>10</option>
                <option value="20" <?php if($limit == 20){echo 'selected="selected"';} ?>>20</option>
                <option value="50" <?php if($limit == 50){echo 'selected="selected"';} ?>>50</option>
                <option value="100" <?php if($limit == 100){echo 'selected="selected"';} ?>>100</option>
             </select> 
             <!--<a href="javascript:void(0);" id="apply" class="button">Apply to selected</a>-->
			 </div>

            <div class="pagination">
				<?php echo $pagination; ?>
            </div>
            <!-- End .pagination -->
            <div class="clear"></div>
            </td>
        </tr>
    </tfoot>
	
</table>
<script type="text/javascript">
function changelimit(limit)
{
	window.location.href="<?php echo base_url().'admin/disputeResolution/limit/'?>"+limit;
}
setTimeout('showmenu("dresolution",0)',1000);
function del(_id){
//alert(_id);return false;
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
//alert(_id);return false;
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
	//alert(_val);return false;
	if(window.confirm('Are you sure you want to approve this payment?')){
		$.post('<?php echo Base_url("admin/disputes_approve")?>',{id:_id,approveval:_val},function(msg){
		/*alert(msg);
		return false;*/
			if (String == msg.constructor) {      
				eval ('var json = ' + msg);
			} else {
				var json = msg;
			}
			
			if(json.status){
				$('.appcat').attr('val',json.val);
				alert('Payment has been successfully paid.');
				location.reload();
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
		var currentPage = window.location.href;
	
		$form = $("<form id='disputeslist' method='post' action='"+currentPage+"'></form>");
		$form.append('<input type="hidden" name="search" id="search" value="'+search+'" />');
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


/*$('td.actiondisabled a').attr("disabled", true);*/
</script>


</body>
</html>
