<?php

class WmForm extends CFormModel
{

/*
1. Кошелек продавца (LMI_PAYEE_PURSE);
2. Сумма платежа (LMI_PAYMENT_AMOUNT);
3. Внутренний номер покупки продавца (LMI_PAYMENT_NO);
4. Флаг тестового режима (LMI_MODE);
5. Внутренний номер счета в системе WebMoney Transfer (LMI_SYS_INVS_NO);
6. Внутренний номер платежа в системе WebMoney Transfer (LMI_SYS_TRANS_NO);
7. Дата и время выполнения платежа (LMI_SYS_TRANS_DATE);
8. Secret Key (LMI_SECRET_KEY);
9. Кошелек покупателя (LMI_PAYER_PURSE);
10. WMId покупателя (LMI_PAYER_WM).
*/

	public $LMI_PAYEE_PURSE;
	public $LMI_PAYMENT_AMOUNT;
	public $LMI_PAYMENT_NO;
	public $LMI_MODE;
	public $LMI_SYS_INVS_NO;
	public $LMI_SYS_TRANS_NO;
	public $LMI_SYS_TRANS_DATE;
	public $LMI_SECRET_KEY;
	public $LMI_PAYER_PURSE;
	public $LMI_PAYER_WM;

	private $_options;

	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			array('LMI_PAYMENT_NO,LMI_MODE,LMI_SYS_INVS_NO,LMI_SYS_TRANS_NO,LMI_PAYER_WM', 'numerical', 'integerOnly'=>true),
			array('LMI_PAYMENT_AMOUNT', 'numerical'),
			array('LMI_PAYER_WM', 'match','pattern'=>'/\d{12}/i','message'=>Yii::t('models','WMID format must be 12 nomber')),
			array('LMI_PAYEE_PURSE,LMI_PAYER_PURSE', 'match','pattern'=>'/[z,u,r]\d{12}/i','message'=>Yii::t('models','Purse format must be 1 letter and 12 nomber')),
			array('LMI_SECRET_KEY', 'safe'),
			array('LMI_HASH', 'isTrueSign'),
			array('LMI_PAYEE_PURSE', 'isTruePurse'),
			array('LMI_MODE', 'isTrueMode'),
			array('LMI_PAYMENT_AMOUNT', 'isTrueAmount'),
		);
	}

	/**
	* Fill options var
	*/
	public function init()
	{
		$connection=Yii::app()->db;
		$sql='SELECT secret,purse,mode FROM wmoptions WHERE id=1';
		$command=$connection->createCommand($sql);
		$this->_options=$command->queryRow();
	}

	/**
	* Check true payee purse
	*/
	private function isTruePurse($attribute,$params)
	{
		if($this->_options['purse']!=$this->LMI_PAYEE_PURSE){
			throw new CHttpException(400,Yii::t('WmPayForm','Error purse.'));
		}
	}

	/**
	* Check true mode
	*/
	private function isTrueMode($attribute,$params)
	{
		if($this->_options['mode']!=$this->LMI_MODE){
			throw new CHttpException(400,Yii::t('WmPayForm','Error mode.'));
		}
	}

	/**
	* Check true paymant amount
	*/
	private function isTrueAmount($attribute,$params)
	{
		$order=$this->module->getOrderModel()->findByPk(intval($this->LMI_PAYMENT_NO));
		$orderSumField=$this->module->orderSumField;
		if(floatval($order->$orderSumField)!=floatval($this->LMI_PAYMENT_AMOUNT)){
			throw new CHttpException(400,Yii::t('WmPayForm','Error amount.'));
		}
	}

	/**
	* Check true sign
	*/
	private function isTrueSign($attribute,$params)
	{
		$sign=$this->LMI_PAYEE_PURSE.
			$this->LMI_PAYMENT_AMOUNT.
			$this->LMI_PAYMENT_NO.
			$this->LMI_MODE.
			$this->LMI_SYS_INVS_NO.
			$this->LMI_SYS_TRANS_NO.
			$this->LMI_SYS_TRANS_DATE.
			$this->_options['secret'].
			$this->LMI_PAYER_PURSE.
			$this->LMI_PAYER_WM;

		$sign=strtoupper(md5($sign));
		if($sign!=$this->LMI_HASH){
			throw new CHttpException(400,Yii::t('WmPayForm','Error sign.'));
		}
	}
}