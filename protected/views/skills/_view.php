<?php
/* @var $this SkillsController */
/* @var $data Skills */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->skill_id), array('view', 'id'=>$data->skill_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_name')); ?>:</b>
	<?php echo CHtml::encode($data->skill_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_type')); ?>:</b>
	<?php echo CHtml::encode($data->skill_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_description')); ?>:</b>
	<?php echo CHtml::encode($data->skill_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_active')); ?>:</b>
	<?php echo CHtml::encode($data->skill_active); ?>
	<br />


</div>