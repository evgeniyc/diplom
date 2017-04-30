<?php

class WmPayFormWidget extends CWidget
{
    public $orderSum;
    public $orderId;
    public $orderMessage=false;
    public $csrfToken=false;

    public function run()
    {
		$connection=Yii::app()->db;

		$sql='SELECT secret,purse,mode FROM wmoptions WHERE id=1';
		$command=$connection->createCommand($sql);
		$options=$command->queryRow();
		$this->render('_wmPayForm',array(
			'options'=>$options,
			'orderId'=>$this->orderId,
			'orderSum'=>$this->orderSum,
			'orderMessage'=>$this->orderMessage,
			'csrfToken'=>$this->csrfToken,
		));
    }
}
