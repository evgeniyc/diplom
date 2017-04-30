<?php
/* @var $this ValuesController */
/* @var $model Values */

$this->breadcrumbs=array(
	'Всі цінності'=>array('index'),
	'Створити',
);

$this->menu=array(
	array('label'=>'Керування елементами цінностей', 'url'=>array('admin')),
);
?>

<h1>Створення елемента ігровой цінності</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>