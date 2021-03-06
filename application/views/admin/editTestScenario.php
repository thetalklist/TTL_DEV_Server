<?php $this->layout->setLayoutData('content_for_layout_title','Edit Tutor Guide ');?>
<?php $this->layout->setLayoutData('content_for_layout_links','<a href="'.base_url('admin/ListTestScenario').'">  Tutor Guide</a>');?>
<?php if(@$errormsg):?>
	<div class="notice_4 notice_6" id="errormsg">
		<span class="notice_icon notice_icon6"></span> 
		<a class="close" href="javascript:void(0);" onclick="$('#errormsg').hide()">
		</a>
		<p><?php echo $errormsg; ?></p>
	</div>
<?php elseif(@$succrmsg):?>
	<div class="notice_4 notice_6" id="errormsg" style="background: none repeat scroll 0 0 green !important;color: #FFFFFF !important;">
	<span class="notice_icon6"></span> 
	<a class="notice_icon6 " href="javascript:void(0);" onclick="$('#errormsg').hide()">
	</a>
	<p ><?php echo $succrmsg; ?></p>
	</div>
<?php endif;?>

<form method="post" action="" name="editTresourcesform" id="editTresourcesform" enctype="multipart/form-data">
	
	<p class="ft_title">Type</p>
	<p class="setft">
		<select name="type">
 
		<option value="p">PDF</option>
		</select>
	</p>
 
 
  <p class="ft_title">Language</p>
	<p class="setft">
	<select name="lang" id="position" >
	
	<option <?php if($EditData['lang']==3) {?>selected <?php }?> value="3">English</option>
	<option <?php if($EditData['lang']==1) {?>selected <?php }?>value="1">CN Simplified</option>
	<option <?php if($EditData['lang']==2) {?>selected <?php }?> value="2">CN Traditional</option>
	<option <?php if($EditData['lang']==5) {?>selected <?php }?> value="5">Japanese</option>
	<option <?php if($EditData['lang']==6) {?>selected <?php }?> value="6">Korean</option>
	<option <?php if($EditData['lang']==7) {?>selected <?php }?> value="7">Portuguese</option>
	<option <?php if($EditData['lang']==8) {?>selected <?php }?> value="8">Spanish</option>
	<option <?php if($EditData['lang']==4) {?>selected <?php }?> value="4">French</option>
	
	</select></p>
 	
	
	 <p class="ft_title">categories</p>
	<p class="setft">
	<select name="categories" id="categories">
	 
	<?php for($i=0;$i<count($cat);$i++)
	{?>
	<option   <?php if($EditData['categories']==$cat[$i]['guide_categories_id']) {?>selected <?php }?>  value="<?php echo $cat[$i]['guide_categories_id'];?>"> <?php echo $cat[$i]['name']?></option>
	<?php }?>
	</select></p>
	 
	<span id="catreq" class="err" style="display:none;">select catagory</span>
	 
	 
	 
	 <p class="ft_title">Display Order</p>
	<p class="setft">
	<select name="orderNo" id="orderNo">
	
	<?php for($i=1;$i<=10;$i++)
	{?>
	<option  <?php if($EditData['orderNo']==$i) {?>selected <?php }?>  value="<?php echo $i; ?>"> <?php echo $i;?></option>
	<?php }?>
	</select></p>
	
	
	 
	<div id="vSection"  >
	<p class="ft_title">PDF Title</p>
	<p class="setft"><input type="text" name="Title" id="Title" value="<?php echo $EditData['Title'];?>"  class="adm_box1" /></p>
	<span class="err" id="titlereq" style="display:none;">Enter Title</span>
	<p class="ft_title">PDF</p>
	<p class="setft"><input type="file" name="pfile" id="pfile"  class="adm_box1" /></p>
	<span class="err" id="pdfreq" style="display:none;">Select PDF File</span>
	<p class="ft_title">Description</p>
   	<p class="setft"><textarea rows="8" cols="70"  name="Description" id="Description"><?php echo $EditData['Description'];?></textarea></p>
	<span class="err" id="descereq" style="display:none;">Enter Description</span>
	</div>
	

<p class="ft_title">Status</p>
<p class="setft">
<input type="radio" name="Status" value="1" <?php if($EditData['Status']=='1'){echo 'checked';} ?>/>Active
<input type="radio" name="Status" value="0" <?php if($EditData['Status']=='0'){echo 'checked';} ?> />Inactive 
</p>
<p class="setft" style="margin-top:15px;"><a href="javascript:void(0)" onclick="checkform()" class="button">submit</a>

<a style="margin-left:20px;" href="<?php echo base_url('admin/ListTestScenario');?>" onclick="checkform()" class="button">Cancel</a>
</p>
</form>

<style>
.err
{
	color:red;
}
</style>
<script type="text/javascript">setTimeout('showmenu("pcontent",18)',1000);
('input:file').change(
    function(e) {
        var files = e.originalEvent.target.files;
        for (var i=0, len=files.length; i<len; i++){
            var n = files[i].name,
                s = files[i].size,
                t = files[i].type;
            if(t=='application/pdf')
			{
			}
			else
			{
				alert('Only PDF files allowed.');
				$('#pfile').val('');
			}		
        }
    });
function checkform(){
		 if($('#categories').val() == 'sel')
	 {
		 $('#catreq').show();
		 return false;
	 }
	 else
	 {
		  $('#catreq').hide();
	 }		 
	 
	if($('#Title').val() == '')
	{ 
		$('#titlereq').show();
		 return false;
	}
	else
	{
		$('#titlereq').hide();
		 
	} 
 
	if($('#Description').val() == '')
	{ 
		$('#descereq').show();
		return false;
	}
	else
	{
		$('#descereq').hide();
		 
	}
	
	$('#editTresourcesform').submit();
}
function showResType(type){
	if(type == 'l'){
		$('#vSection').css('display', 'none');
		$('#lSection').css('display', 'block');
	}else{
		$('#vSection').css('display', 'block');
		$('#lSection').css('display', 'none');
	}
}

</script>
</body>
</html>