<?php
/* @var $this GvalController */
/* @var $model Gval */

$this->breadcrumbs=array(
	'Деталі цінності',
);

$this->menu=array(
	array('label'=>'Створити нову', 'url'=>array('create','id'=>$model->game)),
	array('label'=>'Редагувати', 'url'=>array('update', 'id'=>$model->id, 'game'=>1)),
	array('label'=>'Видалити', 'url'=>array('delete', 'id'=>$model->id)), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Ви впевнені, що бажаєте видалити цінність?'),
	array('label'=>'Додати опис', 'url'=>array('descr/create', 'id'=>$model->id)),
);
if(Yii::app()->user->hasFlash('create_op')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('create_op'); ?>
</div>

<?php endif; ?>

<h1>Перегляд даних цінності</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'val.name',
		'guser.login',
		'gname.name',
		'price',
		'quantity',
		array(
			'label'=>'Одиниці виміру',
			'value'=>$model->uname->name,
		),
		array(
			'label'=>'Сума',
			'value'=>$model->price*$model->quantity,
		),
		'serv.name',
		'create_date',
		'gdescr.text',
	),
));
