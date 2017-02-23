<?php

class LocalController extends Controller
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
       //$model = new LoginForm;  
	   //$this->render('index', array("model"=>$model));
	   
	   $model = new BusquedaForm;        		
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='horizontalForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['BusquedaForm']))
		{
			$model->attributes=$_POST['BusquedaForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}        
        $this->render('index',array('model'=>$model));       
        
	}
    
    public function actionClientes()
    {        
        $clientes = Clientes::model()->findAll();
		$this->render("index", array("clientes"=>$clientes));    
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
    
    
    

	
}