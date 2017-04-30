<div class="form">
<?php
	echo CHtml::beginForm('https://merchant.webmoney.ru/lmi/payment.asp'),
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