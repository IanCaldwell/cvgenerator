<br/>
<h3 style="line-height: 0px;">Education</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'education-grid',
	'dataProvider'=>$educationDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'education_name',
                'education_degree',
		'education_description',
		'education_result',
		'education_type',
		'education_date_attended',
                array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => array(

                        'update' => array(
                            'url' => 'Yii::app()->createUrl("education/update", array("id"=>$data->education_id))',
                        ),

                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("education/delete", array("id"=>$data->education_id))',
                            'options' => array(                                    
                                'onClick' => 'return confirm("Are you sure you want to delete this Education permanently?")', 
                            )
                        ),                            
                    )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Education', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('education/selectType'),
            )      
        );
 
?>
<br/><br/>