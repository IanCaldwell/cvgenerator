<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */
?>

<h1><?php echo $model->work_name; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'work_name',
		'work_date_started',
		'work_date_finished',
		'work_status',
		'work_type',
	),
)); ?>

<br/><h4>Description of Tasks</h4>


<?php echo TbHtml::linkButton('Add Job Description', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('workTasks/create', array('id'=>$model->work_id)),
            )      
        );
?>
<br/><br/>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$taskDataProvider,
	'itemView'=>'_view_task',
)); ?>
