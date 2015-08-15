<br/>
<h3 style="line-height: 0px;">Referees</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'referee-grid',
	'dataProvider'=>$refereeDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'referee_name',
		'referee_position',
		'referee_phone_number',
		array(
                    'class'=>'CButtonColumn',
                    'template' => '{view}{delete}',
                    'buttons' => array(

                        'view' => array(
                            'url' => 'Yii::app()->createUrl("referee/view", array("id"=>$data->referee_id))',
                        ),

                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("referee/delete", array("id"=>$data->referee_id))',
                            'options' => array(                                    
                                'onClick' => 'return confirm("Are you sure you want to delete this Referee permanently?")', 
                            )
                        ),                            
                    )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Referees', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('referee/create'),
            )      
        );
 
?>
<br/>