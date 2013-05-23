<?php

class SiteController extends Controller
{
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
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
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
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
	
	public function actionGetCategorias()
    {   
        $sql = "SELECT * FROM categorias";
        
        $command = Yii::app()->getDb()->createCommand($sql);
        
        $data = $command->queryAll();

        header('Content-type: application/json');
        echo CJSON::encode($data);
    }
	
	public function actionGetReceitas()
    {   
		$id = null;
        $sql = "SELECT rec.*, cat.nome as nome_categoria FROM receitas rec INNER JOIN categorias cat ON rec.id_categoria = cat.id";
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sql .= "  WHERE rec.id = :id";
		}
        
        $command = Yii::app()->getDb()->createCommand($sql);
		
		if($id && $id != null){
			$command->bindParam(":id",$id,PDO::PARAM_INT);  
		}
        
        $data = $command->queryAll();
		
		foreach( $data as $key => $value)
		{			
			$data[$key]['ingredientes'] = $this->getIngredientes($data[$key]['id']);
		}
		CVarDumper::dump($data, 10, true); die;
        header('Content-type: application/json');
        echo CJSON::encode($data);
    }
	
	private function getIngredientes($id)
    {   
        $sql = "SELECT id, ingrediente FROM ingredientes ing";
		
		$sql .= "  WHERE ing.id_receita = :id";
        
        $command = Yii::app()->getDb()->createCommand($sql);
		
		$command->bindParam(":id",$id,PDO::PARAM_INT);  
        
        return $command->queryAll();
    }
}