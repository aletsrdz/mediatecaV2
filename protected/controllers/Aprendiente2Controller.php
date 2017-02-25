<?php

class Aprendiente2Controller extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	#public $layout='//layouts/column2'; // layout por default
	public $layout='//layouts/lefty';	

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','generarCredencial'),
				#'users'=>array('*'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','generarCredencial'),
				#'users'=>array('@'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','generarCredencial'),
				#'users'=>array('admin'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionGenerarCredencial($id = null, $nombre= null, $idioma= null)
	{
		
		//$idioma = "JAPONÉS";
		$imageCele = Yii::getPathOfAlias("webroot.images.cele1");
		$imageUnam = Yii::getPathOfAlias("webroot.images.unam150");
		
		Yii::import("ext.fpdf.*");
			
		$pdf = new Code39();
		$pdf->AddPage();
		$pdf->f_Code39(123, 45, $id);
		$pdf->Rect(21,7,83, 23); //cabecera izq
		$pdf->Rect(107,7,83, 23); //firma
		$pdf->Image($imageUnam.".jpg",25,10,-400);		
		$pdf->Image($imageCele.".png",85,10,-300);
		$pdf->SetFont('Arial','',7);
		$pdf->SetXY(40,10);
		$pdf->MultiCell(45,3,'Universidad Nacional Autónoma de México', 0, 'C');
		$pdf->SetXY(40,16);
		$pdf->MultiCell(45,3,'Centro de Enseñanza de Lenguas Extranjeras', 0, 'C');
		$pdf->SetXY(40,23);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(45,6, 'Mediateca',0,0,'C');
		$pdf->SetXY(130,24);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(40,5, 'Firma',0,0,'C');
		$pdf->Line(117,23, 182, 23);
		$pdf->Rect(20,6,85, 67); //Rect 1
		$pdf->Rect(106,6,85, 67); // Rect2 codigo de barras 
		$pdf->Rect(107,31,83, 41); // Rect interno codigo de barras
		$pdf->Rect(21,31,35, 41); // Foto
		$pdf->Rect(57,31,47, 20); // Nombre
		$pdf->Rect(57,52,47, 20); // Idioma e ID usuario
		$pdf->SetXY(130,33);
		$pdf->SetFont('Arial','',6);
		$pdf->MultiCell(40,3,'El usurio será responsable del mal uso que se ahga de esta credencial', 0, 'C');
		$pdf->SetXY(61,33);
		$pdf->SetFont('Arial','',8);
		$pdf->MultiCell(40,5,$nombre, 0, 'C');
		$pdf->SetXY(61,45);
		$pdf->Cell(40,4, 'Nombre',0,0,'C');
		$pdf->SetXY(61,53);
		$pdf->Cell(40,5, $idioma,0,0,'C');
		$pdf->SetXY(61,59);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(40,5, 'Idioma',0,0,'C');
		$pdf->SetXY(61,66);
		$pdf->Cell(15,5, 'ID. de Usr:',0,0,'C');
		$pdf->Cell(25,5, $id,0,0,'C');
		$pdf->Output();
		
		$this->render('credencial',array("bruce"=>$bruce));
		
	}
	
	public function actionSubdepByDep(){				
		
		$dependencia = $_POST['Aprendiente']['dependencia'];        
		
        $lista = Subdependencia::model()->findAll('dependencia = :dependencia', array(':dependencia'=>$dependencia));
        $lista =CHtml::listData($lista, 'subdep', 'nomabrevia');
        
        foreach($lista as $valor=> $nomabrevia)
            echo CHtml::tag('Option', array('value'=>valor), CHtml::encode($nomabrevia), true);
    }
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Aprendiente2;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Aprendiente2']))
		{
			$Criteria = new CDbCriteria();
			//$Criteria -> select = 'MAX(idaprendiente)'; // no funciona, no trae el numero máximo 
			$Criteria -> limit = 1;
			$Criteria -> order = "idaprendiente DESC";
			//$ultimo_id = CHtml::listData(Aprendiente2::model()->findAll($Criteria), 'nombre', 'idaprendiente');    // para poder ver el resultado de SQL en pantalla 
 			//print_r($ultimo_id);
						
			foreach(Aprendiente2::model()->findAll($Criteria) as  $aprendiente => $record) { //Este es un ciclo para recuperar el resultado de la consulta, se recupera el dato de idAprendiente
				$idaprendiente = $record->idaprendiente;
			}
			
			//echo $idaprendiente."</br>";
			//print_r ($id);
			$idaprendiente=$idaprendiente+1; // Incrmento el valor de idaprendiente en UNO para insertar con el siguiente registro			
			
			$model->idaprendiente = $idaprendiente;
			$model->fecharegistro = date("Y-m-d");
			$model->fechainscripcion = date("Y-m-d");
			$model->nombre = $_POST['Aprendiente2']['nombre'];
			$model->cta_rfc = $_POST['Aprendiente2']['cta_rfc'];
			$model->categoria = $_POST['Aprendiente2']['categoria'];
			$model->idioma = $_POST['Aprendiente2']['idioma'];
			$model->procedencia = $_POST['Aprendiente2']['procedencia'];
			$model->fechanacimiento = $_POST['Aprendiente2']['fechanacimiento'];
			$model->sexo = $_POST['Aprendiente2']['sexo'];
			$model->inscripcion = 'TRUE';
			$model->numinscripcion = '1';
			
			// Este bloque me sirve para saber que se ha mandado por POST
			/*
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			Yii::app()->end(); // termino la aplicación para poder ver los resultados en pantalla 
			*/

			//$model->attributes=$_POST['Aprendiente2'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idaprendiente));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Aprendiente2']))
		{
			$model->attributes=$_POST['Aprendiente2'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idaprendiente));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Aprendiente2');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Aprendiente2('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Aprendiente2']))
			$model->attributes=$_GET['Aprendiente2'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Aprendiente2 the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Aprendiente2::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Aprendiente2 $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aprendiente2-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
