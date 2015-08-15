<?php
/* @var $this EducationController */
/* @var $model Education */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'education-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        

	<div class="row">
		<?php echo $form->labelEx($model,'education_name'); ?>
		<?php echo $form->textField($model,'education_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'education_name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'education_course'); ?>
		<?php echo $form->textField($model,'education_course',array('size'=>60,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'education_course'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'education_degree'.' ( If Applicable )'); ?>
		<?php echo $form->textField($model,'education_degree',array('size'=>60,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'education_degree'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'education_result'); ?>
		<?php echo $form->textField($model,'education_result'); ?>
		<?php echo $form->error($model,'education_result'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'education_date_attended'); ?>
                <?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(                    
                    'model'=>$model,                     
                    'attribute' => 'education_date_attended',
                    'name'=>$model->education_date_attended,
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd'
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;', 
                    ),
                ));?>
		<?php echo $form->error($model,'education_date_attended'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'education_date_finished'); ?>
                <?php $form->widget('zii.widgets.jui.CJuiDatePicker',array(                    
                    'model'=>$model,                     
                    'attribute' => 'education_date_finished',
                    'name'=>$model->education_date_finished,
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd'
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;', 
                    ),
                ));?>
		<?php echo $form->error($model,'education_date_finished'); ?>
	</div>   

	<div class="row">
		<?php echo $form->labelEx($model,'education_description'); ?>
		<?php echo $form->textField($model,'education_description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'education_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->