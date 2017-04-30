<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Одиниці виміру'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Перелік', 'url'=>array('index')),
	array('label'=>'Створити', 'url'=>array('create')),
	array('label'=>'Оновити', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Видалити', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Керування', 'url'=>array('admin')),
);
?>

<h1>Пеогляд деталей одиниці виміру #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'ngame.name',
	),
)); ?>
