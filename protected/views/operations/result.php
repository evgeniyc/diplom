<?php
/* @var $this OperationsController */
/* @var $data */

$this->breadcrumbs=array(
	'Операції' => array('index'),
	'Результат',
);

$this->menu=array(
);
?>
<h1>Перевірка результату</h1>
<?php 
	echo '<h3>Отримані наступні дані:</h3>';
	echo 'oper_id = '.$id.'<br>';
	
	$models = Result::model()->findAll('oper_id = '.$id);
	foreach($models as $model)
	{
		foreach($model->text as $key=>$value)
		{
			echo $key.' = '.$value.'<br>';
		}
	}
?>