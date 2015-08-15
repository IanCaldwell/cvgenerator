<?php
/* @var $this CvController */
/* @var $model Cv */

?>

<h3>Curriculum Vitae Creation</h3>

<?php $this->renderPartial('_form', array(
                'model'=>$model, 
                'experienceDataProvider'=>$experienceDataProvider,
                'languageDataProvider'=>$languageDataProvider,
                'skillDataProvider'=>$skillDataProvider,
                'achievementDataProvider'=>$achievementDataProvider,
                'interestDataProvider'=>$interestDataProvider,
        
        )); 
?>