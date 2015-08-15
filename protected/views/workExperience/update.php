<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */


?>

<h1>Edit <?php echo $model->work_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>