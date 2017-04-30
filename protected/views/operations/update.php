<?php
/* @var $this OperationsController */
/* @var $model Operations */

$this->breadcrumbs=array(
	'Операції'=>array('index','id'=>$model->buyer),
	$model->id=>array('view','id'=>$model->id),
	'Купівля',
);

$this->menu=array(
	array('label'=>'Перелік операцій', 'url'=>array('index', 'id'=>$model->id)),
);
?>

<h1>Підтвердження продажу <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>