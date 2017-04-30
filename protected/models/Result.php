<?php

/**
 * This is the model class for table "result".
 *
 * The followings are the available columns in table 'result':
 * @property string $id
 * @property string $text
 */
class Result extends CActiveRecord
{
	public function tableName()
	{
		return 'result';
	}

	public function rules()
	{
		return array(
			array('text', 'required', 'on'=>'Save'),
			array('oper_id, id','numerical','integerOnly'=>true),
			array('oper_id, id','length','max'=>10),
			array('text','filter','filter'=>array($obj=new CHtmlPurifier(),'purify')),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'oper_id' => 'id операції',
			'text' => 'Текст',
		);
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->text = serialize($this->text);
		return parent::beforeSave();
	}
	
	public function AfterFind()
	{
		$this->text = unserialize($this->text);
		return parent::AfterFind();
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
