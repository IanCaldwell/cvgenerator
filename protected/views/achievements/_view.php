<?php
/* @var $this AchievementsController */
/* @var $data Achievements */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('achievement_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->achievement_id), array('view', 'id'=>$data->achievement_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('achievement_name')); ?>:</b>
	<?php echo CHtml::encode($data->achievement_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('achievement_description')); ?>:</b>
	<?php echo CHtml::encode($data->achievement_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('achievement_type')); ?>:</b>
	<?php echo CHtml::encode($data->achievement_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('achievement_position')); ?>:</b>
	<?php echo CHtml::encode($data->achievement_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acheievent_active')); ?>:</b>
	<?php echo CHtml::encode($data->acheievent_active); ?>
	<br />


</div>