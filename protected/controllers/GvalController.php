<?php

class GvalController extends Controller
{
	//Властивості класу:
	public $layout='//layouts/column2';
	
	//Фільтри:
	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete', 
		);
	}
	
	//Правила доступу до дій:
	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','update','buy'),
				'users'=>array('@'),
			),
			array('allow', 
				'users'=>array('admin'),
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}
	
	//Дії:
	//Дія перегляду одного екземпляру моделі:
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	//Дія створення екземпляру моделі:
	public function actionCreate($id)
	{
		$model=new Gval('create');
			$model->hoster = Yii::app()->user->id;
			$model->game = $id;
		if(isset($_POST['Gval']))
		{
			$model->attributes=$_POST['Gval'];
			if($model->save())
			{
				Yii::app()->user->setFlash('create_op','Операція створення успішно збережена!');
				$this->redirect(array('gval/view','id'=>$model->id));
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	//Дія оновлення екземпляру моделі:
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Gval']))
		{
			$model->attributes=$_POST['Gval'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array('model'=>$model));
	}
	
	//Дія виконання операції купівлі (створення екземпляру операції):
	public function actionBuy($id)
	{
		$model=$this->loadModel($id);
		if($model->hoster == Yii::app()->user->id)
			throw new CHttpException('Операція неможлива, продавець не може бути покупцем!');
		$sum = $model->quantity;
		if(isset($_POST['Gval']))
		{
			$model->attributes=$_POST['Gval'];
			$rest = $model->quantity;
			$model->quantity = $sum - $rest;
			if($model->save())
			{
				$op_model = new Operations;
				$op_model->hoster = $model->hoster;
				$op_model->buyer = Yii::app()->user->id;
				$op_model->price = $model->price;
				$op_model->quantity = $rest;
				$op_model->op_id = $model->id;
				$op_model->game = $model->game;
				$op_model->val_name = $model->name;
				$op_model->server = $model->server;
				if($op_model->save())
				{
					if($model->quantity == 0)
						$model->gdescr->delete();
						$model->delete();
					$mes = new Message;
					$mes->nfrom = 1;
					$mes->nto = $op_model->hoster;
					$mes->text = 'Проведена операція купівлі юзером '.Yii::app()->user->name.', зверніть, будь ласка, увагу!';
					$mes->save();
					Yii::app()->user->setFlash('buy_op','Операція купівлі успішно збережена! Для оплати натисніть кнопку "Оплатити"');
					$this->redirect(array('operations/index'));
				}
			}
		}
		$this->render('buy',array(
			'model'=>$model, 'id'=>$id,
		));
	}
	
	//Дія видалення екземпляру моделі:
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	//Дія виведення групи всіх екземплярів моделі за ідентиіфкатором гри:
	public function actionIndex($id)
	{
		$model=new Gval('search');
		$model->unsetAttributes();
		if(isset($_GET['Gval']))
			$model->attributes=$_GET['Gval'];
		$model->game = $id;
		$this->render('index',array(
			'model'=>$model, 'id' => $id,
		));
    }

	//Дія виведення сторінки даміністрування:
	public function actionAdmin()
	{
		$model=new Gval('search');
		$model->unsetAttributes();
		if(isset($_GET['Gval']))
			$model->attributes=$_GET['Gval'];
		$this->render('admin',array(
			'model'=>$model));
	}

	//Функція отримання екземпляру моделі за первинним ключем:
	public function loadModel($id)
	{
		$model=Gval::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	//Функція виконання асинхронної валідації моделі при заповненні форми створення
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gval-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
