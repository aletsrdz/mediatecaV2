<?php

class ReinscripcionController extends Controller
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
       $this->render('index');
        
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