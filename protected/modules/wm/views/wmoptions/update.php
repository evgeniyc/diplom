<?php
$this->breadcrumbs=array(
	Yii::t('WmPayForm','WM')=>array('update'),
	Yii::t('WmPayForm','Settiggs'),
);
?>

<h1><?php echo Yii::t('WmPayForm','WM Update'); ?></h1>

<?php echo Yii::t('WmPayForm','For right WebMoney settings please do follows:'); ?>
<ul>
	<li><?php echo Yii::t('WmPayForm','Result URL: '),CHtml::link($this->createAbsoluteUrl('/wm/wmoptions/result'),array('/wm/wmoptions/result')); ?></li>
	<li><?php echo Yii::t('WmPayForm','Success URL: '),CHtml::link($this->createAbsoluteUrl('/wm/wmoptions/success'),array('/wm/wmoptions/success')); ?></li>
	<li><?php echo Yii::t('WmPayForm','Fail URL: '),CHtml::link($this->createAbsoluteUrl('/wm/wmoptions/fail'),array('/wm/wmoptions/fail')); ?></li>
	<li><?php echo Yii::t('WmPayForm','All (Result, Success and Fail) method is POST'); ?></li>
	<li><?php echo Yii::t('WmPayForm','Method of sign formed is MD5'); ?></li>
</ul>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>