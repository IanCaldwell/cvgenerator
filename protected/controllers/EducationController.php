<?php

class EducationController extends Controller
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
				'actions'=>array('create','update', 'selectType','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
        
        /*
         * Select Education type
         */
        public function actionSelectType()
        {            
            $model=new Education;  
            
            if(isset($_POST['Education']['education_type']))
            {
                $this->redirect(array('create','education_type'=>$_POST['Education']['education_type']));
            }
            
            $this->render('create_type',array(
                    'model'=>$model,
		));
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($education_type)
	{
		$model=new Education;
                $model->education_type=$education_type;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Education']))
		{
			$model->attributes=$_POST['Education'];
			if($model->save())
                        {
                            $model->refresh();                            
                            $joinModel=new UserJoinEducation;
                            $joinModel->cvgen_user_id=Yii::app()->user->id;
                            $joinModel->cvgen_education_id=$model->education_id;
                            
                            if($joinModel->save())				
                                $this->redirect(array('profile/view'));
                        }
		}

                if($_GET['education_type']==1)
                {
                    $this->render('create',array(
                            'model'=>$model,
                    ));
                }
                else if($_GET['education_type']==0)
                {
                    $this->render('create_school',array(
                            'model'=>$model,
                    ));
                }
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

		if(isset($_POST['Education']))
		{
			$model->attributes=$_POST['Education'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->education_id));
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
            $join= UserJoinEducation::model()->findByAttributes(array('cvgen_education_id'=>$id,'cvgen_user_id'=>Yii::app()->user->id));
            $join->delete();
            $model=$this->loadModel($id);
            
            if(isset($model->cvs[0])==false)  
                $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Education');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Education('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Education']))
			$model->attributes=$_GET['Education'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Education the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Education::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Education $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='education-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
