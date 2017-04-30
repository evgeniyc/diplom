<?php
/* @var $this OperationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Операції',
);

$this->menu=array(
	'Архів платежів' => array('archive/index'),
);
if(Yii::app()->user->hasFlash('buy_op')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('buy_op'); ?>
</div>

<?php endif; ?>

<h1>Мої операції</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'lval_name.name',
        array(
			'name'=>'hoster',
			'value'=>'$data->lhoster->login',
		),
		array(
			'name'=>'buyer',
			'value'=>'$data->lbuyer->login != 1 ? $data->lbuyer->login : "Не визначений"',
		),
		array(
			'name'=>'status',
			'value' => '$data->hoster == Yii::app()->user->id ? "Продаж" : "Купівля"',
		),	
		'price',
		'quantity',
		'amount',
		array(
			'name'=>'side',
			'value' => '$data->lside->name',
		),	
		'create_date',
		array(           
            'class'=>'CButtonColumn',
			'buttons'=>array(
				'buy' => array(
					'label'=> 'До оплати', 
					'url'=>'Yii::app()->createUrl("/wm/wmoptions/payform",array("id"=>$data->id))',
					'visible' => '$data->buyer == Yii::app()->user->id && $data->status == null', 
				),
				'complete' => array(
					'label'=> 'Завершити',     // text label of the button
					'url'=>'Yii::app()->createUrl("operations/complete", array("id"=>$data->id))',
					'visible'=> '$data->buyer == Yii::app()->user->id && $data->status == 1',
				),
			),
			'template'=>'{buy}{complete}',
        ),
    ),
));
?>