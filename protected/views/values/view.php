<?php
/* @var $this ValuesController */
/* @var $model Values */

$this->breadcrumbs=array(
	'Елементи ігрових цінностей'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Видалити', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Керування', 'url'=>array('admin')),
);
?>

<h1>Детелі елемента ігрових цінностей</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'lgame.name',
		'type',
	),
)); ?>
