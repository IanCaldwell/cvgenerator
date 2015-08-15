<?php

/**
 * This is the model class for table "cvgen_education".
 *
 * The followings are the available columns in table 'cvgen_education':
 * @property integer $education_id
 * @property string $education_name
 * @property string $education_description
 * @property integer $education_result
 * @property integer $education_type
 * @property string $education_course
 * @property string $education_date_attended
 * @property string $education_date_finished
 * @property integer $education_active
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 */
class Education extends CActiveRecord
{
    
    const TYPE_SECONDARY=0;
    const TYPE_UNIVERSITY=1;
  //  const TYPE_FURTHER_EDUCATION=2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('education_name, education_type', 'required'),
			array('education_type, education_active', 'numerical', 'integerOnly'=>true),
			array('education_name, education_description', 'length', 'max'=>200),
                         array('education_date_attended, education_date_finished', 'date', 'format'=> 'yyyy-MM-dd'),
                        array('education_course, education_degree', 'length', 'max'=>45),
                        array('education_result', 'length', 'max'=>10),
			array('education_date_finished', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('education_id, education_name, education_description, education_result, education_type, education_course, education_date_attended, education_degree, education_date_finished, education_active', 'safe', 'on'=>'search'),
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
			'cvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_education(cvgen_education_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_education(cvgen_education_id, cvgen_user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'education_id' => 'Education',
			'education_name' => 'Institution Name',
			'education_description' => 'Other Information',
			'education_result' => 'QCA',
			'education_type' => 'Education Type',
                        'education_course' => 'Course Title',
			'education_date_attended' => 'Education Date Attended',
			'education_date_finished' => 'Education Date Finished',
			'education_active' => 'Education Active',
                        'education_degree' => 'Degree'
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

		$criteria->compare('education_id',$this->education_id);
		$criteria->compare('education_name',$this->education_name,true);
		$criteria->compare('education_description',$this->education_description,true);
		$criteria->compare('education_result',$this->education_result);
		$criteria->compare('education_type',$this->education_type);
                $criteria->compare('education_course',$this->education_course);
		$criteria->compare('education_date_attended',$this->education_date_attended,true);
		$criteria->compare('education_date_finished',$this->education_date_finished,true);
		$criteria->compare('education_active',$this->education_active);
                $criteria->compare('education_degree',$this->education_degree);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Education the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}       
        
        public function getTypeOptions()
        {
            return array(
                self::TYPE_SECONDARY=>'Secondary Education',
                self::TYPE_UNIVERSITY=>'University/College', 
          //      self::TYPE_FURTHER_EDUCATION=>'Further Education',
            );
        }
        
        public function getTypeText()
	{
		$options=$this->typeOptions;
		return isset($options[$this->education_type]) ? $options[$this->education_type] : "unknown type ({$this->education_type})";
	}
}
