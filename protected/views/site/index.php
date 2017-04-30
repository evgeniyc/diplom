<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$gmodels = Games::model()->findAll(array('order'=>'id ASC'));
$i = 0;
?>

<h1>Запрошуємо до нашого сайту <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div class="container">
	<?php foreach ($gmodels as $gmodel)
	{
		echo '<div class="span-8 log"><a href="#" id="'.$gmodel->id.'" class="ev">'.CHtml::image(Yii::app()->baseUrl.'/images/'.$gmodel->img).'</a></div>';
	} 
	?>
</div>
<div id="modal_form"><!-- Сaмo oкнo --> 
      <span id="modal_close">X</span><br><!-- Кнoпкa зaкрыть --> 
	  <h4> Бажаєте виконати операцію купівлі чи продажу?</h4>
	  <button id="buy">Купити</button><button id="sell">Продати</button>
     
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->
<?php Yii::app()->clientScript->registerScript('add_last_tag', '
	$( ".log").each(function(i){
		if(!((i+1)%3))
			$(this).addClass("last");
	})', 
	CClientScript::POS_READY);