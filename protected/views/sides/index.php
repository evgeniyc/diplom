<?php
/* @var $this SidesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sides',
);

$this->menu=array(
	array('label'=>'Створити сторону', 'url'=>array('create')),
	array('label'=>'Керування сторонами', 'url'=>array('admin')),
);
?>

<h1>Sides</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
