<?php

/**
 * This is the model class for table "cvgen_achievements".
 *
 * The followings are the available columns in table 'cvgen_achievements':
 * @property integer $achievement_id
 * @property string $achievement_name
 * @property string $achievement_description
 * @property integer $achievement_type
 * @property string $achievement_position
 * @property integer $acheievent_active
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 * @property WorkExperience[] $workExperiences
 */
class Achievements extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_achievements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('achievement_name, achievement_description', 'required'),
			array('achievement_type, acheievent_active', 'numerical', 'integerOnly'=>true),
			array('achievement_name, achievement_position', 'length', 'max'=>45),
			array('achievement_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('achievement_id, achievement_name, achievement_description, achievement_type, achievement_position, acheievent_active', 'safe', 'on'=>'search'),
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
			'cvgenCvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_achievements(cvgen_achievement_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_achievements(cvgen_achievement_id, cvgen_user_id)'),
			'workExperiences' => array(self::HAS_MANY, 'WorkExperience', 'work_achievement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'achievement_id' => 'Achievement',
			'achievement_name' => 'Award/Achievement',
			'achievement_description' => 'Description',
			'achievement_type' => 'Achievement Type',
			'achievement_position' => 'Achievement Position',
			'acheievent_active' => 'Acheievent Active',
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

		$criteria->compare('achievement_id',$this->achievement_id);
		$criteria->compare('achievement_name',$this->achievement_name,true);
		$criteria->compare('achievement_description',$this->achievement_description,true);
		$criteria->compare('achievement_type',$this->achievement_type);
		$criteria->compare('achievement_position',$this->achievement_position,true);
		$criteria->compare('acheievent_active',$this->acheievent_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Achievements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
