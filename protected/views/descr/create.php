<?php
/* @var $this DescrController */
/* @var $model Descr */

$this->breadcrumbs=array(
	'Створення опису',
);

$this->menu=array(
);
?>

<h1>Додавання опису до ігрової цінності</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>