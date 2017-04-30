<?php
/* @var $this ServerController */
/* @var $model Server */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Сервер '.$model->id,
);

$this->menu=array(
	array('label'=>'Створити сервер', 'url'=>array('create')),
	array('label'=>'Редагувати сервер', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Видалити сервер', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Ви впевнені, що хочете видалити цей сервер?')),
	array('label'=>'Керування серверами', 'url'=>array('admin')),
);
?>

<h1>Перегляд даних сервера №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'ngame.name',
	),
)); ?>
