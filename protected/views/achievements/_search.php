<?php
/* @var $this AchievementsController */
/* @var $model Achievements */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'achievement_id'); ?>
		<?php echo $form->textField($model,'achievement_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'achievement_name'); ?>
		<?php echo $form->textField($model,'achievement_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'achievement_description'); ?>
		<?php echo $form->textField($model,'achievement_description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'achievement_type'); ?>
		<?php echo $form->textField($model,'achievement_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'achievement_position'); ?>
		<?php echo $form->textField($model,'achievement_position',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acheievent_active'); ?>
		<?php echo $form->textField($model,'acheievent_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->