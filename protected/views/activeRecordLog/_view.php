<?php
/* @var $this ActiveRecordLogController */
/* @var $data ActiveRecordLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->log_id), array('view', 'id'=>$data->log_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_description')); ?>:</b>
	<?php echo CHtml::encode($data->log_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_action')); ?>:</b>
	<?php echo CHtml::encode($data->log_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_model')); ?>:</b>
	<?php echo CHtml::encode($data->log_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_idModel')); ?>:</b>
	<?php echo CHtml::encode($data->log_idModel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_field')); ?>:</b>
	<?php echo CHtml::encode($data->log_field); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_creationdate')); ?>:</b>
	<?php echo CHtml::encode($data->log_creationdate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('log_userid')); ?>:</b>
	<?php echo CHtml::encode($data->log_userid); ?>
	<br />

	*/ ?>

</div>