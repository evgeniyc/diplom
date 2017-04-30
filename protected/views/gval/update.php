<?php
/* @var $this GvalController */
/* @var $model Gval */

$this->breadcrumbs=array(
	'Редагування цінності',
);

$this->menu=array(
);
?>

<h1>Редагування цінності у грі "<?php echo $model->gname->name; ?>"</h1>

<?php $this->renderPartial('_cform', array('model'=>$model)); ?>