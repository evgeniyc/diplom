<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Адміністрування',
);
?>
<h1>Сторінка Адміністратора</h1>

<p>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('games/admin'); ?>'">Керування Іграми</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('sides/admin'); ?>'">Керування Сторонами</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('server/admin'); ?>'">Керування Серверами</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('units/admin'); ?>'">Керування одиницями виміру</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('gval/admin'); ?>'">Керування Цінностями</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('user/admin'); ?>'">Керування Користувачами</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('message/admin'); ?>'">Керування Повідомленнями</button>
	<button onclick="location.href = '<?php echo Yii::app()->createUrl('result/create'); ?>'">Перегляд даних оплати за номером операції</button>
</p>
