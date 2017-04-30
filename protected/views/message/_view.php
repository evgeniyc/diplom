<?php
/* @var $this MessageController */
/* @var $data Message */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	
	<?php 
		echo CHtml::encode($data->create_date); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('nfrom')); ?>:</b>
	<?php 
		echo CHtml::encode($data->lfrom->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php 
			echo $data->state == false ? 'Непрочитане' : 'Прочитане'; ?>
	<br />
	<?php echo CHtml::link('Передивитись' , array('view', 'id'=>$data->id)); ?>

</div>