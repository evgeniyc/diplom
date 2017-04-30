<?php
/* @var $this OperationsController */
/* @var $model Operations */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Керування операціями',
);

$this->menu=array(
	
);
?>
<h1>Керування операціями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'operations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'hoster',
		'type',
		'quantity',
		'amount',
		'create_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
