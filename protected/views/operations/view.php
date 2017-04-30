<?php
/* @var $this OperationsController */
/* @var $model Operations */

$this->breadcrumbs=array(
	'Операції'=>array('index'),
	$model->id,
);

$this->menu=array(
);
?>

<h1>Деталі операції #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label' => 'Продавець',
			'value' => $model->lhoster->login,
		),
		'lgame.name',
		'lval_name.name',
		'lserver.name',
		'price',
		'quantity',
		array(
			'label' => 'Сума',
			'value' => $model->price * $model->quantity,
		),
		array(
			'label' => 'Статус',
			'value' => $model->status == true ? 'Завершена' : 'Не завершена',
		),
		'create_date',
	),
));

