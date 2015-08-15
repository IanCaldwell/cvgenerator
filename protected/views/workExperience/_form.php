<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-experience-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'work_name'); ?>
		<?php echo $form->textField($model,'work_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'work_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_status'); ?>
		<?php echo $form->textField($model,'work_status'); ?>
		<?php echo $form->error($model,'work_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_date_started'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(                    
                    'model'=>$model,                     
                    'attribute' => 'work_date_started',
                    'name'=>$model->work_date_started,
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                        'changeMonth'=>true,
                        'changeYear'=>true,
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;', 
                    ),
                ));?>
		<?php echo $form->error($model,'work_date_started'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_date_finished'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(                    
                    'model'=>$model,                     
                    'attribute' => 'work_date_finished',
                    'name'=>$model->work_date_finished,
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                        'changeMonth'=>true,
                        'changeYear'=>true,
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;', 
                    ),
                ));?>
		<?php echo $form->error($model,'work_date_finished'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_type'); ?>
		<?php echo $form->dropDownList($model,'work_type', $model->typeOptions, array('empty'=>'--Please Select--')); ?>
		<?php echo $form->error($model,'work_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->