<?php

class ProfileController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to perform the following
				'actions'=>array('create','update','view'),
                                'users'=>array('@'),
			),
			array('allow', // allow admin user to perform the following
				'actions'=>array('admin','delete'),
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
	public function actionView()
	{            
            $user=User::model()->findByPk(Yii::app()->user->id);
            
            $skillsDataProvider = new CActiveDataProvider('Skills', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            $educationDataProvider = new CActiveDataProvider('Education', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                    'order'=>'education_type DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            $experienceDataProvider = new CActiveDataProvider('WorkExperience', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),                    
                    'order'=>'work_date_started DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            $achievementsDataProvider = new CActiveDataProvider('Achievements', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            $interestDataProvider = new CActiveDataProvider('Interest', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            $languageDataProvider = new CActiveDataProvider('Language', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            
            $refereeDataProvider = new CActiveDataProvider('Referee', array(
                'criteria'=> array(
                    'with'=>array('users'=>array(
                        'condition'=>'users.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
            
            
            $model=Profile::model()->findByAttributes(array('profile_user'=>$user->user_id));
		$this->render('view',array(
			'model'=>$model,
                        'skillsDataProvider'=>$skillsDataProvider,
                        'educationDataProvider'=>$educationDataProvider,
                        'experienceDataProvider'=>$experienceDataProvider,
                        'achievementsDataProvider'=>$achievementsDataProvider,
                        'interestDataProvider'=>$interestDataProvider,
                        'languageDataProvider'=>$languageDataProvider,
                        'refereeDataProvider'=>$refereeDataProvider,
//                        'skills'=>$skills,
//                        'education'=>$education,
//                        'workExperience'=>$workExperience,
//                        'achievements'=>$achievements,
//                        'interests'=>$interests,
//                        'languages'=>$languages,
//                        'referees'=>$referees,                        
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Profile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
                        $model->profile_user = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->profile_id));
		}

		$this->render('create',array(
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

		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->profile_id));
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
		$dataProvider=new CActiveDataProvider('Profile');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Profile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Profile']))
			$model->attributes=$_GET['Profile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Profile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Profile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Profile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
