<?php

/**
 * This is the model class for table "cvgen_work_experience".
 *
 * The followings are the available columns in table 'cvgen_work_experience':
 * @property integer $work_id
 * @property string $work_name
 * @property string $work_date_started
 * @property string $work_date_finished
 * @property integer $work_status
 * @property integer $work_type
 * @property integer $work_active
 * @property integer $work_tasks
 * @property integer $work_achievement_id
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 * @property Achievements $workAchievement
 * @property WorkTasks $workTasks
 */
class WorkExperience extends CActiveRecord
{    
    const TYPE_PART_TIME=0;
    const TYPE_FULL_TIME=1;
    const TYPE_GRADUATE=2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_work_experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('work_name, work_date_started, work_date_finished, work_status, work_type', 'required'),
			array('work_type, work_active, work_achievement_id', 'numerical', 'integerOnly'=>true),
			array('work_name', 'length', 'max'=>200),
                        array('work_status', 'length', 'max'=>45),
                        array('work_date_started, work_date_finished', 'date', 'format'=> 'yyyy-MM-dd', 'allowEmpty'=>false),
			array('work_date_started, work_date_finished', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('work_id, work_name, work_date_started, work_date_finished, work_status, work_type, work_active, work_achievement_id', 'safe', 'on'=>'search'),
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
			'cvgenCvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_work_experience(cvgen_work_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_work_experience(cvgen_work_experience_id, cvgen_user_id)'),
			'workAchievement' => array(self::BELONGS_TO, 'Achievements', 'work_achievement_id'),
			'workTasks' => array(self::HAS_MANY, 'WorkTasks', 'task_work_id'),
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'work_id' => 'Work',
			'work_name' => 'Company Name',
			'work_date_started' => 'Start Date',
			'work_date_finished' => 'End Date',
			'work_status' => 'Job Title',
			'work_type' => 'Work Type',
			'work_active' => 'Work Active',
			'work_achievement_id' => 'Work Achievement',
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

		$criteria->compare('work_id',$this->work_id);
		$criteria->compare('work_name',$this->work_name,true);
		$criteria->compare('work_date_started',$this->work_date_started,true);
		$criteria->compare('work_date_finished',$this->work_date_finished,true);
		$criteria->compare('work_status',$this->work_status);
		$criteria->compare('work_type',$this->work_type);
		$criteria->compare('work_active',$this->work_active);
		$criteria->compare('work_achievement_id',$this->work_achievement_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WorkExperience the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getTypeOptions()
        {
            return array(
                self::TYPE_PART_TIME=>'Part-Time',
                self::TYPE_FULL_TIME=>'Full-Time', 
                self::TYPE_GRADUATE=>'Graduate',
            );
        }
        
        public function getTypeText()
	{
		$options=$this->typeOptions;
		return isset($options[$this->work_type]) ? $options[$this->work_type] : "unknown type ({$this->work_type})";
	}
}
