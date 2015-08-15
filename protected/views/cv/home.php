<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Curriculum Vitae Home Page</h1>

<?php
echo TbHtml::linkButton('Create Curriculum Vitae', 
            array(  'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                    'url'  => Yii::app()->createUrl('cv/createCategory'),
            )      
        );
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$cvDataProvider,
	'itemView'=>'_view',
)); ?>
