<?php
/* @var $this ResultController */
/* @var $model Result */

$this->breadcrumbs=array(
	'Дані оплати за номером операції',
);

$this->menu=array(
);
?>

<h1>Отримання даних оплати за номером операції:</h1>

<?php $this->renderPartial('_form',array('model'=>$model)); ?>