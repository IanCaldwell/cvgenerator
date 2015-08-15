<?php
/* @var $this WorkTasksController */
/* @var $model WorkTasks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-tasks-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div id="Work-Tasks" style="width:1100px;">
            <div style="width:50%;float:left;">
                <div class="row">
                        <?php echo $form->labelEx($model,'task_name'); ?>
                        <?php echo $form->textField($model,'task_name',array('size'=>45,'maxlength'=>45)); ?>
                        <?php echo $form->error($model,'task_name'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'task_description'); ?>
                        <?php echo $form->textArea($model,'task_description',array('rows'=>6, 'cols'=>50, 'maxlength'=>2000)); ?>
                        <?php echo $form->error($model,'task_description'); ?>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>
            </div>
            <div style="width:50%;float:right;">
                <?php
                    $this->widget('zii.widgets.jui.CJuiAccordion', array(
                        'panels'=>array(
                            'Task Name'=>'This is a reference for yourself, the user. It will not be included in your CV. E.g Duties',
                            'Description'=>'Describe the duties in regards to the Work Expereince in a few lines. '
                            . 'Summarize your responsiblities and skills. ',
                        ),
                        // additional javascript options for the accordion plugin
                        'options'=>array(
                            'active'=>false,
                            'collapsible'=>true,
                            'clearStyle'=>true
                        ),
                    ));
                ?>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->