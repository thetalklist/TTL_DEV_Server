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

$arrVal = $this->lookup_model->getValue('1123', $multi_lang);
$ThisTutAffiliate = $arrVal[$multi_lang];
$arrVal = $this->lookup_model->getValue('1124', $multi_lang);
$SelectToConfirm = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('901', $multi_lang);
$ConvesationS = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('900', $multi_lang);
$CUrriculams = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1125', $multi_lang);
$InformalSpeaking = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('1126', $multi_lang);
$StructureLearning = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('321', $multi_lang);
$CreditsTut = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('482', $multi_lang);
$Oks = $arrVal[$multi_lang];

$arrVal = $this->lookup_model->getValue('412', $multi_lang);
$Cancels = $arrVal[$multi_lang];
?>


<div id="dialog1" title="" style="display:None;">
			<div class="ratelist">
				<span class="title" style="float:left"><?php echo $ThisTutAffiliate;?></span>  
			</div>
			<div class="ratelist">
				<br><br><br><p><span class="title" style="float:left"><?php echo $SelectToConfirm;?></span>  </p>
				<br><br><br>
				<input type="radio" name="amex" value="0" checked> <?php echo $ConvesationS;?> - <?php echo $InformalSpeaking;?> <?php echo ($SessionCost['tutorcost']);?> <?php echo $CreditsTut;?><br><br>
				<input type="radio" name="amex" value="1">  <?php echo $CUrriculams;?>    - <?php echo $StructureLearning;?> <?php echo ($SessionCost['schooltutorcost']);?>  <?php echo $CreditsTut;?>
 				<p class="clearer"></p>
			</div>
			<p><input type="button" value="<?php echo $Oks;?>"  id="rateButton12" class="blu-btn"/>
			<input type="button" value="<?php echo $Cancels;?>" onclick="closeFunc();" class="blu-btn"/>
			</p>
		</div>