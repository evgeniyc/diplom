<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Повідомлення'=>array('index'),
	'Створити',
);

$this->menu=array(
	array('label'=>'Мої повідомлення', 'url'=>array('index')),
	array('label'=>'Керування повідомленнями', 'url'=>array('admin')),
);
?>

<h1>Створити повідомлення</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>