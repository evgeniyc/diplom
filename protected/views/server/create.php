<?php
/* @var $this ServerController */
/* @var $model Server */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Створити сервер',
);

$this->menu=array(
	array('label'=>'Керування серверами', 'url'=>array('admin')),
);
?>

<h1>Створити сервер</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>