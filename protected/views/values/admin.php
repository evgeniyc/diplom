<?php
/* @var $this ValuesController */
/* @var $model Values */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/admin'),
	'Керування елементами цінностей',
);

$this->menu=array(
	array('label'=>'Перелік цінностей', 'url'=>array('index')),
	array('label'=>'Створити цінність', 'url'=>array('create')),
);

?>

<h1>Керування елементами цінностей</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'values-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lgame.name',
		'name',
		array(
			'name'=>'units',
			'value'=>'$data->unit->name',
			'filter'=>'',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
