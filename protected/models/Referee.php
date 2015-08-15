<?php

/**
 * This is the model class for table "cvgen_referee".
 *
 * The followings are the available columns in table 'cvgen_referee':
 * @property integer $referee_id
 * @property string $referee_name
 * @property string $referee_position
 * @property integer $referee_phone_number
 * @property integer $referee_active
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 */
class Referee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_referee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('referee_name, referee_position, referee_phone_number', 'required'),
			array('referee_phone_number, referee_active', 'numerical', 'integerOnly'=>true),
			array('referee_name, referee_position', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('referee_id, referee_name, referee_position, referee_phone_number, referee_active', 'safe', 'on'=>'search'),
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
			'cvgenCvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_referee(cvgen_referee_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_referee(cvgen_referee_id, cvgen_user_id)'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'referee_id' => 'Referee',
			'referee_name' => 'Name of Referee',
			'referee_position' => 'Referee Job Title',
			'referee_phone_number' => 'Referee Contact Number',
			'referee_active' => 'Referee Active',
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

		$criteria->compare('referee_id',$this->referee_id);
		$criteria->compare('referee_name',$this->referee_name,true);
		$criteria->compare('referee_position',$this->referee_position,true);
		$criteria->compare('referee_phone_number',$this->referee_phone_number);
		$criteria->compare('referee_active',$this->referee_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Referee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
