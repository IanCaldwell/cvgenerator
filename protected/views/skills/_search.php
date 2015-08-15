<?php
/* @var $this SkillsController */
/* @var $model Skills */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'skill_id'); ?>
		<?php echo $form->textField($model,'skill_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skill_name'); ?>
		<?php echo $form->textField($model,'skill_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skill_type'); ?>
		<?php echo $form->textField($model,'skill_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skill_description'); ?>
		<?php echo $form->textField($model,'skill_description',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skill_active'); ?>
		<?php echo $form->textField($model,'skill_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->