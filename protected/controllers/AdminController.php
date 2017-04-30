<?php

class AdminController extends Controller
{
	public $layout='//layouts/column1';

	public function filters()
	{
		return array(
			'accessControl', // виконує управління доступом для CRUD операцій
			'postOnly + delete', // дозволяє видалення за допомогою запиту POST
		);
	}

	/**
	Визначає правила управління доступом
	 */
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

	
	/**
	 * Рендерінг сторінки адміністрування.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

}