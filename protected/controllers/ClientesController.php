<?php

class ClientesController extends Controller
{
	public $layout='//layouts/lefty';	
    
	
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
				'actions'=>array('index','view'),
				'roles'=>array('super'),
				
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','edit'),
				'roles'=>array('super'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('super'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	
	public function actionIndex()
	{
			
		#Yii::app()->authManager->createRole("admin");
		#Yii::app()->authManager->assign("admin", Yii::app()->user->id);
		/*
		$auth=Yii::app()->authManager;

		$auth->createOperation('createAdmin','create a admin');
		$auth->createOperation('readAdmin','read a admin');
		$auth->createOperation('updateAdmin','update a admin');
		$auth->createOperation('deleteAdmin','delete a admin');

		$auth->createOperation('acceso','administrar el acceso a mediateca');
		$auth->createOperation('acervo','administrar el acervo de mediateca');
		
		$role=$auth->createRole('admin');
		$role->addChild('acceso');
		$role->addChild('acervo');
		
		$role=$auth->createRole('super');
		$role->addChild('createAdmin');
		$role->addChild('readAdmin');
		$role->addChild('updateAdmin');
		$role->addChild('deleteAdmin');
		$role->addChild('admin');

		$auth->assign('super', 1); // 1 y 2
		$auth->assign('admin', 3); // 3
        */
        
 		
		
		/*			
		if(Yii::app()->authManager->checkAccess("admin", Yii::app()->user->id));
			echo "Hola desde authManager"."</br>";
		echo Yii::app()->user->id."</br>";	
		if(Yii::app()->user->checkAccess("admin"));
			echo "Hola desde user";				
		*/	
		
		$clientes = Clientes::model()->findAll();
		$this->render("index", array("clientes"=>$clientes));
	}
	
	public function actionView($id)
	{
		$model = Clientes::model()->findByPk($id);				
		$this->render("view", array("model"=>$model));
		
	}
	
	public function actionEdit($id)
	{
		$model = Clientes::model()->findByPk($id);			
		if(isset($_POST['Clientes']))				
		{								
			/*
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			Yii::app()->end();
			*/
			$model -> attributes = $_POST['Clientes']; 
			if($model -> save())
			{
				$this->redirect(array('view', 'id'=>$model->id));				
			}	
		}	
		$this->render("edit", array("model"=>$model));		
	}
	
	public function actionDelete($id){
		$model = Clientes::model()->findByPk($id);
		$model -> delete();
		Yii::app()->authManager->revoke($model -> tipo, $model-> id);
		$this->redirect(array('index'));
	}
	
	public function actionAdd()
	{
		$model = new Clientes();
		
		if(isset($_POST['Clientes']))	
		{
			
			
			//$model -> attributes = $_POST['Clientes']; 
			$model -> username = $_POST['Clientes']['username'];
			$model -> password = $_POST['Clientes']['password'];
			$model -> nombre = $_POST['Clientes']['nombre'];
			$model -> apaterno = $_POST['Clientes']['apaterno'];
			$model -> amaterno = $_POST['Clientes']['amaterno'];
			$model -> email = $_POST['Clientes']['email'];
			$model -> tipo = $_POST['Clientes']['tipo'];


			if($model -> save())
			{								

				$criteria = new CDbCriteria();			
				$criteria->select = 'id';
				$criteria->condition= 'username=:username';
				$criteria->params = array(':username' => $model -> username);
				$cliente = Clientes::model()->find($criteria);

				Yii::app()->authManager->assign($model -> tipo, $cliente-> id);				
				$this->redirect(array('view', 'id'=>$model->id));				
			}						
		}	
		$this->render("add", array("model"=>$model));		
	}
	

	
}