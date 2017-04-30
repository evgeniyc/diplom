<?php
/* @var $this GvalController */
/* @var $model Gval */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gval-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row lgval">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php 
			$vmodel = Values::model()->findAll('game='.$model->game);
			echo $form->dropDownList($model,'name', CHtml::listData($vmodel,'id', 'name')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row lgval">
		<?php echo $form->labelEx($model,'side'); ?>
		<?php 
			$smodel = Sides::model()->findAll('game='.$model->game);
			echo $form->dropDownList($model,'side', CHtml::listData($smodel,'id', 'name')); ?>
		<?php echo $form->error($model,'side'); ?>
	</div>
	
	<div class="row lgval">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row lgval">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>
	
	<div class="row lgval">
		<?php echo $form->labelEx($model,'units'); ?>
		<?php 
			$smodel = Units::model()->findAll('game='.$model->game);
			echo $form->dropDownList($model,'units', CHtml::listData($smodel,'id', 'name')); ?>
		<?php echo $form->error($model,'units'); ?>
	</div>

	<div class="row lgval">
		<?php echo $form->labelEx($model,'server'); ?>
		<?php 
			$vmodel = Server::model()->findAll('game='.$model->game);
			echo $form->dropDownList($model,'server', CHtml::listData($vmodel,'id', 'name')); ?>
		<?php echo $form->error($model,'server'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->