<?php
/* @var $this GamesController */
/* @var $model Games */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Створити гру',
);

$this->menu=array(
	array('label'=>'Керування іграми', 'url'=>array('admin')),
);
?>

<h1>Створити гру</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>