<br/>
<h3 style="line-height: 0px;">Interests</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'interests-grid',
	'dataProvider'=>$interestDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'interest_description',
		array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => array(

                        'update' => array(
                            'url' => 'Yii::app()->createUrl("interest/update", array("id"=>$data->interest_id))',
                        ),

                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("interest/delete", array("id"=>$data->interest_id))',
                            'options' => array(                                    
                                'onClick' => 'return confirm("Are you sure you want to delete this Interest permanently?")', 
                            )
                        ),                            
                    )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Interests', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('interest/create'),
            )      
        );
 
?>
<br/>