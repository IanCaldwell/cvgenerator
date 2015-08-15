<?php
/* @var $this LanguageController */
/* @var $model Language */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'language-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div id="Languages-form" style="width:1100px;">
            <div style="width:50%;float:left;">
                <div class="row">
                        <?php echo $form->labelEx($model,'language_name'); ?>
                        <?php echo $form->textField($model,'language_name',array('size'=>45,'maxlength'=>45)); ?>
                        <?php echo $form->error($model,'language_name'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'language_description'); ?>
                        <?php echo $form->textField($model,'language_description',array('size'=>60,'maxlength'=>200)); ?>
                        <?php echo $form->error($model,'language_description'); ?>
                </div>          

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>
            </div>
            <div style="width:50%;float:right;">
                <?php
                    $this->widget('zii.widgets.jui.CJuiAccordion', array(
                        'panels'=>array(
                            'Language'=>'It is advised not to put a Language you studied in Secondary school if you are not fluent.',
                            'Programming Languages'=>'Programming Languages can be put here. Use correct upper case of languages, ie. PHP not php.',
                            'Description'=>'Only write a description if the company you are applying for requests to write a description.',
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