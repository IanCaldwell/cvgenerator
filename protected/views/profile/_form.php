<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_address_1'); ?>
		<?php echo $form->textField($model,'profile_address_1',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'profile_address_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_address_2'); ?>
		<?php echo $form->textField($model,'profile_address_2',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'profile_address_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_address_3'); ?>
		<?php echo $form->textField($model,'profile_address_3',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'profile_address_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_address_4'); ?>
		<?php echo $form->textField($model,'profile_address_4',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'profile_address_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_mobile_number'); ?>
		<?php echo $form->textField($model,'profile_mobile_number'); ?>
		<?php echo $form->error($model,'profile_mobile_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->