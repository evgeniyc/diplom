<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Користувачі'=>array('index'),
	$model->login=>array('view','id'=>$model->id),
	'Налаштування',
);

$this->menu=array(
	
	//array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
	//array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Налаштування</h1>

<?php $this->renderPartial('_form1', array('model'=>$model)); ?>