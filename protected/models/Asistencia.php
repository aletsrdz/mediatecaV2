<?php

/**
 * This is the model class for table "asistencia".
 *
 * The followings are the available columns in table 'asistencia':
 * @property integer $idaprendiente
 * @property string $horaentrada
 * @property string $horasalida
 * @property string $estatus
 *
 * The followings are the available model relations:
 * @property Aprendiente $idaprendiente0
 */
class Asistencia extends CActiveRecord
{
	public $nombre_search;	

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asistencia2';
	}


	public function primaryKey()
	{		
		return array('idaprendiente', 'horaentrada');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		return array(			
			array('idaprendiente', 'required'),
			array('idaprendiente', 'length', 'min'=>'6', 'tooShort'=>'El código del aprendiente válido es longitud 6', 'max'=>'10', 'tooLong'=>"El código del aprendiente es menor a 10"),
			array('idaprendiente', 'validarEstatus'),			
			array('idaprendiente','exist','allowEmpty' => false, 'attributeName' => 'idaprendiente', 'className' => 'Aprendiente2',
			      'message'=>'El aprendiente NO esta inscrito, favor de inscribirse',
			      'criteria' => array('condition'=> 'inscripcion=:inscripcion', 
			      	 'params'=>array(':inscripcion'=>'t')), 
				),
			array('idaprendiente', 'numerical', 'allowEmpty'=> false, 'integerOnly'=>true,),
			array('idaprendiente', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idaprendiente, horaentrada, horasalida, estatus, nombre_search ', 'safe', 'on'=>'search'),
		);
	}

	

	public function validarEstatus()
	{
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'idaprendiente=:idaprendiente AND estatus=:estatus';
		$criteria->params= array(':idaprendiente'=>$this->idaprendiente, ':estatus'=>'true');
	
		if (Asistencia::model()->exists($criteria))			
        	$this->addError('idaprendiente', 'Ya se encuentra dentro de la MEDIATECA y no ha registrado su salida');
        elseif($this->idaprendiente == "123456")
			$this->addError('idaprendiente', 'Ingresaste 123456');	
		
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			#'idaprendiente0' => array(self::BELONGS_TO, 'Aprendiente', 'idaprendiente'),
			'idaprendiente0' => array(self::BELONGS_TO, 'Aprendiente', 'idaprendiente'),
			'nombre_aprendiente' => array(self::BELONGS_TO, 'Aprendiente2', 'idaprendiente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idaprendiente' => 'No',			
			'horaentrada' => 'Hora de entrada',
			'horasalida' => 'Hora de salida',
			'estatus' => 'Estatus',
			'nombre_search' => 'Nombre del Aprendiente',
			
			
		);
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
		$sort = new CSort();
		$criteria->with = array('nombre_aprendiente');
		$criteria->compare('idaprendiente',$this->idaprendiente);
		$criteria->compare('nombre_aprendiente.nombre',$this->nombre_search, true);
		$criteria->compare('horaentrada',$this->horaentrada,true);
		$criteria->compare('horasalida',$this->horasalida,true);
		$criteria->compare('estatus',$this->estatus='true',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
						'attributes'=>array(							
							'nombre_search'=>array(
								'asc'=>'nombre_aprendiente.nombre ASC',
								'desc'=>'nombre_aprendiente.nombre DESC',
							),
						),
                        'defaultOrder'=>'horaentrada DESC',						
                    ),
			'pagination'=>array('pageSize'=>15),


		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asistencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
