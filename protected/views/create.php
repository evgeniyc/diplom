<?php
/* @var $this GvalController */
/* @var $model Gval */

$this->breadcrumbs=array(
	'Створити цінність',
);
?>

<h1>Створення цінності у грі "<?php echo $model->gname->name; ?>"</h1>

<?php $this->renderPartial('_cform', array('model'=>$model)); ?>