<?php

/**
 * This is the model class for table "cvgen_cv".
 *
 * The followings are the available columns in table 'cvgen_cv':
 * @property integer $cv_id
 * @property string $cv_date_created
 * @property integer $cv_user_id
 * @property integer $cv_category_id
 * @property integer $cv_file_id
 *
 * The followings are the available model relations:
 * @property Category $cvCategory
 * @property File $cvFile
 * @property User $cvUser
 * @property Achievements[] $cvgenAchievements
 * @property Education[] $cvgenEducations
 * @property Interest[] $cvgenInterests
 * @property Language[] $cvgenLanguages
 * @property Referee[] $cvgenReferees
 * @property Skills[] $cvgenSkills
 * @property WorkExperience[] $cvgenWorkExperiences
 */
class Cv extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_cv';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cv_user_id, cv_category_id, cv_title', 'required'),
			array('cv_user_id, cv_category_id, cv_file_id', 'numerical', 'integerOnly'=>true),                    
			array('cv_description', 'length', 'max'=>10000),
			array('cv_date_created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cv_id, cv_title, cv_date_created, cv_user_id, cv_category_id, cv_file_id, cv_description', 'safe', 'on'=>'search'),
		);
	}
        
        public function behaviors()
        {
            return array(
                    //Classname=>path to class
                    'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
            );
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'cv_category_id'),
			'file' => array(self::BELONGS_TO, 'File', 'cv_file_id'),
			'user' => array(self::BELONGS_TO, 'User', 'cv_user_id'),
			
                        'cvJoinSkill' => array(self::HAS_MANY, 'CvJoinSkill', 'cvgen_cv_id'),
                        'skills' => array(self::HAS_MANY, 'Skills', array('cvgen_skill_id' => 'skill_id'), 'through'=>'cvJoinSkill'),
                    
                        'cvJoinEducation' => array(self::HAS_MANY, 'CvJoinEducation', 'cvgen_cv_id'),
                        'education' => array(self::HAS_MANY, 'Education', array('cvgen_education_id' => 'education_id'), 'through'=>'cvJoinEducation', 'order'=>'education_type DESC'),
                    
                        'cvJoinWorkExperience' => array(self::HAS_MANY, 'CvJoinWorkExperience', 'cvgen_cv_id'),
                        'workExperience' => array(self::HAS_MANY, 'WorkExperience', array('cvgen_work_id' => 'work_id'), 'through'=>'cvJoinWorkExperience', 'order'=>'work_date_started DESC'),
                    
                        'cvJoinAchievements' => array(self::HAS_MANY, 'CvJoinAchievements', 'cvgen_cv_id'),
                        'achievements' => array(self::HAS_MANY, 'Achievements', array('cvgen_achievement_id' => 'achievement_id'), 'through'=>'cvJoinAchievements'),
                    
                        'cvJoinInterest' => array(self::HAS_MANY, 'CvJoinInterest', 'cvgen_cv_id'),
                        'interests' => array(self::HAS_MANY, 'Interest', array('cvgen_interest_id' => 'interest_id'), 'through'=>'cvJoinInterest'),
                    
                        'cvJoinLanguage' => array(self::HAS_MANY, 'CvJoinLanguage', 'cvgen_cv_id'),
                        'languages' => array(self::HAS_MANY, 'Language', array('cvgen_language_id' => 'language_id'), 'through'=>'cvJoinLanguage'),
                    
                        'userJoinReferee' => array(self::HAS_MANY, 'UserJoinReferee', 'cvgen_user_id'),
                        'referees' => array(self::HAS_MANY, 'Referee', array('cvgen_referee_id' => 'referee_id'), 'through'=>'userJoinReferee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cv_id' => 'Cv',
                        'cv_title' => 'Title',
                        'cv_description' => 'Summary',
			'cv_date_created' => 'Date Created',
			'cv_user_id' => 'User',
			'cv_category_id' => 'Category',
			'cv_file_id' => 'File',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cv_id',$this->cv_id);
                $criteria->compare('cv_title',$this->cv_title);
                $criteria->compare('cv_description',$this->cv_description);
		$criteria->compare('cv_date_created',$this->cv_date_created,true);
		$criteria->compare('cv_user_id',$this->cv_user_id);
		$criteria->compare('cv_category_id',$this->cv_category_id);
		$criteria->compare('cv_file_id',$this->cv_file_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cv the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
