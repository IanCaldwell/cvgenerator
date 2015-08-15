<?php
/* @var $this SkillsController */
/* @var $model Skills */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skills-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        
        <div id="Skill-Form" style="width:1100px;">
            <div style="width:50%;float:left;">
                <div class="row">
                        <?php echo $form->labelEx($model,'skill_name'); ?>
                        <?php echo $form->textField($model,'skill_name',array('size'=>45,'maxlength'=>45)); ?>
                        <?php echo $form->error($model,'skill_name'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'skill_description'); ?>
                        <?php echo $form->textField($model,'skill_description',array('size'=>60,'maxlength'=>500)); ?>
                        <?php echo $form->error($model,'skill_description'); ?>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>
            </div>
            <div style="width:50%;float:right;">
                <?php
                    $this->widget('zii.widgets.jui.CJuiAccordion', array(
                        'panels'=>array(
                            'Skills'=>'Listing Skills is not advised on a CV. They would be better to include in your Work Experiences Description.'
                            . ' Skills such as Drivers License and other such skills should be created.',
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