<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Керування користувачами',
);
?>

<h1>Керування користувачами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'login',
		'password',
		'email',
		'purse',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
