<?php
$this->breadcrumbs=array(
	Yii::t('WmPayForm','WM Pay'),
);
?>
<h1><?php echo Yii::t('WmPayForm','Pay Form');?></h1>

<?php
	$orderSumField=$this->module->orderSumField;
	$orderIdField=$this->module->orderIdField;
	$csrfToken=$this->module->csrfToken;
	$this->widget('WmPayFormWidget', array('orderSum'=>$order->$orderSumField,
						'orderId'=>$order->$orderIdField,
						'orderMessage'=>$this->module->orderMessage,
						'csrfToken'=>$csrfToken,
						));
?>