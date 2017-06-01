<?php

class SiteController extends Controller
{
	public $layout='//layouts/main';	
	/**
	 * Declares class-based actions.
	 */
		public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

public function actionView($id)
	{
		$this->render('acervo/view',array(
			'model'=>$this->loadModel($id),
		));
	}

public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Acervo');
		$this->render('acervo/index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		$model=new Acervo('search');
		$model->unsetAttributes();  // clear any default values
		$model->cons = 'S'; // para que me aparescan solo la información pública del acervo, 
		if(isset($_GET['Acervo']))
			$model->attributes=$_GET['Acervo'];


		$this->render('acervo/admin',array(
			'model'=>$model,
		));
	}	

public function actionAdmin()
	{
		$model=new Acervo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Acervo']))
			$model->attributes=$_GET['Acervo'];

		$this->render('acervo/admin',array(
			'model'=>$model,
		));
	}	

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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	//public function actionIndex()
	//{		
       /*
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
			if($model->validate())
			{	
				$criteria=new CDbCriteria;
				$criteria->compare('titulo', $model->busquedaEn, true);
				#$criteria->compare('autor_personal', $model->busquedaEn, true);
				#$criteria->compare('idioma', $model->busquedaEn, true);
				$dataProvider=new CActiveDataProvider('Acervo', array('criteria'=>$criteria));				
				$this->render('busqueda',array(
					'dataProvider'=>$dataProvider,
				));				
			}				
		}        
		*/
      //  $this->render('index',array('model'=>$model));       
        
        
    //}

	
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
            //Yii::app()->user->setReturnUrl('local/index');
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())				
                //$this->redirect(Yii::app()->user->returnUrl);
                $this->redirect(array('local/index'));                      
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}