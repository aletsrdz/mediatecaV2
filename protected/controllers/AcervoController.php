<?php

class AcervoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	#public $layout='//layouts/column2';
#	public $layout='//layouts/main';	
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
				'actions'=>array('index','view','copiar', 'viewc','etiquetas','generarEtiquetas'),
				#'users'=>array('*'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'copiar', 'viewc','etiquetas', 'generarEtiquetas'),
				#'users'=>array('@'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'copiar', 'viewc','etiquetas', 'generarEtiquetas'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewc($id)
	{
		$this->render('viewc',array(
			'model'=>$this->loadModel($id),
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Acervo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acervo']))
		{
			$criteria = new CDbCriteria();
			$criteria -> limit = 1;
			$criteria -> order = "idacervo DESC";
			
			foreach (Acervo::model()->findAll($criteria) as $acervo => $value) {
 			    $idacervo = $value->idacervo;
			}
			
			$idacervo=$idacervo+1;	
			$model->idacervo = $idacervo; //agregamos el valor siguiente del ultimo acervo al modelo Acervo
			$model->attributes=$_POST['Acervo'];
			/*
			echo $idacervo."<br>";
			echo "<pre>";					
			print_r($model);
			echo "</pre>";			
			Yii::app()->end();
			*/
			if($model->save())
				$this->redirect(array('view','id'=>$model->idacervo));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCopiar($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acervo']))
		{
			$criteria = new CDbCriteria();
			$criteria -> limit = 1;
			$criteria -> order = "idacervo DESC";
			
			foreach (Acervo::model()->findAll($criteria) as $acervo => $value) {
 			    $idacervo = $value->idacervo;
			}
			
			$idacervo=$idacervo+1;	
			$model->idacervo = $idacervo; //agregamos el valor siguiente del ultimo acervo al modelo Acervo
			$model->attributes=$_POST['Acervo'];

			if(!$model->isNewRecord)
			{	
				$model = new Acervo(); 
				$criteria2 = new CDbCriteria();
				$criteria2 -> limit = 1;
				$criteria2 -> order = "idacervo DESC";
			
				foreach (Acervo::model()->findAll($criteria2) as $acervo => $value) {
 			    	$idacervo = $value->idacervo;
				}
			
				$idacervo=$idacervo+1;	
				$model->idacervo = $idacervo; //agregamos el valor siguiente del ultimo acervo al modelo Acervo
				$model->attributes=$_POST['Acervo'];
				if($model->save())
					$this->redirect(array('viewc','id'=>$model->idacervo));
			}				
			/*
			echo $idacervo."<br>";
			echo "<pre>";					
			print_r($model);
			echo "</pre>";			
			Yii::app()->end();
			*/
			
			#if($model->insert())
			#	$this->redirect(array('viewc','id'=>$model->idacervo));
		}
		$this->render('copiar',array(
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

		if(isset($_POST['Acervo']))
		{
			$model->attributes=$_POST['Acervo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idacervo));
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
		$dataProvider=new CActiveDataProvider('Acervo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionEtiquetas()
	{
		$this->render('etiquetas');
	}

	public function actionGenerarEtiquetas($id = "010910", $nombre= "alex", $idioma= "ingles")
	{
		//$idioma = "JAPONÉS";
		$imageCele = Yii::getPathOfAlias("webroot.images.cele1");
		$imageUnam = Yii::getPathOfAlias("webroot.images.unam150");
		
		Yii::import("ext.fpdf.*");
			
		$pdf = new Code39();
		$pdf->AddPage();
		$pdf->f_Code39(123, 45,  $id);
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
		$this->render('etiquetas',array("bruce"=>$bruce));
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Acervo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Acervo']))
			$model->attributes=$_GET['Acervo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Acervo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Acervo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Acervo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='acervo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
