<?php $this->layout->setLayoutData('content_for_layout_title','Advertisement list');?>
<?php $this->layout->setLayoutData('content_for_layout_links','<a href="'.base_url('admin/ad_add').'">Add new Advertisement</a>');?>

<table class="data_table">
    <thead>
        <tr>
            <th><input type="checkbox" class="check-all" /></th>
            <th>Id</th>
            <th>Title</th>
            <th>Link</th>
            <th>Thumb</th>
            <th>Options</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($howItworks as $key => $val) :?>
        <tr id="id_<?php echo $val['id'];?>">
            <td><input type="checkbox" name="ids[]" value="<?php echo $val['id'];?>" /></td>
            <td><?php echo $val['id'];?></td>
            <td><?php echo $val['title'];?></td>
            <td><?php echo $val['link'];?></td>
            <td><img src="<?php echo base_url('uploads/images/ad/'.$val['source']);?>" width="140px" height="100px"/></td>
            <td>
            <a href="<?php echo base_url('admin/ad_edit/id/'.$val['id']);?>"><img alt="Edit" src="<?php echo base_url('/images/cm_pencil.png');?>" /></a>
            <a href="javascript:void(0);" class="delcat" mid="<?php echo $val['id']; ?>"><img alt="delete" src="<?php echo  base_url('images/cm_cross.png')?>" /></a> 
            </td>
        </tr>
	<?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">
            <div class="bulk-actions align-left">
            <select name="dropdown" id="action">
                <option value="0">Choose an action...</option>
                <option value="1">Delete</option>
             </select> 
             <a href="javascript:void(0);" id="apply" class="button">Apply to selected</a></div>

            <div class="pagination">
            
            </div>
            <!-- End .pagination -->
            <div class="clear"></div>
            </td>
        </tr>
    </tfoot>
</table>
<script type="text/javascript">
setTimeout('showmenu("ad",0)',1000);
function del(_id){
	if(window.confirm('Are you sure you want to delete this?')){
		$.post('<?php echo Base_url("admin/ad_del")?>',{id:_id},function(msg){
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
$(function(){
	$(".check-all").click(function() {
		$("input[name='ids[]']").attr('checked', this.checked);
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
})
</script>
</body>
</html>
