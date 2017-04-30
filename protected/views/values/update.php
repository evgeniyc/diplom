<?php
/* @var $this ValuesController */
/* @var $model Values */

$this->breadcrumbs=array(
	'Values'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Values', 'url'=>array('index')),
	array('label'=>'Create Values', 'url'=>array('create')),
	array('label'=>'View Values', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Values', 'url'=>array('admin')),
);
?>

<h1>Update Values <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>