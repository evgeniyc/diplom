<?php
/* @var $this GamesController */
/* @var $model Games */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Створити гру', 'url'=>array('create')),
	array('label'=>'Оновити гру', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Видалити гру', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Керування іграми', 'url'=>array('admin')),
);
?>

<h1>Дані гри №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'img',
	),
)); ?>
