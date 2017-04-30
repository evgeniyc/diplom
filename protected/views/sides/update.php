<?php
/* @var $this SidesController */
/* @var $model Sides */

$this->breadcrumbs=array(
	'Сторони'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Оновлення',
);

$this->menu=array(
	array('label'=>'Перелік сторін', 'url'=>array('index')),
	array('label'=>'Створити', 'url'=>array('create')),
	array('label'=>'Передивитись', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Керування сторонами', 'url'=>array('admin')),
);
?>

<h1>Оновлення сторони у грі <?php echo $model->gname->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>