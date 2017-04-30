<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Створення користувача',
);
?>

<h1>Створення користувача</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>