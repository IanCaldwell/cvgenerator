<?php

class CvController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $_category_id;                       
        protected $_cv = null; 
        protected $_user;
        protected $_panels=array();

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
				'actions'=>array('index','view','home'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'createCategory', 'generateCV', 'generateCVIT'),
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
	 * Displays a users Cv home.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionHome()
	{            
                $user=User::model()->findByPk(Yii::app()->user->id);
                
                $cvDataProvider = new CActiveDataProvider('Cv', array(
                'criteria'=> array(
                    'with'=>array('user'=>array(
                        'condition'=>'user.user_id=' . $user->user_id,
                        'together'=>true
                    )),
                ),
                'pagination'=>array(
                    'pageSize'=>20,
                ), 
            ));
                
		$this->render('home',array(                        
			'cvDataProvider'=>$cvDataProvider,
		));
	}
        
        public function actionCreateCategory()
        {            
            $model=new Cv;  
            
            if(isset($_POST['Cv']['cv_category_id']) && isset($_POST['addCatButton']))
            {
                $this->redirect(array('create','category_id'=>$_POST['Cv']['cv_category_id']));
            }
            
            $this->render('create_category',array(
                    'model'=>$model,
		));
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($category_id)
	{
		$model=new Cv;
                $_category_id=$category_id;
                $this->fillCVAccordion($category_id);
                $user=User::model()->findByPk(Yii::app()->user->id);
                
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
                
                $achievementDataProvider = new CActiveDataProvider('Achievements', array(
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
                
                $skillDataProvider = new CActiveDataProvider('Skills', array(
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cv']))
		{
                        
                        
                        echo $model->cv_id;
                        
                        $model->cv_user_id=$user->user_id;
                        $model->cv_category_id=$_category_id;
                        $model->cv_title=$_POST['Cv']['cv_title'];
			$model->attributes=$_POST['Cv'];
                        
                        /*
                         * If the model saves, refresh model to get cv_id.
                         * Performs creation of join tables to CV from selected checkboxes. 
                         */
			if($model->save())
                        {
                            $model->refresh();
                            
                            if(empty($_POST['expids'])==false)
                                $this->executeCVExperience($_POST['expids'], $model->cv_id);
                            if(empty($_POST['lanids'])==false)
                                $this->executeCVLanguages($_POST['lanids'], $model->cv_id);
                            if(empty($_POST['skillids'])==false)
                                $this->executeCVSkills($_POST['skillids'], $model->cv_id);
                            if(empty($_POST['intids'])==false)
                                $this->executeCVInterests($_POST['intids'], $model->cv_id);
                            if(empty($_POST['achids'])==false)
                                $this->executeCVAchievements($_POST['achids'], $model->cv_id);
                            
                            $this->redirect(array('view','id'=>$model->cv_id));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'experienceDataProvider'=>$experienceDataProvider,
                        'languageDataProvider'=>$languageDataProvider,
                        'skillDataProvider'=>$skillDataProvider,
                        'achievementDataProvider'=>$achievementDataProvider,
                        'interestDataProvider'=>$interestDataProvider,
		));
	}
        
        public function actionGenerateCV($id)
        {
            // To use inside mPDF1.
            $this->_cv = $this->loadModel($id);             
            $this->_user = User::model()->findByPk($this->_cv->cv_user_id);           
            
            $mPDF1 = yii::app()->ePdf->mpdf('','', 0, '', 15, 15, 16, 30, 9, 3);                  
                
            $mPDF1->WriteHTML('<pagebreak suppress="on"/>'.$this->renderPartial('pdfCV', array(), true));
            
            $mPDF1->Output();    
        }
        
        public function actionGenerateCVIT($id)
        {
            // To use inside mPDF1.
            $this->_cv = $this->loadModel($id);             
            $this->_user = User::model()->findByPk($this->_cv->cv_user_id);           
            
            $mPDF1 = yii::app()->ePdf->mpdf('','', 0, '', 15, 15, 16, 30, 9, 3);                  
                
            $mPDF1->WriteHTML('<pagebreak suppress="on"/>'.$this->renderPartial('pdfCV_1', array(), true));
            
            $mPDF1->Output();    
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

		if(isset($_POST['Cv']))
		{
			$model->attributes=$_POST['Cv'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cv_id));
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
		$dataProvider=new CActiveDataProvider('Cv');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cv('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cv']))
			$model->attributes=$_GET['Cv'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cv the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cv::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        
        
        /*
         * Creates join table between Cv and WorkExperience in createCV()
         */
        public function executeCVExperience($expids, $cvid)
        {
            foreach($expids as $expid)
            {
                $joinExp = new CvJoinWorkExperience;
                $joinExp->cvgen_cv_id = $cvid;
                $joinExp->cvgen_work_id = $expid;
                $joinExp->save();
            }
        }
        
        /*
         * Creates join table between Cv and Language in createCV()
         */
        public function executeCVLanguages($lanids, $cvid)
        {
            foreach($lanids as $lanid)
            {
                $joinLan = new CvJoinLanguage;
                $joinLan->cvgen_cv_id = $cvid;
                $joinLan->cvgen_language_id = $lanid;
                $joinLan->save();
            }
        }
        
        /*
         * Creates join table between Cv and Skills in createCV()
         */
        public function executeCVSkills($skillids, $cvid)
        {
            foreach($skillids as $skillid)
            {
                $joinSkill = new CvJoinSkill;
                $joinSkill->cvgen_cv_id = $cvid;
                $joinSkill->cvgen_skill_id = $skillid;
                $joinSkill->save();
            }
        }
        
        /*
         * Creates join table between Cv and Interests in createCV()
         */
        public function executeCVInterests($intids, $cvid)
        {
            foreach($intids as $intid)
            {
                $joinInterest = new CvJoinInterest;
                $joinInterest->cvgen_cv_id = $cvid;
                $joinInterest->cvgen_interest_id = $intid;
                $joinInterest->save();
            }
        }
        
        /*
         * Creates join table between Cv and Interests in createCV()
         */
        public function executeCVAchievements($achids, $cvid)
        {
            foreach($achids as $achid)
            {
                $joinAchievement = new CvJoinAchievements;
                $joinAchievement->cvgen_cv_id = $cvid;
                $joinAchievement->cvgen_achievement_id = $achid;
                $joinAchievement->save();
            }
        }
        
        public function fillCVAccordion($category_id)
        {        
            $category=Category::model()->findByPk($category_id);
            
            $this->_panels['Title']='This is your own title to help you find it. It will not be used in your CV.';
            $this->_panels['Summary']='The summary is a short description at the top of CV. '
                                . 'In 3 or 4 lines describe what you’ve done, '
                                . 'what youre looking for and what you’re interested in. <br/><br/>'
                                . 'Example: Experienced electrician looking for work in the the area of ___. '
                                . 'Just completed a college degree in ____, (University, what you’ve studied). '
                                . 'Previous experience working in ____ as a _____ (job title).)';
            $this->_panels['Selection']='Only select the relevant information for the job you are applying for.'; 
            if($category_id==1 || $category_id==15)
            {
                $this->_panels[$category->category_name]='The emphasis should be on programs used and programming languages. Select only '.$category->category_name.' skills '
                                            . 'and programming languages relevant to the company you are applying for. <br/><br/>'
                                            . 'The template for '.$category->category_name.' CVs will be list based.';
            }
            else if($category_id==3||$category_id==2||$category_id==5||$category_id==6||$category_id==14)
            {
                $this->_panels[$category->category_name]='For '.$category->category_name.' you should select achievements in your area.'
                                                        . 'Do not select skills without a description of where you put the skill into practice.';
            }
        }
        

	/**
	 * Performs the AJAX validation.
	 * @param Cv $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cv-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
