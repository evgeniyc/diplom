<?php

class MessageController extends Controller
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
				'actions'=>array('index', 'view', 'create','update', 'delete','complete','server','serv','val'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$model = $this->loadModel($id);
		if($model->state == null)
		{
			$model->state = 1;
			$model->save();
			$model->state = 'Непрочитане!';
		}
		else $model->state = 'Прочитане';
		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new Message;

		if(isset($_POST['Message']))
		{
			$model->attributes=$_POST['Message'];
			$model->nfrom = Yii::app()->user->id;
			$nto = User::model()->findByAttributes(array('login'=>$model->nto));
			if(isset($nto))
				$model->nto = $nto->id;
			else 
				throw new CHttpException('Адресат відсутній');
			if($model->save())
			{
				Yii::app()->user->setFlash('message','Ваше Повідомлення відправлене!');
				$this->redirect(array('index'));
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionServer()
	{
		$games=Games::model()->findAll();
		if(isset($_POST['server']))
		{
			$game = $_POST['game'];
			$server = $_POST['server'];
			$model = new Message;
			$model->nfrom = Yii::app()->user->id;
			$model->nto = User::model()->findByAttributes(array('login'=>'admin'))->id;
			$model->text = 'Запит на додавання сервера у грі: '.$game.'. Ім\'я сервера: '.$server;
			if($model->save())
				$this->redirect(array('index'));
			else
				throw new CHttpException('Помилка відправлення запиту на додавання сервера');
		}
		$this->render('server',array(
			'model'=>$games,
		));
	}
	
	public function actionComplete($id)
	{
		$model=new Message;
		$data = Archive::model()->findByPk($id);
		$model->nfrom = 1;
		$model->nto = $data->buyer;
		$model->text = 'Операція купівлі-продажу з id = '.$id.' успішно виконана.';
		$model->save();
		$model = new Message;
		$model->nfrom = 1;
		$model->nto = $data->hoster;
		$model->text = 'Операція купівлі-продажу з id = '.$id.' успішно виконана.';
		$model->save();
		$this->redirect(array('site/index'));
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if($model->nto == Yii::app()->user->id || Yii::app()->user->name == 'admin')
		{
			$model->delete();
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else 
			throw new CHttpException(403,'Дія заборонена.');
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Message', array(
			'criteria'=>array(
				'condition'=>'nto="'.Yii::app()->user->id.'"',
				'order'=>'create_date DESC',
			),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Message('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Message']))
			$model->attributes=$_GET['Message'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Message::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='message-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
