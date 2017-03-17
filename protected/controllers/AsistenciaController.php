<?php

use yii\widgets\ActiveForm;
use yii\web\Response;

class AsistenciaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2'; 
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
				'actions'=>array('index','view', 'validarCodigoAprendiente', 'consultaAprendiente', 'createAprendiente', 'asistencia', 'aprendiente2'),
				'roles'=>array('admin'),
				#'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'validarCodigoAprendiente', 'consultaAprendiente', 'createAprendiente', 'asistencia', 'aprendiente2'),
				'roles'=>array('admin'),
				#'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'validarCodigoAprendiente', 'consultaAprendiente', 'createAprendiente', 'asistencia', 'aprendiente2','aprendiente2create'),
				'roles'=>array('admin'),
				#'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionCreateAprendiente()
	{
		$this->redirect('../aprendiente2/create');
	}
	
	public function actionConsultaAprendiente()
	{
		$this->redirect('../asistencia/aprendiente2/admin');
	}

	public function actionAsistencia()
	{
		$this->redirect('../../asistencia/admin');
	}

	public function actionAprendiente2()
	{
		$this->redirect('../../aprendiente2/admin');
	}	

	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	public function actionView($id, $entrada)
	{
		$model=$this->loadModel($id, $entrada);
		$this->render('view',array('model'=>$model));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreate()
	{
		$model=new Asistencia;
		$this->performAjaxValidation($model);
		if(isset($_POST['Asistencia']))
		{
			#$model->attributes=$_POST['Asistencia'];
			$model->idaprendiente = $_POST['Asistencia']['idaprendiente'];
			$model->horaentrada = date("Y-m-d H:i:s");
			$model->horasalida = date("Y-m-d 00:00:00");
			$model->estatus = 'true';		
			if($model->validate())
			{
				$this->saveModel($model);				
					$user=Yii::app()->getComponent('user');
					$user->setFlash('success', 'Se ha registrado la ENTRADA del Aprendiente');				
					$this->redirect('admin');
			}			

		}		
			$this->render('create',array('model'=>$model));
		
			
	}

	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionUpdate($id, $entrada)
	{
		$model=$this->loadModel($id, $entrada);

		if(isset($_POST['Asistencia']))
		{
			$model->attributes=$_POST['Asistencia'];
			$model->horasalida = date("Y-m-d H:i:s");
			$model->estatus = 'false'; // actualizar los datos del aprendiente
			$model->update();
			$user=Yii::app()->getComponent('user');
			$user->setFlash('success', 'Se ha registrado la SALIDA del Aprendiente');				
			$this->render('view',array('model'=>$model));		
			Yii::app()->end();			
		}
			$this->render('update',array('model'=>$model));
	}	


	public function saveModel($model)
	{
		try
		{
			$model->save();			
		}
		catch(Exception $e)
		{
			$this->showError($e);
			
		}
	}

	public function showError(Exception $e)
	{
	// Error: 1022 SQLSTATE: 23000 (ER_DUP_KEY)
		if($e->getCode()==23000)
		{
			$message = "This operation is not permitted due to an existing foreign key reference.";
		}
		else
		{
			$message = "Operacion Invalida.";
		}
			throw new CHttpException($e->getCode(), $message);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	public function actionDelete($id, $entrada)
	{
		if(Yii::app()->request->isPostRequest)
		{
			try
			{
				// we only allow deletion via POST request
				$this->loadModel($id, $entrada)->delete();
			}
			catch(Exception $e)
			{
				$this->showError($e);
			}
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Asistencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Asistencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Asistencia']))
			$model->attributes=$_GET['Asistencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Asistencia the loaded model
	 * @throws CHttpException
	 */
		
	

	public function loadModel($id, $entrada)
	{
		$model=Asistencia::model()->findByPk(array('idaprendiente'=>$id, 'horaentrada'=>$entrada));
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;

		/*
		$Criteria = new CDbCriteria;		
		$Criteria->condition='id=:id AND horaentrada=:horaentrada';		
		$Criteria->params=array(':id'=>$id, ':horaentrada'=>$horaentrada);		
		
		$model=Asistencia::model()->findByPk($id, 'horaentrada=:horaentrada', array(':horaentrada'=>$horaentrada));
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
		*/

	}



	/**
	 * Performs the AJAX validation.
	 * @param Asistencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='asistencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
