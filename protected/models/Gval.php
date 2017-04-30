<?php

/**
 * This is the model class for table "gval".
 *
 * The followings are the available columns in table 'gval':
 * @property string $id
 * @property string $name
 * @property string $game
 * @property string $side
 * @property string $hoster
 * @property string $price
 * @property string $quantity
 * @property string $units 
 * @property string $server
 * @property string $create_date
 */
class Gval extends CActiveRecord
{
	//Властивості моделі, які не зберігаються у базі даних:
	public $vname;
	public $vserv;
	public $descr;
	
	/**
	 * @Повертає імя класу асоційоване з імям таблиці у БД
	 */
	public function tableName()
	{
		return 'gval';
	}

	/**
	 * @Повертає масив правил валідації для атрибутів моделі.
	 */
	public function rules()
	{
		return array(
			array('name, price, quantity, server, side, units', 'required', 'on'=>'create'),
			array('game, hoster, quantity, side, server, units, descr','length','max'=>10),
			array('price','length','max'=>8),
			array('game, hoster, side, server, units, descr', 'numerical'),
			array('quantity', 'numerical', 'min'=>0, 'tooSmall'=>'Введене значення перевищує те, що є в наявності у продавця.'),
			array('name', 'length', 'max'=>16),
			array('vname', 'length', 'max'=>32),
			array('vname', 'length', 'max'=>24),
			// Правила, які використовуються методом search().
			array('vname, vserv, gdescr', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @повертає масив звязків з іншими моделями даних:
	 */
	public function relations()
	{
		return array(
			'gname'=>array(self::BELONGS_TO, 'Games', 'game'),
			'guser'=>array(self::BELONGS_TO, 'User', 'hoster'),
			'val'=>array(self::BELONGS_TO, 'Values', 'name'),
			'serv'=>array(self::BELONGS_TO, 'Server', 'server'),
			'nside'=>array(self::BELONGS_TO, 'Sides', 'side'),
			'uname'=>array(self::BELONGS_TO, 'Units', 'units'),
			'gdescr'=>array(self::HAS_ONE, 'Descr', 'id'),
		);
	}

	/**
	 * @повертає масив користувацькиї імен для властивостей моделі у форматі: (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'game' => 'Гра',
			'name' => 'Найменування',
			'hoster' => 'Продавець',
			'price' => 'Ціна',
			'quantity' => 'Кількість',
			'units' => 'Одиниці виміру',
			'side' => 'Сторона',
			'server' => 'Сервер',
			'create_date' => 'Дата створення',
			'vname' => 'Найменування',
			'vserv' => 'Сервер',
			'descr' => 'Опис',
			
		);
	}
	
	public function ssearch()
	{
		$criteria=new CDbCriteria;
		
		$criteria->compare('val.name', $this->vname, true);
		$criteria->compare('serv.name', $this->vserv, true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function search($id)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 't.game='.$id;
		$criteria->with = array('val','serv');
		$criteria->compare('val.name', $this->vname, true);
		$criteria->compare('serv.name', $this->vserv, true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gval the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
