<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div id="game" class="row">
		<?php echo CHtml::label('Оберіть гру:','game'); ?>
		<?php echo CHtml::dropDownList('game','', CHtml::listData($model,'name', 'name')); ?>
	</div>
	
	<div id="server" class="row">
		<?php echo CHtml::label('Введіть сервер:','server'); ?>
		<?php echo CHtml::textField('server'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Зберегти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
