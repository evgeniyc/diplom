<?php

class WmModule extends CWebModule
{

	/**
	* @autor Viacheslav Rudnev (RSol)
	*/
	public $orderClass;
	public $orderIdField;
	public $orderSumField;
	public $orderSuccessFunction;
	public $orderSuccesUrl=false;
	public $orderFailUrl=false;
	public $orderMessage=false;
	public $csrfToken=false;

	public $defaultController="Wmoptions";

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'wm.models.*',
			'application.models.*',
			'wm.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

	public function getOrderModel() {
		return new $this->orderClass;
	}
}
