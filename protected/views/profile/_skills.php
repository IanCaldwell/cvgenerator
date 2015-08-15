<br/>
<h3 style="line-height: 0px;">Skills</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">

<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'skills-grid',
	'dataProvider'=>$skillsDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'skill_name',
		'skill_description',
		array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => array(

                        'update' => array(
                            'url' => 'Yii::app()->createUrl("skills/update", array("id"=>$data->skill_id))',
                        ),

                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("skills/delete", array("id"=>$data->skill_id))',
                            'options' => array(                                    
                                'onClick' => 'return confirm("Are you sure you want to delete this Skill permanently?")', 
                            )
                        ),                            
                    )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Skills', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('skills/create'),
            )      
        );
 
?>
<br/><br/>