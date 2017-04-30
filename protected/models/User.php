<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $login
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, email, first_name, last_name', 'required', 'on'=>'create'),
			array('id', 'length', 'max'=>10),
			array('login', 'length', 'max'=>16),
			array('login', 'unique'),
			array('purse', 'length',  'max'=>24, 'allowEmpty'=>true),
			array('password', 'length', 'max'=>32),
			array('first_name, last_name', 'length', 'max'=>24),
			array('email', 'length', 'max'=>32),
			array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, password, first_name, last_name, email, group', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ідентифікатор',
			'login' => 'Логін',
			'password' => 'Пароль',
			'first_name'=>'Ім\'я',
			'last_name'=>'Прізвище',
			'email' => 'email',
			'purse' => 'Гаманець',
		);
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->password = md5($this->password);
		return parent::beforeSave();
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
