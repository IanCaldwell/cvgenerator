<?php
/* @var $this RefereeController */
/* @var $model Referee */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'referee_id'); ?>
		<?php echo $form->textField($model,'referee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referee_name'); ?>
		<?php echo $form->textField($model,'referee_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referee_position'); ?>
		<?php echo $form->textField($model,'referee_position',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referee_phone_number'); ?>
		<?php echo $form->textField($model,'referee_phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referee_active'); ?>
		<?php echo $form->textField($model,'referee_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->