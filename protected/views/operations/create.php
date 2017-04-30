<?php
/* @var $this OperationsController */
/* @var $model Operations */

$this->breadcrumbs=array(
	'Операції'=>array('index','id'=>$model->hoster),
	$model->id=>array('view','id'=>$model->id),
	'Продаж',
);

$this->menu=array(
	array('label'=>'Перелік операцій', 'url'=>array('index', 'id'=>$model->hoster)),
);
?>

<h1>Операція "Продаж"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>