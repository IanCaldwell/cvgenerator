<?php
/* @var $this WorkExperienceController */
/* @var $data WorkExperience */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->work_id), array('view', 'id'=>$data->work_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_name')); ?>:</b>
	<?php echo CHtml::encode($data->work_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_date_started')); ?>:</b>
	<?php echo CHtml::encode($data->work_date_started); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_date_finished')); ?>:</b>
	<?php echo CHtml::encode($data->work_date_finished); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_status')); ?>:</b>
	<?php echo CHtml::encode($data->work_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_type')); ?>:</b>
	<?php echo CHtml::encode($data->work_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_active')); ?>:</b>
	<?php echo CHtml::encode($data->work_active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('work_tasks')); ?>:</b>
	<?php echo CHtml::encode($data->work_tasks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_achievement_id')); ?>:</b>
	<?php echo CHtml::encode($data->work_achievement_id); ?>
	<br />

	*/ ?>

</div>