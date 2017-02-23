<?php 
class Clientes extends CActiveRecord
{
	 public static function model($className=__CLASS__)
	 {
		return parent::model($className);
	 } 
	
	 public function tableName()
	{
		return 'clientes';
	}
	
	public function rules(){
		return array(
			array('username, password, nombre, apaterno, amaterno, email, tipo', 'required','message'=>'Campos Requeridos'),
		);
		
	}
	
	
}