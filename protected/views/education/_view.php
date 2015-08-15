<?php
/* @var $this EducationController */
/* @var $data Education */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->education_id), array('view', 'id'=>$data->education_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_name')); ?>:</b>
	<?php echo CHtml::encode($data->education_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_description')); ?>:</b>
	<?php echo CHtml::encode($data->education_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_result')); ?>:</b>
	<?php echo CHtml::encode($data->education_result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_type')); ?>:</b>
	<?php echo CHtml::encode($data->education_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_date_attended')); ?>:</b>
	<?php echo CHtml::encode($data->education_date_attended); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_date_finished')); ?>:</b>
	<?php echo CHtml::encode($data->education_date_finished); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('education_active')); ?>:</b>
	<?php echo CHtml::encode($data->education_active); ?>
	<br />

	*/ ?>

</div>