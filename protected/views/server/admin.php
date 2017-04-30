<?php
/* @var $this ServerController */
/* @var $model Server */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Керування серверами',
);

$this->menu=array(
	array('label'=>'Створити сервер', 'url'=>array('create')),
);
?>

<h1>Керування серверами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'server-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'game',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
