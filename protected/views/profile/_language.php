<br/>
<h3 style="line-height: 0px;">Languages</h3>
<hr size = "10" style="background-color: black;margin: 2px 0;">
<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'language-grid',
	'dataProvider'=>$languageDataProvider,
	//'filter'=>$skills,
	'columns'=>array(
		'language_name',
		'language_description',
		array(
                    'class'=>'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => array(

                        'update' => array(
                            'url' => 'Yii::app()->createUrl("language/update", array("id"=>$data->language_id))',
                        ),

                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("language/delete", array("id"=>$data->language_id))',
                            'options' => array(                                    
                                'onClick' => 'return confirm("Are you sure you want to delete this Language permanently?")', 
                            )
                        ),                            
                    )
		),
	),
    )); 

 
 echo TbHtml::linkButton('Add Languages', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('language/create'),
            )      
        );
 
?>
<br/>