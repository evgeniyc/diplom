<?php

/**
 * This is the model class for table "values".
 *
 * The followings are the available columns in table 'values':
 * @property string $id
 * @property string $name
 * @property string $game
 * @property string $type
 *
 * The followings are the available model relations:
 * @property User $game0
 */
class Values extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'values';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, game', 'required'),
			array('id, game, units', 'length', 'max'=>10),
			array('id, game', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>24),
			array('units','numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, game, units', 'safe', 'on'=>'search'),
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
			'lgame' => array(self::BELONGS_TO, 'Games', 'game'),
			'unit' => array(self::BELONGS_TO, 'Units', 'units'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Найменування',
			'game' => 'Гра',
			'type' => 'Тип',
			'units' => 'Одиниці виміру',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('game',$this->game,true);
		$criteria->compare('units',$this->units,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Values the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
