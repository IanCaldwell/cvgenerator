<?php

/**
 * This is the model class for table "cvgen_activerecordlog".
 *
 * The followings are the available columns in table 'cvgen_activerecordlog':
 * @property string $log_id
 * @property string $log_description
 * @property string $log_action
 * @property string $log_model
 * @property string $log_idModel
 * @property string $log_field
 * @property string $log_creationdate
 * @property string $log_userid
 */
class ActiveRecordLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_activerecordlog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_creationdate', 'required'),
			array('log_description', 'length', 'max'=>255),
			array('log_action', 'length', 'max'=>20),
			array('log_model, log_field, log_userid', 'length', 'max'=>45),
			array('log_idModel', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('log_id, log_description, log_action, log_model, log_idModel, log_field, log_creationdate, log_userid', 'safe', 'on'=>'search'),
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
			'log_id' => 'Log',
			'log_description' => 'Log Description',
			'log_action' => 'Log Action',
			'log_model' => 'Log Model',
			'log_idModel' => 'Log Id Model',
			'log_field' => 'Log Field',
			'log_creationdate' => 'Log Creationdate',
			'log_userid' => 'Log Userid',
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

		$criteria->compare('log_id',$this->log_id,true);
		$criteria->compare('log_description',$this->log_description,true);
		$criteria->compare('log_action',$this->log_action,true);
		$criteria->compare('log_model',$this->log_model,true);
		$criteria->compare('log_idModel',$this->log_idModel,true);
		$criteria->compare('log_field',$this->log_field,true);
		$criteria->compare('log_creationdate',$this->log_creationdate,true);
		$criteria->compare('log_userid',$this->log_userid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActiveRecordLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
