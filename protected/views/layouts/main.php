<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">
<div id="page">

	<div id="header">
		<div id="logo">
			<div id="logo-name"><?php echo CHtml::encode(Yii::app()->name); ?></div>
			<div id="logo-descr"><?php echo CHtml::encode(Yii::app()->params['descr']); ?></div>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php
			$stat = false;
			if(!Yii::app()->user->isGuest)
			{
				$model = Message::model()->findByAttributes(array('nto'=>Yii::app()->user->id, 'state'=>null));
				if($model)
					$stat = true;
			}
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Головна', 'url'=>array('/site/index')),
				array('label'=>'Повідомлення', 
					'url'=>array('/message/index', 'id'=>Yii::app()->user->id), 
					'visible'=>!Yii::app()->user->isGuest,
					'linkOptions' => $stat == true ? array('class' =>'stat') : false,
				),
				array('label'=>'Операції', 'url'=>array('/operations/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Налаштування', 'url'=>array('/user/update', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Адміністрування', 'url'=>array('/admin/index'), 'visible'=>Yii::app()->user->name == "admin", 'itemOptions'=>array('class'=>'floatright')),
				array('label'=>'Вихід ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'itemOptions'=>array('class'=>'floatright')),
				array('label'=>'Реєстрація', 'url'=>array('/user/create'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions'=>array('class'=>'floatright')),
				array('label'=>'Вхід', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions'=>array('class'=>'floatright')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <?php echo CHtml::encode(Yii::app()->name); ?>.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->
</div>
</div><!-- page -->

</body>
</html>
