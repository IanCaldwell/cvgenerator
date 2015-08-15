<?php

/**
 * This is the model class for table "cvgen_language".
 *
 * The followings are the available columns in table 'cvgen_language':
 * @property integer $language_id
 * @property string $language_name
 * @property string $language_description
 *
 * The followings are the available model relations:
 * @property Cv[] $cvgenCvs
 */
class Language extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_language';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language_name', 'required'),
			array('language_name', 'length', 'max'=>45),
			array('language_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('language_id, language_name, language_description', 'safe', 'on'=>'search'),
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
			'cvgenCvs' => array(self::MANY_MANY, 'Cv', 'cvgen_cv_join_language(cvgen_language_id, cvgen_cv_id)'),
                        'users' => array(self::MANY_MANY, 'User', 'cvgen_user_join_language(cvgen_language_id, cvgen_user_id)'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'language_id' => 'Language',
			'language_name' => 'Language',
			'language_description' => 'Description',
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

		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('language_name',$this->language_name,true);
		$criteria->compare('language_description',$this->language_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Language the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
