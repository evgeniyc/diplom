<?php
/* @var $this MessageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Повідомлення',
);

$this->menu=array(
	array('label'=>'Створити повідомлення', 'url'=>array('create')),
	array('label'=>'Запит на додавання сервера', 'url'=>array('server')),
);
if(Yii::app()->user->hasFlash('message')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('message'); ?>
</div>

<?php else: ?>
<h1>Мої повідомлення</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
endif;
