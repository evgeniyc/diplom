<?php
/* @var $this ResultController */
/* @var $model Result */

$this->breadcrumbs=array(
	'Перегляд даних оплати',
);

$this->menu=array(
	array('label'=>'Новий запит', 'url'=>array('create')),
);
?>

<h1>Перегляд даних оплати за номером операції: <?php echo $model->oper_id; ?></h1>
<div id="result">
<?php 
	echo 'id = '.$model->id.'<br>';
	echo 'operation id = '.$model->oper_id.'<br><hr>';
	foreach($model->text as $key => $value)
	{
		echo $key.' = '.$value.'<br>';
	}
?>
</div>