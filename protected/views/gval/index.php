<?php
/* @var $this GvalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Продаж',
);

$this->menu=array(
	array('label'=>'Створити нову продаж', 'url'=>array('gval/create','id'=>$id)),
);

$vmodel = Values::model()->findAllByAttributes(array('game'=>$id));
$smodel = Server::model()->findAllByAttributes(array('game'=>$id));
?>

<h1>Продаж за найменуванням гри "<?php echo $model->gname->name;?>"</h1>
<span class="required">*</span><span class = "descr_note">Для того щоб побачити опис ігрової цінності натисніть на її найменування</span>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gval-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'CLinkColumn',
			'labelExpression'=>'$data->val->name',
			'urlExpression'=>'Yii::app()->createUrl("descr/view",array("id"=>$data->id))',
			'linkHtmlOptions'=>array('class'=>'ajax-popup-link'),
		),
		array(
			'name'=>'hoster',
			'value'=>'$data->guser->login',
			'filter'=>'',
		),
		array(
			'name'=>'side',
			'value'=>'$data->nside->name',
		),
		array(
			'name'=>'quantity',
			'value'=>'$data->quantity',
			'filter'=>'',
		),
		array(
			'name'=>'price',
			'value'=>'$data->price',
			'filter'=>'',
		),
		array(
			'name'=>'units',
			'value'=>'$data->uname->name',
			'filter'=>'',
		),
		array(
			'name'=>'vserv',
			'value'=>'$data->serv->name',
			'filter'=>CHtml::listData($smodel,'name','name'),
		),
		array(           
            'class'=>'CButtonColumn',
			'buttons'=>array(
				'buy' => array(
					'label'=>'Купити',     
					'url'=>'Yii::app()->createUrl("gval/buy",array("id"=>$data->id))',
					'visible'=>'Yii::app()->user->id !== $data->hoster', 
				),
				'view'=>array(
					'visible'=>'Yii::app()->user->id == $data->hoster',
				),
			),
			'template'=>'{buy}{view}',
        ),
	),
));

$this->widget("ext.magnific-popup.EMagnificPopup", array('target' => '.ajax-popup-link'));

