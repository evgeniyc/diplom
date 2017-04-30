<?php
/* @var $this ValuesController */
/* @var $model Values */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'values-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'game'); ?>
		<?php 
			$vmodel = Games::model()->findAll();
			echo $form->dropDownList($model,'game', CHtml::listData($vmodel,'id', 'name')); ?>
		<?php echo $form->error($model,'game'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', array(0 => 'Аккаунти чи предмети', 1 => 'Валюта')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'units'); ?>
		<?$umodel = Units::model()->findAll();
			echo $form->dropDownList($model,'units', CHtml::listData($umodel,'id', 'name')); ?>
		<?php echo $form->error($model,'units'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Обновити'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->