<?php
/* @var $this ResultController */
/* @var $model Result */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'result-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Введіть, будь ласка, id операції у поле вводу.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'oper_id'); ?>
		<?php echo $form->textField($model,'oper_id'); ?>
		<?php echo $form->error($model,'oper_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Отримати дані'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->