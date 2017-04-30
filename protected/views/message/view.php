<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Повідомлення'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Отримані повідомлення', 'url'=>array('index')),
	array('label'=>'Створити', 'url'=>array('create')),
	array('label'=>'Видалити', 'url'=>array('delete','id'=>$model->id)),
);
?>
<h1>Перегляд повідомлення #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label' => 'Від кого',
			'value' => $model->lfrom->login,
		),
		'text',
		'state',
	),
)); ?>
