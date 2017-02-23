<?php


use Yii\widgets\ActiveForm;
use yii\web\Response;




class AsistenciaController extends Controller
{
	public $layout='//layouts/lefty';	
    /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		// $this->redirect(\Yii::$app->urlManager->createUrl("local/index"));
		
	}
    

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{	
		$model = new AsistenciaForm; 	 
		/*
		$baseUrl = Yii::app()->baseUrl; 
        #echo $baseUrl."</br>";
        $cs = Yii::app()->getClientScript();        
        $cs->registerScriptFile($baseUrl.'/js/alertaBarras.js');
       */
		$this->render('index');
		
		
		
	}
	
	public function actionAjaxProcessor(){
    $a = $_POST['idAprendiente'];
	
	if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
	if(isset($_POST['AsistenciaForm']))
		{
				$a = $_POST['idAprendiente'];
				
		}	
		
		
	$this->render('view',array(
			'model'=>$this->loadModel($a),
	));
	
    // process $a and get output $b
    // output some JSON instead of the usual text/html
	/*
	$b = $a;
    header('Content-Type: application/json; charset="UTF-8"');
    echo CJSON::encode(array('output'=>$b));
	*/
    }
	
	public function actionGetAprendiente($idAprendiente)
	{
		//encuentra el Id del aprendiente
		
	}
	
	public function actionAsistencia($id)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='formulario')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionObtenerHora(){
		echo date('Y-m-d H:i:s');
	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
    
    
    public function actionEjemplo(){
        $user = Yii::app()->getComponent('user');
        $user->setFlash(
        'success',
        "<strong>Well done!</strong> You're successful in reading this."
        );
    }
	
	/**
	 * Performs the AJAX validation.
	 * @param Aprendiente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='formulario')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
	
	public function actionValidarCodigoAprendiente()
	{
		$model = new AsistenciaForm;        
		$msg = null;
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='formulario')
		{
			echo CActiveForm::validate($model);
			echo "entro a ajax";
			Yii::app()->end();
		}
		
		/*
		if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
		{
			Yii::$app->response->format = 'json';
			return ActiveForm::validate($model);
		}
		*/
		/*
		if($model->load(Yii::app->request->post()) && Yii::$app->request->isAjax)
		{
			Yii::app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
		
		if($model->load(Yii::app->request->post()))
		{
			if($model->validate())
			{
				//Hacer una consulta a la base de datos
				$msg = "El codigo se envio correctamente";
				$model->codigo = null;
				
			}
			else{
				$model->getErrors();
			}
			
		}
		*/
		return $this->render("validarCodigoAprendiente", array('model'=>$model, 'msg'=>$msg));
		
		

	}
    

	
}