<?php
/* @var $this CvController */
/* @var $model Cv */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cv-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cv_category_id'); ?>
            	<?php echo $form->dropDownList($model,'cv_category_id', CHtml::listData(Category::model()->findAll(), 'category_id', 'category_name'), array('prompt'=>'--Please Select--')); ?>
                <?php echo $form->error($model,'cv_category_id'); ?>
	</div>
        
        <div class="row buttons">
                <?php echo CHtml::submitButton('Continue', array('name'=>'addCatButton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->