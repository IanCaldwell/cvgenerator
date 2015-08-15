<?php

/**
 * This is the model class for table "cvgen_skills".
 *
 * The followings are the available columns in table 'cvgen_skills':
 * @property integer $skill_id
 * @property string $skill_name
 * @property integer $skill_type
 * @property string $skill_description
 * @property integer $skill_active
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 */
class Skills extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skill_name', 'required'),
			array('skill_type, skill_active', 'numerical', 'integerOnly'=>true),
			array('skill_name', 'length', 'max'=>45),
			array('skill_description', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('skill_id, skill_name, skill_type, skill_description, skill_active', 'safe', 'on'=>'search'),
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
			'cvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_skill(cvgen_skill_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_skill(cvgen_skill_id, cvgen_user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'skill_id' => 'Skill',
			'skill_name' => 'Skill Name',
			'skill_type' => 'Skill Type',
			'skill_description' => 'Skill Description',
			'skill_active' => 'Skill Active',
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

		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('skill_name',$this->skill_name,true);
		$criteria->compare('skill_type',$this->skill_type);
		$criteria->compare('skill_description',$this->skill_description,true);
		$criteria->compare('skill_active',$this->skill_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skills the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
