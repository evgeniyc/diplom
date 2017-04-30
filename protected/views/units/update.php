<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Одиниці виміру'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Оновити',
);

$this->menu=array(
	array('label'=>'Перелік одиниць виміру', 'url'=>array('index')),
	array('label'=>'Створити', 'url'=>array('create')),
	array('label'=>'Переглянути деталі', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Керування одиницями виміру', 'url'=>array('admin')),
);
?>

<h1>Update Units <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>