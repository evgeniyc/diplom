<?php

/**
 * This is the model class for table "operations".
 *
 * The followings are the available columns in table 'operations':
 * @property integer $id
 * @property integer $hoster
 * @property integer $buyer
 * @property integer $price
 * @property integer $quantity
 * @property integer $amount
 * @property integer $side
 * @property string $create_date
 */
class Operations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hoster, quantity, price', 'required'),
			array('hoster, buyer, game, val_name, server, side', 'numerical', 'integerOnly'=>true),
			array('status' ,'boolean'),
			array('hoster, buyer, quantity, price, game, val_name, server, amount', 'length', 'max'=>10),
			array('id, hoster, buyer, status, quantity, amount, create_date, game, val_name, server', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'lhoster'=>array(self::BELONGS_TO, 'User', 'hoster'),
			'lbuyer'=>array(self::BELONGS_TO, 'User', 'buyer'),
			'lgame'=>array(self::BELONGS_TO, 'Games', 'game'),
			'lval_name'=>array(self::BELONGS_TO, 'Values', 'val_name'),
			'lserver'=>array(self::BELONGS_TO, 'Server', 'server'),
			'lside'=>array(self::BELONGS_TO, 'Sides', 'side'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hoster' => 'Продавець',
			'buyer' => 'Покупець',
			'status' => 'Статус',
			'quantity' => 'Кількість',
			'price' => 'Ціна',
			'amount' => 'Сума',
			'create_date' => 'Дата створення',
			'game' => 'Гра',
			'val_name' => 'Цінність',
			'side' => 'Сторона',
			'server' => 'Сервер',
		);
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->amount = $this->quantity * $this->price;
		return parent::beforeSave();
	}
	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hoster',$this->hoster,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Operations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
