<?php

class ResultController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', 
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
		$model=new Result;

		if(isset($_POST['Result']['oper_id']))
		{
			$oper_id = intval($_POST['Result']['oper_id']);
			$model=$this->loadModel($oper_id);
			$this->render('view', array('model'=>$model));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function loadModel($id)
	{
		$model=Result::model()->find('oper_id='.$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
