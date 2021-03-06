<?php

/**
 * This is the model class for table "cvgen_cv_join_referee".
 *
 * The followings are the available columns in table 'cvgen_cv_join_referee':
 * @property integer $cvgen_cv_id
 * @property integer $cvgen_referee_id
 */
class CvJoinReferee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_cv_join_referee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cvgen_cv_id, cvgen_referee_id', 'required'),
			array('cvgen_cv_id, cvgen_referee_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cvgen_cv_id, cvgen_referee_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cvgen_cv_id' => 'Cvgen Cv',
			'cvgen_referee_id' => 'Cvgen Referee',
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

		$criteria->compare('cvgen_cv_id',$this->cvgen_cv_id);
		$criteria->compare('cvgen_referee_id',$this->cvgen_referee_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CvJoinReferee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
