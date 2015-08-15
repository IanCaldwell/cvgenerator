<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'work_id'); ?>
		<?php echo $form->textField($model,'work_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_name'); ?>
		<?php echo $form->textField($model,'work_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_date_started'); ?>
		<?php echo $form->textField($model,'work_date_started'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_date_finished'); ?>
		<?php echo $form->textField($model,'work_date_finished'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_status'); ?>
		<?php echo $form->textField($model,'work_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_type'); ?>
		<?php echo $form->textField($model,'work_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_active'); ?>
		<?php echo $form->textField($model,'work_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_tasks'); ?>
		<?php echo $form->textField($model,'work_tasks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_achievement_id'); ?>
		<?php echo $form->textField($model,'work_achievement_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->