<?php
/* @var $this WorkExperienceController */
/* @var $data WorkExperience */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->task_name), array('worktasks/update', 'id'=>$data->task_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_description')); ?>:</b>
	<?php echo $data->task_description; ?>
	<br />


</div>