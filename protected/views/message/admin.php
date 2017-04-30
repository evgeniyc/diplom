<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Адміністрування'=>array('admin/index'),
	'Керування повідомленнями',
);
$this->layout = '//layouts/column1';
?>

<h1>Керування повідомленнями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'message-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(            // display 'author.username' using an expression
            'name'=>'nfrom',
            'value'=>'$data->lfrom->login',
        ),
		'text',
		'state',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
