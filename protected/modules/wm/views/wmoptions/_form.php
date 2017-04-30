<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'purse'); ?>
		<?php echo CHtml::activeTextField($model,'purse',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo CHtml::error($model,'purse'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'secret'); ?>
		<?php echo CHtml::activeTextField($model,'secret',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'secret'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'mode'); ?>
		<?php echo CHtml::activeDropDownList($model,'mode',$model->modesOptions); ?>
		<?php echo CHtml::error($model,'mode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->