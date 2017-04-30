<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Одиниці виміру'=>array('index'),
	'Керування',
);

$this->menu=array(
	array('label'=>'Перелік одиниць виміру', 'url'=>array('index')),
	array('label'=>'Створити нову одиницю виміру', 'url'=>array('create')),
);
?>

<h1>Керування одиницями виміру</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'units-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'ngame.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
