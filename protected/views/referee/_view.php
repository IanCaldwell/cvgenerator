<?php
/* @var $this RefereeController */
/* @var $data Referee */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('referee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->referee_id), array('view', 'id'=>$data->referee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referee_name')); ?>:</b>
	<?php echo CHtml::encode($data->referee_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referee_position')); ?>:</b>
	<?php echo CHtml::encode($data->referee_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referee_phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->referee_phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referee_active')); ?>:</b>
	<?php echo CHtml::encode($data->referee_active); ?>
	<br />


</div>