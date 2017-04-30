<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Користувачі',
);

$this->menu=array(
	array('label'=>'Додати користувача', 'url'=>array('create')),
	array('label'=>'Керування', 'url'=>array('admin')),
);
?>

<h1>Перелік користувачів</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
