<?php $this->layout->setLayoutData('content_for_layout_title','Add how it works');?>

<?php if(@$errormsg):?>
 <div class="notice_4" id="errormsg">
	<span class="notice_icon"></span> 
	<a class="close" href="javascript:void(0);" onclick="$('#errormsg').hide()">
		<img src="<?php echo base_url('images/cross_grey_small.png');?>" />
	</a>
	<p><?php echo $errormsg; ?></p>
</div>
<?php endif;?>
<form method="post" action="" name="addHowform" id="addHowform" enctype="multipart/form-data">
    <p class="ft_title">Title</p>
    <p class="setft"><input type="text" name="title" id="title" value=""  class="adm_box1" /></p>
    
    <!--<p class="ft_title">Video Title</p>
    <p class="setft"><input type="text" name="video_title" id="video_title" value=""  class="adm_box1" /></p>-->
    <p class="ft_title">Video</p>
    <p class="setft"><input type="file" name="video" id="video" value=""  class="adm_box1" /></p>
    <p class="ft_title">PDFs</p>
    <p class="setft"><input type="file" name="pdfs" id="pdfs" value=""  class="adm_box1" /></p>
    <p class="ft_title">Desc</p>
    <p class="setft"><textarea name="desc" id="desc"></textarea></p>
    
    <p class="setft"><a href="javascript:void(0)" onclick="checkform()" class="button">submit</a></p>
</form>


<script type="text/javascript">
function checkform(){
	$('#addHowform').submit();
}
setTimeout('showmenu("news",0)',1000);
</script>
</body>
</html>