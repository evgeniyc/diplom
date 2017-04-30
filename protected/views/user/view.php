<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Користувачі'=>array('index'),
	'Користувач №'.$model->id,
);

$this->menu=array(
	array('label'=>'Редагувати облікові дані', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Видалити аккаунт', 'url'=>array('user/delete', 'id'=>$model->id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Ви впевнені, що хочете видалити аккаунт?')),
);
?>

<h1>Дані користувача №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'email',
		'purse',
	),
)); ?>
