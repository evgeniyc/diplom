<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property string $id
 * @property string $nfrom
 * @property string $nto
 * @property string $text
 * @property integer $state
 */
class Message extends CActiveRecord
{
	public function tableName()
	{
		return 'message';
	}

	public function rules()
	{
		return array(
			array('nfrom, nto, text', 'required'),
			array('state', 'boolean'),
			array('nfrom, nto', 'length', 'max'=>32),
			array('text', 'length', 'max'=>256),
			array('id, nfrom, nto, text, state', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'lfrom'=>array(self::BELONGS_TO, 'User', 'nfrom'),
			'lto'=>array(self::BELONGS_TO, 'User', 'nto'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Ідентифікатор',
			'nfrom' => 'Від кого',
			'nto' => 'Кому',
			'text' => 'Вміст',
			'state' => 'Стан',
			'create_date' => 'Дата створення',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nfrom',$this->nfrom,true);
		$criteria->compare('nto',$this->nto,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
