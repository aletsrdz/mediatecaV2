<?php

/**
 * This is the model class for table "aprendiente".
 *
 * The followings are the available columns in table 'aprendiente':
 * @property string $idaprendiente
 * @property string $nombre
 * @property string $apaterno
 * @property string $amaterno
 * @property string $rfc
 * @property string $numcuenta
 * @property string $email
 * @property string $sexo
 * @property string $calle
 * @property string $colonia
 * @property string $municipio
 * @property string $estado
 * @property string $fechanacimiento
 * @property string $telefono
 * @property integer $categoria
 * @property integer $dependencia
 * @property integer $subdependencia
 * @property string $observaciones
 * @property integer $codiogopostal
 *
 * The followings are the available model relations:
 * @property Inscripcion $inscripcion
 */
class Aprendiente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aprendiente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apaterno, amaterno, email', 'required'),
			array('categoria, dependencia, subdependencia, codiogopostal', 'numerical', 'integerOnly'=>true),
			array('apaterno, amaterno, rfc, numcuenta, email, sexo, calle, colonia, municipio, estado, fechanacimiento, telefono, observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idaprendiente, nombre, apaterno, amaterno, rfc, numcuenta, email, sexo, calle, colonia, municipio, estado, fechanacimiento, telefono, categoria, dependencia, subdependencia, observaciones, codiogopostal', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inscripcion' => array(self::HAS_ONE, 'Inscripcion', 'idaprendiente'),
            
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idaprendiente' => '',
			'nombre' => 'Nombre',
			'apaterno' => 'Apellido Paterno',
			'amaterno' => 'Apellido Materno',
			'rfc' => 'RFC',
			'numcuenta' => 'No. Cuenta',
			'email' => 'Email',
			'sexo' => 'Genero',
			'calle' => 'Calle',
			'colonia' => 'Colonia',
			'municipio' => 'Municipio',
			'estado' => 'Estado',
			'fechanacimiento' => 'Fecha de Nacimiento',
			'telefono' => 'Tel.',
			'categoria' => 'Categoria',
			'dependencia' => 'Dependencia',
			'subdependencia' => 'Subdependencia',
			'observaciones' => 'Observaciones',
			'codiogopostal' => 'Codigo Postal',
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

		$criteria->compare('idaprendiente',$this->idaprendiente,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apaterno',$this->apaterno,true);
		$criteria->compare('amaterno',$this->amaterno,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('numcuenta',$this->numcuenta,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fechanacimiento',$this->fechanacimiento,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('categoria',$this->categoria);
		$criteria->compare('dependencia',$this->dependencia);
		$criteria->compare('subdependencia',$this->subdependencia);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('codiogopostal',$this->codiogopostal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aprendiente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    

    
    public function getMenuDependencia()
    {
        $dependencia = Dependencia::model()->findAll();
        return CHtml::listData($dependencia,"dependencia" ,"SelectDependencia");
    }
    
   /*
    public function getMenuSubdependencia($dependencia = 323)
    {
        $subdependencia = Subdependencia::model()->findAll("dependencia=?", array($dependencia));
        return CHtml::listData($subdependencia,"subdep" ,"SelectSubdependencia");
    }
    */
        
    public function getMenuSubdependencia($dependencia)
    {
        if($dependencia == null) $dependencia = 323;
        $subdependencia = Subdependencia::model()->findAll('dependencia=?',array($dependencia));
        return CHtml::listData($subdependencia,"subdep","SelectSubdependencia");
        //return $this->subdep." ".$this->nomabrevia;    
    }
	
	 
    
    
}
