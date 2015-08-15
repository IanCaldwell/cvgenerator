<?php
/* @var $this AchievementsController */
/* @var $model Achievements */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'achievements-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'achievement_name'); ?>
		<?php echo $form->textField($model,'achievement_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'achievement_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'achievement_description'); ?>
		<?php echo $form->textArea($model,'achievement_description',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'achievement_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->