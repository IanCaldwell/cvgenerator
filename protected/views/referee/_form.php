<?php
/* @var $this RefereeController */
/* @var $model Referee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'referee-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'referee_name'); ?>
		<?php echo $form->textField($model,'referee_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'referee_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referee_position'); ?>
		<?php echo $form->textField($model,'referee_position',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'referee_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referee_phone_number'); ?>
		<?php echo $form->textField($model,'referee_phone_number'); ?>
		<?php echo $form->error($model,'referee_phone_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->