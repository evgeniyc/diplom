<?php
/* @var $this OperationsController */
/* @var $data */

$this->breadcrumbs=array(
	'Операції' => array('index'),
	'Результат',
);

$this->menu=array(
);
?>
<h1>Перевірка результату</h1>
<?php 
	if(is_array($data))
	{
		foreach($data as $key => $value)
		{
			echo $key.' = '.$value.'<br>';
		}
	}
	else if(is_object($data))
	{
		$var_dump($data);
	}
	else
		echo 'Nothing received';
	
?>