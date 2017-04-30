<?php
/* @var $this GamesController */
/* @var $model Games */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	$model->name=>array('view','id'=>$model->id),
	'Оновити',
);

$this->menu=array(
	array('label'=>'Створити гру', 'url'=>array('create')),
	array('label'=>'Передивитись', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Керування', 'url'=>array('admin')),
);
?>

<h1>Оновити гру <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>