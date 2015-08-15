<?php

/**
 * This is the model class for table "cvgen_user".
 *
 * The followings are the available columns in table 'cvgen_user':
 * @property integer $user_id
 * @property string $user_first_name
 * @property string $user_secondary_name
 * @property string $user_email
 * @property string $user_password
 * @property string $user_date_created
 * @property integer $user_file_id
 *
 * The followings are the available model relations:
 * @property Cv[] $cvs
 * @property Profile[] $profiles
 * @property File $userFile
 * @property UserInfo[] $userInfos
 */
class User extends CActiveRecord
{
    /**
     * Used to check that password is correct. 
     */
    public $user_password_repeat;
    
    const TYPE_USER=0;
    const TYPE_ADMIN=1;
    
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_first_name, user_secondary_name, user_email, user_password, user_password_repeat', 'required'),
                        array('user_email', 'email'),
                        array('user_email', 'unique'),
                        array('user_password', 'compare'),
                        array('user_password_repeat', 'safe'),
                        array('user_file_id, user_type', 'numerical', 'integerOnly'=>true),
			array('user_first_name, user_secondary_name, user_email, user_password', 'length', 'max'=>45),
			array('user_date_created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_first_name, user_secondary_name, user_email, user_password, user_date_created, user_file_id', 'safe', 'on'=>'search'),
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
			'cvs' => array(self::HAS_MANY, 'Cv', 'cv_user_id'),
			'profile' => array(self::BELONGS_TO, 'Profile', array('user_id'=>'profile_user')),
			'userFile' => array(self::BELONGS_TO, 'File', 'user_file_id'),
			'userInfos' => array(self::HAS_MANY, 'UserInfo', 'cv_user_id'),
                        
                        'userJoinSkill' => array(self::HAS_MANY, 'UserJoinSkill', 'cvgen_user_id'),
                        'skills' => array(self::HAS_MANY, 'Skills', array('cvgen_skill_id' => 'skill_id'), 'through'=>'userJoinSkill'),
                    
                        'userJoinEducation' => array(self::HAS_MANY, 'UserJoinEducation', 'cvgen_user_id'),
                        'education' => array(self::HAS_MANY, 'Education', array('cvgen_education_id' => 'education_id'), 'order'=>'education_type ASC', 'through'=>'userJoinEducation'),
                    
                        'userJoinWorkExperience' => array(self::HAS_MANY, 'UserJoinWorkExperience', 'cvgen_user_id'),
                        'workExperience' => array(self::HAS_MANY, 'WorkExperience', array('cvgen_work_experience_id' => 'work_id'), 'through'=>'userJoinWorkExperience'),
                    
                        'userJoinAchievements' => array(self::HAS_MANY, 'UserJoinAchievements', 'cvgen_user_id'),
                        'achievements' => array(self::HAS_MANY, 'Achievements', array('cvgen_achievement_id' => 'achievement_id'), 'through'=>'userJoinAchievements'),
                    
                        'userJoinInterest' => array(self::HAS_MANY, 'UserJoinInterest', 'cvgen_user_id'),
                        'interests' => array(self::HAS_MANY, 'Interest', array('cvgen_interest_id' => 'interest_id'), 'through'=>'userJoinInterest'),
                    
                        'userJoinLanguage' => array(self::HAS_MANY, 'UserJoinLanguage', 'cvgen_user_id'),
                        'languages' => array(self::HAS_MANY, 'Language', array('cvgen_language_id' => 'language_id'), 'through'=>'userJoinLanguage'),
                    
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
			'user_id' => 'User',
			'user_first_name' => 'First Name',
			'user_secondary_name' => 'Secondary Name',
			'user_email' => 'Email',
			'user_password' => 'Password',                        
                        'user_password_repeat' => 'Confirm Password',
			'user_date_created' => 'Date Created',
			'user_file_id' => 'User File',
                        'user_type' => 'User Type',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_secondary_name',$this->user_secondary_name,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_date_created',$this->user_date_created,true);
		$criteria->compare('user_file_id',$this->user_file_id);
                $criteria->compare('user_type',$this->user_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * Encodes the password into a hashing password into the database fro security. 
         * @param type $user_password
         * @return type
         */
        public function hashPassword($user_password)
        {
            return md5($user_password);
        }
        
        protected function afterValidate()
        {
            parent::afterValidate();
            if(!$this->hasErrors()){
                $this->user_password = $this->hashPassword($this->user_password);                
            }
        }
        
        /**
         * Validates the password that it is correct to the database.
         * @param type $password
         * @return type
         */
        public function validatePassword($password)
        {
            return $this->hashPassword($password)===$this->user_password;
        }
        
        public function getTypeOptions()
        {
            return array(
                self::TYPE_USER=>'User',
                self::TYPE_ADMIN=>'Administrator',                
            );
        }
        
        public function getTypeText()
	{
		$typeOptions=$this->typeOptions;
		return isset($typeOptions[$this->user_type]) ? $typeOptions[$this->user_type] : "unknown type ({$this->user_type})";
	}
        
        /*
         * Larry Ullman, The Yii Book for RBAC
         */
        public function afterSave() 
        {            
            if(!Yii::app()->authManager->isAssigned('admin', $this->user_id) && !Yii::app()->authManager->isAssigned('user', $this->user_id)) 
            {
                if($this->user_type === "0")
                {
                    Yii::app()->authManager->assign('user', $this->user_id);
                } 
                elseif($this->user_type === "1") 
                {
                    Yii::app()->authManager->assign('admin', $this->user_id);
                }
            }
            
            return parent::afterSave();
        }
}
