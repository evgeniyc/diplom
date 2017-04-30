<?php
/* @var $this ValuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Values',
);

$this->menu=array(
	array('label'=>'Create Values', 'url'=>array('create')),
	array('label'=>'Manage Values', 'url'=>array('admin')),
);
?>

<h1>Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
