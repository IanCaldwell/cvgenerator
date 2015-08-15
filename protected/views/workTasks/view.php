<?php
/* @var $this WorkTasksController */
/* @var $model WorkTasks */

?>

<h1>View WorkTasks #<?php echo $model->task_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'task_id',
		'task_name',
		'task_description',
	),
)); ?>
