<?php
/* @var $this InterestController */
/* @var $data Interest */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('interest_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->interest_id), array('view', 'id'=>$data->interest_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interest_description')); ?>:</b>
	<?php echo CHtml::encode($data->interest_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interest_active')); ?>:</b>
	<?php echo CHtml::encode($data->interest_active); ?>
	<br />


</div>