<?php
/* @var $this SidesController */
/* @var $model Sides */

$this->breadcrumbs=array(
	'Сторони'=>array('index'),
	'Створити',
);

$this->menu=array(
	array('label'=>'Список сторін', 'url'=>array('index')),
	array('label'=>'Керування сторонами', 'url'=>array('admin')),
);
?>

<h1>Створення сторони</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>