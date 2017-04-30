<?php
/* @var $this ArchiveController */
/* @var $data Archive */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hoster')); ?>:</b>
	<?php echo CHtml::encode($data->hoster); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyer')); ?>:</b>
	<?php echo CHtml::encode($data->buyer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('game')); ?>:</b>
	<?php echo CHtml::encode($data->game); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('val_name')); ?>:</b>
	<?php echo CHtml::encode($data->val_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('server')); ?>:</b>
	<?php echo CHtml::encode($data->server); ?>
	<br />

	*/ ?>

</div>