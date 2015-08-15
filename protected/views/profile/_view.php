<?php
/* @var $this ProfileController */
/* @var $data Profile */
?>
<br/>
<h3 style="line-height: 0px;">Details</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<div class="view">    
    
        <b><?php echo "Name"; ?>:</b>
	<?php echo CHtml::encode($data->user->user_first_name)." ".CHtml::encode($data->user->user_secondary_name); ?>
	<br />    

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_mobile_number')); ?>:</b>
	<?php echo CHtml::encode($data->profile_mobile_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->profile_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->profile_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_address_3')); ?>:</b>
	<?php echo CHtml::encode($data->profile_address_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_address_4')); ?>:</b>
	<?php echo CHtml::encode($data->profile_address_4); ?>
	<br />

</div>
<div><?php

echo TbHtml::linkButton('Edit Details', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('profile/update', array('id'=>$data->profile_id)),
            )      
        );
    
?></div><br/>