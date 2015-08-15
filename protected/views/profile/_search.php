<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'profile_id'); ?>
		<?php echo $form->textField($model,'profile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_address_1'); ?>
		<?php echo $form->textField($model,'profile_address_1',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_address_2'); ?>
		<?php echo $form->textField($model,'profile_address_2',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_address_3'); ?>
		<?php echo $form->textField($model,'profile_address_3',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_address_4'); ?>
		<?php echo $form->textField($model,'profile_address_4',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_home_number'); ?>
		<?php echo $form->textField($model,'profile_home_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_mobile_number'); ?>
		<?php echo $form->textField($model,'profile_mobile_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_term_address_1'); ?>
		<?php echo $form->textField($model,'profile_term_address_1',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_term_address_2'); ?>
		<?php echo $form->textField($model,'profile_term_address_2',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_term_address_3'); ?>
		<?php echo $form->textField($model,'profile_term_address_3',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_term_address_4'); ?>
		<?php echo $form->textField($model,'profile_term_address_4',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->