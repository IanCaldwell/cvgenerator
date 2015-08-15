<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->category_id), array('view', 'id'=>$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_count')); ?>:</b>
	<?php echo CHtml::encode($data->category_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cvgen_categorycol')); ?>:</b>
	<?php echo CHtml::encode($data->cvgen_categorycol); ?>
	<br />


</div>