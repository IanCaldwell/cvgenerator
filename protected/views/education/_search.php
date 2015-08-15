<?php
/* @var $this EducationController */
/* @var $model Education */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'education_id'); ?>
		<?php echo $form->textField($model,'education_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_name'); ?>
		<?php echo $form->textField($model,'education_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_description'); ?>
		<?php echo $form->textField($model,'education_description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_result'); ?>
		<?php echo $form->textField($model,'education_result'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_type'); ?>
		<?php echo $form->textField($model,'education_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_date_attended'); ?>
		<?php echo $form->textField($model,'education_date_attended'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_date_finished'); ?>
		<?php echo $form->textField($model,'education_date_finished'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education_active'); ?>
		<?php echo $form->textField($model,'education_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->