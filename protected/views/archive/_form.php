<?php
/* @var $this ArchiveController */
/* @var $model Archive */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'archive-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hoster'); ?>
		<?php echo $form->textField($model,'hoster',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hoster'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buyer'); ?>
		<?php echo $form->textField($model,'buyer',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'buyer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game'); ?>
		<?php echo $form->textField($model,'game',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'game'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'val_name'); ?>
		<?php echo $form->textField($model,'val_name',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'val_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'server'); ?>
		<?php echo $form->textField($model,'server',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'server'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->