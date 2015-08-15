<br/>
<h3 style="line-height: 0px;">Awards & Achievements</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'achievements-grid',
	'dataProvider'=>$achievementsDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'achievement_name',
		'achievement_description',
                array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => array(

                        'update' => array(
                            'url' => 'Yii::app()->createUrl("achievements/update", array("id"=>$data->achievement_id))',
                        ),

                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("achievements/delete", array("id"=>$data->achievement_id))',
                            'options' => array(                                    
                                'onClick' => 'return confirm("Are you sure you want to delete this Achievement permanently?")', 
                            )
                        ),                            
                    )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Achievements', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('achievements/create'),
            )      
        );
 
?>
<br/>