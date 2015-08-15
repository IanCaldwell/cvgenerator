<?php

/**
 * This is the model class for table "cvgen_interest".
 *
 * The followings are the available columns in table 'cvgen_interest':
 * @property integer $interest_id
 * @property string $interest_description
 * @property integer $interest_active
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 */
class Interest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_interest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('interest_description', 'required'),
			array('interest_id, interest_active', 'numerical', 'integerOnly'=>true),
			array('interest_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('interest_id, interest_description, interest_active', 'safe', 'on'=>'search'),
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
			'cvgenCvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_interest(cvgent_interest_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_interest(cvgen_interest_id, cvgen_user_id)'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'interest_id' => 'Interest Title',
			'interest_description' => 'Interest',
			'interest_active' => 'Interest Active',
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

		$criteria->compare('interest_id',$this->interest_id);
		$criteria->compare('interest_description',$this->interest_description,true);
		$criteria->compare('interest_active',$this->interest_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Interest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
