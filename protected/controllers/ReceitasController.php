<?php

class ReceitasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Receitas;
        $model_ingredientes=new Ingredientes;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        
		if(isset($_POST['Receitas']))
		{
			$logoURL = CUploadedFile::getInstance($model,'image_url');
            if($logoURL != null){
                $fileName = time() . '.' . $logoURL->extensionName;
                $model->image_url =  'upload/' . $fileName;
            }
				
			$model->attributes=$_POST['Receitas'];
			if($model->save()){
				if ($logoURL !== null)
					$logoURL->saveAs('upload/' . $fileName); 
			
                foreach ($_POST['Ingrediente'] as $ingrediente){
                    $model_ingredientes=new Ingredientes;
                    $model_ingredientes->ingrediente = $ingrediente;
                    $model_ingredientes->id_receita = $model->id;
                    $model_ingredientes->save(false);
                }
                
				$this->redirect(array('admin'));
				
			}
		}

		$this->render('create',array(
			'model'=>$model,
            'model_ingredientes'=>$model_ingredientes
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
        $model_ingredientes=  Ingredientes::model()->findAllByAttributes(array("id_receita" => $id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Receitas']))
		{
			$logoURL = CUploadedFile::getInstance($model,'image_url');
			
				
			if ($logoURL !== null){
				$fileName = time() . '.' . $logoURL->extensionName;
				$model->image_url =  'upload/' . $fileName;
			}
			
			$model->attributes=$_POST['Receitas'];
			if($model->save()){
				if ($logoURL !== null){
					$prevFileName = Receitas::model()->findByPk($model->id)->image_url;
					
					if(file_exists($prevFileName)){
						unlink($prevFileName);
					}
					$logoURL->saveAs('upload/' . $fileName); 
				}
					
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
            'model_ingredientes'=>$model_ingredientes
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
		$dataProvider=new CActiveDataProvider('Receitas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Receitas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Receitas']))
			$model->attributes=$_GET['Receitas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Receitas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Receitas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Receitas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='receitas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
