<?php
/* @var $this GamesController */
/* @var $model Games */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Ігри'=>array('index'),
	'Керування іграми',
);

$this->menu=array(
	array('label'=>'Список ігор', 'url'=>array('index')),
	array('label'=>'Додати гру', 'url'=>array('create')),
);

?>

<h1>Адміністрування ігор</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'games-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'img',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
