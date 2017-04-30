<?php
/* @var $this DescrController */
/* @var $model Descr */

$this->breadcrumbs=array(
	'Descrs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Descr', 'url'=>array('index')),
	array('label'=>'Create Descr', 'url'=>array('create')),
	array('label'=>'View Descr', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Descr', 'url'=>array('admin')),
);
?>

<h1>Update Descr <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>