<?php

/**
 * This is the model class for table "cvgen_category".
 *
 * The followings are the available columns in table 'cvgen_category':
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_count
 * @property string $cvgen_categorycol
 *
 * The followings are the available model relations:
 * @property Cv[] $cvs
 * @property Template[] $templates
 * @property Tip[] $cvgenTips
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cvgen_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_name', 'required'),
			array('category_count', 'numerical', 'integerOnly'=>true),
			array('category_name, cvgen_categorycol', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, category_name, category_count, cvgen_categorycol', 'safe', 'on'=>'search'),
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
			'cvs' => array(self::HAS_MANY, 'Cv', 'cv_category_id'),
			'templates' => array(self::HAS_MANY, 'Template', 'template_category_id'),
			'cvgenTips' => array(self::MANY_MANY, 'Tip', 'cvgen_tip_has_category(category_id, tip_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'Category',
			'category_name' => 'Category Name',
			'category_count' => 'Category Count',
			'cvgen_categorycol' => 'Cvgen Categorycol',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_count',$this->category_count);
		$criteria->compare('cvgen_categorycol',$this->cvgen_categorycol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
