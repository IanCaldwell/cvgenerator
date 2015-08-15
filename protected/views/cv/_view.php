<?php
/* @var $this CvController */
/* @var $data Cv */
?>

<div class="view">
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('cv_title')); ?>:</b>	
	<?php echo CHtml::link(CHtml::encode($data->cv_title), array('view', 'id'=>$data->cv_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv_date_created')); ?>:</b>
	<?php echo CHtml::encode($data->cv_date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category->category_name); ?>
	<br />


</div>