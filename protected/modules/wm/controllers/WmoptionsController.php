<?php

class WmoptionsController extends Controller
{

	public $defaultAction='update';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('result','success','fail','payForm'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	* Success message
	*/
	public function actionSuccess(){
		$message=Yii::t('WmPayForm','WM pay success');
		$this->render('message',array(
			'message'=>$message,
		));
	}

	/**
	* Fail message
	*/
	public function actionFail(){
		$message=Yii::t('WmPayForm','WM pay fail');
		$this->render('message',array(
			'message'=>$message,
		));
	}

	/**
	* Result action - create model WmForm, validate it and run success order method
	*/
	public function actionResult(){
		$this->layout=false;

		$wmForm=new WmForm;
		$wmForm->LMI_PAYEE_PURSE=$_POST['LMI_PAYEE_PURSE'];
		$wmForm->LMI_PAYMENT_AMOUNT=$_POST['LMI_PAYMENT_AMOUNT'];
		$wmForm->LMI_PAYMENT_NO=$_POST['LMI_PAYMENT_NO'];
		$wmForm->LMI_MODE=$_POST['LMI_MODE'];
		$wmForm->LMI_SYS_INVS_NO=$_POST['LMI_SYS_INVS_NO'];
		$wmForm->LMI_SYS_TRANS_NO=$_POST['LMI_SYS_TRANS_NO'];
		$wmForm->LMI_SYS_TRANS_DATE=$_POST['LMI_SYS_TRANS_DATE'];
		$wmForm->LMI_SECRET_KEY=$_POST['LMI_SECRET_KEY'];
		$wmForm->LMI_PAYER_PURSE=$_POST['LMI_PAYER_PURSE'];
		$wmForm->LMI_PAYER_WM=$_POST['LMI_PAYER_WM'];

		if($wmForm->validate()){
//			if($wmForm->LMI_MODE!=0){
//				exit('OK');
//			}else{
				$order=$this->module->getOrderModel()->findByPk(intval($this->LMI_PAYMENT_NO));
				$orderSuccessFunction=$this->module->orderSuccessFunction;
				$order->$orderSuccessFunction();
				exit('OK');
//			}
		}
	}

	/**
	* Output pay form (for more detale see WmPayFormWidget)
	*/
	public function actionPayForm(){
		$order=$this->module->getOrderModel()->findByPk(intval($_GET['id']));

		$this->render('create',array(
			'order'=>$order,
		));
	}

	/**
	* Output WM options form and save it
	*/
	public function actionUpdate(){
		//$this->pageDescription='123';
		//$this->pageKeywords='sdf';
		$this->layout='column1';

		$model=Wmoptions::model()->findByPk(1);
		if(isset($_POST['Wmoptions']))
		{
			$model->attributes=$_POST['Wmoptions'];
			if($model->save()){
				$message=Yii::t('WmPayForm','WM options successful update');
				$this->render('message',array(
					'message'=>$message,
				));
			}
		}else
			$this->render('update',array(
				'model'=>$model,
			));
	}

}
