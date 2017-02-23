<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class BusquedaForm extends CFormModel
{
	public $busquedaEn;
	public $items;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// busquedaEn es requirido
			array('busquedaEn', 'required'),												
		);
	}
	
}