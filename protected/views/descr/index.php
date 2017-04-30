<?php
/* @var $this DescrController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descrs',
);

$this->menu=array(
	array('label'=>'Create Descr', 'url'=>array('create')),
	array('label'=>'Manage Descr', 'url'=>array('admin')),
);
?>

<h1>Descrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
