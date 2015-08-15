<br/>
<h3 style="line-height: 0px;">Work Experience</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'experience-grid',
	'dataProvider'=>$experienceDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'work_name',
		'work_status',
		'work_date_started',
		'work_date_finished',
                array(
                   'name'=>'work_type',
                   'header'=>'Type',
                   'value'=> '$data->typeText',
                ),
                array(
			'class'=>'CButtonColumn',
                        'template' => '{view}{update}{delete}',
                        'buttons' => array(
                            
                            'view' => array(
                                'url' => 'Yii::app()->createUrl("workExperience/view", array("id"=>$data->work_id))',
                            ), 
                            'update' => array(
                                'url' => 'Yii::app()->createUrl("workExperience/update", array("id"=>$data->work_id))',
                            ),
                            'delete' => array(
                                'url' => 'Yii::app()->createUrl("workExperience/delete", array("id"=>$data->work_id))',
                            ),
                        )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Work Experience', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('workexperience/create'),
            )      
        );
 
?>
<br/><br/>