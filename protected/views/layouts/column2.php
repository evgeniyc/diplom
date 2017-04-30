<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-24">
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Інструменти:',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
<!--	<span class="simplechattitle">Простий чат:</span>
<div id='chat'></div> -->
<?php /*
    $this->widget('YiiChatWidget',array(
        'chat_id'=>'123',                   // a chat identificator
        'identity'=>Yii::app()->user->id,                      // the user, Yii::app()->user->id ?
        'selector'=>'#chat',                // were it will be inserted
        'minPostLen'=>2,                    // min and
        'maxPostLen'=>10,                   // max string size for post
        'model'=>new ChatHandler(),    // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
        'data'=>'any data',                 // data passed to the handler
        // success and error handlers, both optionals.
        'onSuccess'=>new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
        'onError'=>new CJavaScriptExpression(
            "function(errorcode, info){  }"),
    ));*/
?>
	</div><!-- sidebar -->
</div>
</div>
<?php $this->endContent(); ?>
