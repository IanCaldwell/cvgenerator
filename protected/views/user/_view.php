<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_secondary_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_secondary_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_email')); ?>:</b>
	<?php echo CHtml::encode($data->user_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_password')); ?>:</b>
	<?php echo CHtml::encode($data->user_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_date_created')); ?>:</b>
	<?php echo CHtml::encode($data->user_date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_file_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_file_id); ?>
	<br />


</div>