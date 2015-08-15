<?php
/* @var $this CvController */
/* @var $model Cv */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cv-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
       
            
        <div style="width:1100px;">
            <div style="width:50%;float:left;">
                <div class="row">
                        <?php echo $form->labelEx($model,'cv_title'); ?>
                        <?php echo $form->textField($model,'cv_title',array('size'=>45,'maxlength'=>45)); ?>
                        <?php echo $form->error($model,'cv_title'); ?>
                </div>    

                <div class="row">
                        <?php echo $form->labelEx($model,'cv_description'); ?>
                        <?php echo $form->textArea($model, 'cv_description', array('rows' => 6, 'cols' => 50)); ?>
                        <?php echo $form->error($model,'cv_description'); ?>
                </div> 
            </div>
            <div style="width:50%; float:right;">
                <?php
                    $this->widget('zii.widgets.jui.CJuiAccordion', array(
                        'panels'=>$this->_panels,
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
        <br/>
        
        <div style="width:1100px;float:left;">
        <label>Select Relevant Work Experience</label>
        <hr size = "10" style="background-color: black;margin: 2px 0;">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
                 'id'=>'cv-experience-grid',
                 'dataProvider'=>$experienceDataProvider,   
                 'selectableRows'=>2,
                 'template' => '{items}{pager}',
                 //'filter'=>$skills,
                 'columns'=>array(
                         'work_name',
                         'work_status',
                         array(
                            'name'=>'work_type',
                            'header'=>'Type',
                            'value'=> '$data->typeText',
                         ),
                    array(
                        'class'=>'CCheckBoxColumn',    
                        'checkBoxHtmlOptions' => array(
                            'name' => 'expids[]',   
                        )
                     ),
                 ),
                ));
               ?>
        
        <label>Select Relevant Languages</label>
        <hr size = "10" style="background-color: black;margin: 2px 0;">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
                 'id'=>'cv-languages-grid',
                 'dataProvider'=>$languageDataProvider,   
                 'selectableRows'=>2,
                 'template' => '{items}{pager}',
                 //'filter'=>$skills,
                 'columns'=>array(
                         'language_name',
                         'language_description',                                    
                    array(
                        'class'=>'CCheckBoxColumn',    
                        'checkBoxHtmlOptions' => array(
                            'name' => 'lanids[]',   
                        )
                     ),
                 ),
                ));
               ?> 
        
        <label>Select Relevant Skills</label>
        <hr size = "10" style="background-color: black;margin: 2px 0;">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
                 'id'=>'cv-skills-grid',
                 'dataProvider'=>$skillDataProvider,   
                 'selectableRows'=>2,
                 'template' => '{items}{pager}',
                 //'filter'=>$skills,
                 'columns'=>array(
                         'skill_name',
                         'skill_description',                                    
                    array(
                        'class'=>'CCheckBoxColumn',    
                        'checkBoxHtmlOptions' => array(
                            'name' => 'skillids[]',   
                        )
                     ),
                 ),
                ));
               ?> 
        
        <label>Select Relevant Achievements</label>
        <hr size = "10" style="background-color: black;margin: 2px 0;">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
                 'id'=>'cv-schievements-grid',
                 'dataProvider'=>$achievementDataProvider,   
                 'selectableRows'=>2,
                 'template' => '{items}{pager}',
                 //'filter'=>$skills,
                 'columns'=>array(
                         'achievement_name',
                         'achievement_description',                                    
                    array(
                        'class'=>'CCheckBoxColumn',    
                        'checkBoxHtmlOptions' => array(
                            'name' => 'achids[]',   
                        )
                     ),
                 ),
                ));
               ?>
        
        <label>Select Relevant Interests</label>
        <hr size = "10" style="background-color: black;margin: 2px 0;">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
                 'id'=>'cv-interests-grid',
                 'dataProvider'=>$interestDataProvider,   
                 'selectableRows'=>2,
                 'template' => '{items}{pager}',
                 //'filter'=>$skills,
                 'columns'=>array(
                         'interest_description',                                    
                    array(
                        'class'=>'CCheckBoxColumn',    
                        'checkBoxHtmlOptions' => array(
                            'name' => 'intids[]',   
                        )
                     ),
                 ),
                ));
               ?>
        

	<div class="row buttons">
                <?php echo CHtml::submitButton('Create', array('name'=>'createButton')); ?>
	</div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->