<?php

class OperationsController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete', 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('result', 'success', 'fail'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','index','view', 'read', 'complete'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('admin','delete', 'update'),
				'users'=>array('admin'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new Operations;

		// $this->performAjaxValidation($model);

		if(isset($_POST['Operations']))
		{
			$model->attributes=$_POST['Operations'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// $this->performAjaxValidation($model);

		if(isset($_POST['Operations']))
		{
			$model->attributes=$_POST['Operations'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$this->layout = '//layouts/column1';
		$dataProvider=new CActiveDataProvider('Operations', array(
			'criteria' => array(
				'condition'=>'hoster='.Yii::app()->user->id.' OR buyer='.Yii::app()->user->id,
				'order'=>'create_date DESC',
				),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	
	public function actionResult()
	{
		$model = new Result();
		$model->text = $_POST;
		if(isset($_POST['LMI_PAYMENT_NO']) && isset($_POST['LMI_SYS_TRANS_NO']))
		{
			$model->oper_id = intval($_POST['LMI_PAYMENT_NO']);
			$trans = intval($_POST['LMI_SYS_TRANS_NO']);
			$oper = Operations::model()->find('id='.$model->oper_id);
			$oper->status = 1;
			$oper->save();
			$model->save();
		}
		else
			$model->oper_id = 1;
		$this->render('result', array('id'=>$model->oper_id));
	}
	
	public function actionComplete($id)
	{
		$oper = Operations::model()->findByPk($id);
		$arch = new Archive;
		$arch->hoster = $oper->hoster;
		$arch->buyer = $oper->buyer;
		$arch->quantity = $oper->quantity;
		$arch->price = $oper->price;
		$arch->amount = $oper->amount;
		$arch->game = $oper->game;
		$arch->val_name = $oper->val_name;
		$arch->server = $oper->server;
		$arch->save();
		$oper->delete();
		$id = $arch->id;
		$this->redirect(array('message/complete','id'=>$id));
	}

	public function actionAdmin()
	{
		$model=new Operations('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Operations']))
			$model->attributes=$_GET['Operations'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Operations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='operations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
