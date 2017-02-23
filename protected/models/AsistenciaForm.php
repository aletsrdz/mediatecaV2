<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
 
class AsistenciaForm extends CFormModel
{
	public $codigo;

	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// busquedaEn es requirido
			array('codigo', 'required'),
			array('codigo', 'codigo_existe'),
		);
	}
	
	public function codigo_existe($attribute, $params)
	{
		
		$codigo = ['270667', '221065', '221061'];
		foreach($codigo as $val)
		{
			if($this->codigo == $val)
			{
				$this->addError($attribute, "El codigo EXISTE");
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
}