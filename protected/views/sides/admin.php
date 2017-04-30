<?php
/* @var $this SidesController */
/* @var $model Sides */

$this->breadcrumbs=array(
	'Сторони'=>array('index'),
	'Керування',
);

$this->menu=array(
	array('label'=>'Список сторін', 'url'=>array('index')),
	array('label'=>'Створити сторону', 'url'=>array('create')),
);
?>

<h1>Керування сторонами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sides-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'gname.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
