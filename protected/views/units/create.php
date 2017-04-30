<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Одиниці виміру'=>array('index'),
	'Створення',
);

$this->menu=array(
	array('label'=>'Перелік одиниць виміру', 'url'=>array('index')),
	array('label'=>'Керування', 'url'=>array('admin')),
);
?>

<h1>Створення нової одиниці виміру</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>