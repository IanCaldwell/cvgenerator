<?php
/* @var $this WorkTasksController */
/* @var $model WorkTasks */

?>

<h2>Work Description for <?php echo $workExp->work_name; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>