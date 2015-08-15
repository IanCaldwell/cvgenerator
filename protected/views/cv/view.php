<?php
/* @var $this CvController */
/* @var $model Cv */

?>

<h1><?php echo $model->cv_title; ?></h1>
<div align="right" style="width:50%; margin:auto; margin-top: 100px; height:100px; margin-left:300px;">
<?php 
        If($model->cv_category_id==1)
        {
            echo TbHtml::linkButton('Generate C.V',
                    array('block' => true,
                          'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                          'url'  => Yii::app()->createUrl('cv/generateCVIT', array('id'=>$model->cv_id)),
                          'size'=>TbHtml::BUTTON_SIZE_LARGE,
                        )
                );
        }
        else
        {
            echo TbHtml::linkButton('Generate C.V',
                    array('block' => true,
                          'color' => TbHtml::BUTTON_COLOR_INVERSE, 
                          'url'  => Yii::app()->createUrl('cv/generateCV', array('id'=>$model->cv_id)),
                          'size'=>TbHtml::BUTTON_SIZE_LARGE,
                        )
                );
        }
?>
</div>
