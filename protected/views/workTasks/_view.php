<?php
/* @var $this WorkTasksController */
/* @var $data WorkTasks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->task_id), array('view', 'id'=>$data->task_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_name')); ?>:</b>
	<?php echo CHtml::encode($data->task_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_description')); ?>:</b>
	<?php echo CHtml::encode($data->task_description); ?>
	<br />


</div>