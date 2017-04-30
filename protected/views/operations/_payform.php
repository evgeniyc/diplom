<w3s.request>
    <reqn></reqn>
    <wmid></wmid>
    <sign></sign>
    <trans>
        <tranid></tranid>
        <pursesrc></pursesrc>
        <pursedest></pursedest>
        <amount></amount>
        <period></period>
        <pcode></pcode>
        <desc></desc>
        <wminvid></wminvid>
        <onlyauth>1</onlyauth>
    </trans>
<wmb_denomination>1</wmb_denomination>
</w3s.request>

<div class="form">
<?php
	echo CHtml::beginForm('https://w3s.webmoney.ru/asp/XMLTrans.asp'),
		 CHtml::hiddenField('LMI_PAYMENT_AMOUNT',floatval($orderSum)),
		 CHtml::hiddenField('LMI_PAYMENT_DESC',($orderMessage)?
		 			Yii::t('WmPayForm',$orderMessage,array('{$orderId}'=>$orderId)):
		 			Yii::t('WmPayForm','Pay for order #{$orderId}',array('{$orderId}'=>$orderId))),
		 CHtml::hiddenField('LMI_PAYMENT_NO',$orderId),
		 CHtml::hiddenField('LMI_PAYEE_PURSE',$options['purse']);
	echo ($options['mode']==9)?'':CHtml::hiddenField('LMI_SIM_MODE',$options['mode']);
	echo ($csrfToken)?CHtml::hiddenField('YII_CSRF_TOKEN',Yii::app()->request->csrfToken):'';
?>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('WmPayForm','Pay')); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php
include 'example.php';
$movies = new SimpleXMLElement($xmlstr);

$movies->movie[0]->characters->character[0]->name = 'Miss Coder';

echo $movies->asXML();
?>
<?php
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
 <movie>
  <title>PHP: Behind the Parser</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#211;r</actor>
   </character>
  </characters>
  <plot>
   So, this language. It's like, a programming language. Or is it a
   scripting language? All is revealed in this thrilling horror spoof
   of a documentary.
  </plot>
  <great-lines>
   <line>PHP solves all my web problems</line>
  </great-lines>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;
?>
