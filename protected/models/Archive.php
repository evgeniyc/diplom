<?php

/**
 * This is the model class for table "archive".
 *
 * The followings are the available columns in table 'archive':
 * @property string $id
 * @property string $hoster
 * @property string $buyer
 * @property string $quantity
 * @property string $price
 * @property string $amount
 * @property string $create_date
 * @property string $game
 * @property string $val_name
 * @property string $server
 */
class Archive extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archive';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hoster, quantity, price, amount, game, val_name, server', 'required'),
			array('hoster, buyer, quantity, price, amount, game, val_name, server', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hoster, buyer, quantity, price, amount, create_date, game, val_name, server', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hoster' => 'Господар',
			'buyer' => 'Покупець',
			'quantity' => 'Кількість',
			'price' => 'Ціна',
			'amount' => 'Сума',
			'create_date' => 'Дата створення',
			'game' => 'Гра',
			'val_name' => 'Цінність',
			'server' => 'Сервер',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hoster',$this->hoster,true);
		$criteria->compare('buyer',$this->buyer,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('game',$this->game,true);
		$criteria->compare('val_name',$this->val_name,true);
		$criteria->compare('server',$this->server,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Archive the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
