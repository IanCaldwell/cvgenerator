<?php
/* @var $this ActiveRecordLogController */
/* @var $model ActiveRecordLog */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'log_id'); ?>
		<?php echo $form->textField($model,'log_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_description'); ?>
		<?php echo $form->textField($model,'log_description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_action'); ?>
		<?php echo $form->textField($model,'log_action',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_model'); ?>
		<?php echo $form->textField($model,'log_model',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_idModel'); ?>
		<?php echo $form->textField($model,'log_idModel',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_field'); ?>
		<?php echo $form->textField($model,'log_field',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_creationdate'); ?>
		<?php echo $form->textField($model,'log_creationdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_userid'); ?>
		<?php echo $form->textField($model,'log_userid',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->