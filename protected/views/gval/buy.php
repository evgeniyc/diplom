<?php
/* @var $this GvalController */
/* @var $model Gval */

$this->breadcrumbs=array(
	'Купівля',
);

$this->menu=array(
	
);
?>

<h1>Купівля цінності у грі "<?php echo $model->gname->name; ?>"</h1>


<p>
	Продавець: <?php echo $model->guser->login; ?><br><br>
	Ціна: <?php echo $model->price; ?>
</p>
	
<p class="note">Введіть суму яка б не перевищувала число у полі ввода.</p>

<?php $this->renderPartial('_bform', array('model'=>$model)); ?>