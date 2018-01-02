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

$arrVal 	= $this->lookup_model->getValue('17', $multi_lang);
$labout_title	= $arrVal[$multi_lang];

$arrVal 	= $this->lookup_model->getValue('16', $multi_lang);
$labout_content	= $arrVal[$multi_lang];
?>
<?php $this->layout->appendFile('css',"css/terms.css");?>
<div class="terms">
	<!--<div class="terms_top">
	<?php //echo $article['title'];
	echo $labout_title;
	?></div>-->
	<div class="terms_mid" id="aboutUsArticle">
		<?php //echo $article['desc'];?>
		<?php //echo str_replace('&quot;', '"', html_entity_decode( $labout_content, ENT_NOQUOTES, 'UTF-8' ));
		echo str_replace('&quot;', '"', $labout_content);
		?>
	</div>
</div>