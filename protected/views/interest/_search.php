<?php
/* @var $this InterestController */
/* @var $model Interest */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'interest_id'); ?>
		<?php echo $form->textField($model,'interest_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'interest_description'); ?>
		<?php echo $form->textField($model,'interest_description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'interest_active'); ?>
		<?php echo $form->textField($model,'interest_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->