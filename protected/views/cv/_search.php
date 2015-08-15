<?php
/* @var $this CvController */
/* @var $model Cv */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cv_id'); ?>
		<?php echo $form->textField($model,'cv_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv_date_created'); ?>
		<?php echo $form->textField($model,'cv_date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv_user_id'); ?>
		<?php echo $form->textField($model,'cv_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv_category_id'); ?>
		<?php echo $form->textField($model,'cv_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv_file_id'); ?>
		<?php echo $form->textField($model,'cv_file_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->