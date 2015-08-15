<?php

/**
 * This is the model class for table "cvgen_profile".
 *
 * The followings are the available columns in table 'cvgen_profile':
 * @property integer $profile_id
 * @property string $profile_address_1
 * @property string $profile_address_2
 * @property string $profile_address_3
 * @property string $profile_address_4
 * @property integer $profile_home_number
 * @property integer $profile_mobile_number
 * @property string $profile_term_address_1
 * @property string $profile_term_address_2
 * @property string $profile_term_address_3
 * @property string $profile_term_address_4
 * @property integer $profile_user
 *
 * The followings are the available model relations:
 * @property User $cvUserUser
 */
class Profile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_address_1, profile_address_2, profile_mobile_number, profile_user', 'required'),
			array('profile_home_number, profile_user', 'numerical', 'integerOnly'=>true),
			array('profile_address_1, profile_address_2, profile_address_3, profile_address_4, profile_term_address_1, profile_term_address_2, profile_term_address_3, profile_term_address_4', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profile_id, profile_address_1, profile_address_2, profile_address_3, profile_address_4, profile_home_number, profile_mobile_number, profile_term_address_1, profile_term_address_2, profile_term_address_3, profile_term_address_4, profile_user', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'profile_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profile_id' => 'Profile',
			'profile_address_1' => 'House number',
			'profile_address_2' => 'Street',
			'profile_address_3' => 'Town/City',
			'profile_address_4' => 'County',
			'profile_home_number' => 'Home Phone Number',
			'profile_mobile_number' => 'Contact Number',
			'profile_term_address_1' => 'Term House Number',
			'profile_term_address_2' => 'Term Street',
			'profile_term_address_3' => 'Term Town/City',
			'profile_term_address_4' => 'Term County',
			'profile_user' => 'User',
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

		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('profile_address_1',$this->profile_address_1,true);
		$criteria->compare('profile_address_2',$this->profile_address_2,true);
		$criteria->compare('profile_address_3',$this->profile_address_3,true);
		$criteria->compare('profile_address_4',$this->profile_address_4,true);
		$criteria->compare('profile_home_number',$this->profile_home_number);
		$criteria->compare('profile_mobile_number',$this->profile_mobile_number);
		$criteria->compare('profile_term_address_1',$this->profile_term_address_1,true);
		$criteria->compare('profile_term_address_2',$this->profile_term_address_2,true);
		$criteria->compare('profile_term_address_3',$this->profile_term_address_3,true);
		$criteria->compare('profile_term_address_4',$this->profile_term_address_4,true);
		$criteria->compare('profile_user',$this->profile_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
