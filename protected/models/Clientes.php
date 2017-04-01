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

	public function attributeLabels()
	{
		return array(
			'id' => 'No.',
			'username' => 'Nombre de usuario',
			'password' => 'Password',
			'nombre' => 'Nombre',
			'apaterno' => 'Apeido paterno',
			'amaterno' => 'Apeido materno',
			'email' => 'Correo electrónico',
			'tipo' => 'Tipo de usuario',
			
		);
	}
	
	public function rules(){
		return array(
			array('username, password, nombre, apaterno, amaterno, email, tipo', 'required','message'=>'Campos Requeridos'),
		);
		
	}
	
	
}