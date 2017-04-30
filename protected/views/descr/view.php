<?php
/* @var $this DescrController */
/* @var $model Descr */

$this->breadcrumbs=array(
	'Descrs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Змінити опис', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Видалити опис', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Перегляд опису до ігрової цінності з id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'text',
	),
)); ?>
