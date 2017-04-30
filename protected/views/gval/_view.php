<?php
/* @var $this GvalController */
/* @var $data Gval */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->val->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('server')); ?>:</b>
	<?php 
		if($data->server == 1)
			$data->sever = 'Europe';
		else
			$data->server = 'NorthAmerica';
		echo CHtml::encode($data->server); ?>
	<br />


</div>