<?php
/* @var $this GvalController */
/* @var $model Gval */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Керування цінностями',
);

$this->menu = array(
	array('label'=>'Додати елемент до цінностей', 'url'=>array('values/create')),
);
?>

<h1>Керування цінностями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gval-grid',
	'dataProvider'=>$model->ssearch(),
	'filter'=>$model,
	'columns'=>array(
		'val.name',
		'gname.name',
		'guser.login',
		'quantity',
		array(
			'name' => 'units',
			'value' => '$data->uname->name',
		),
		'price',
		'serv.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
