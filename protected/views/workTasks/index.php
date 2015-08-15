<?php
/* @var $this WorkTasksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Work Tasks',
);

$this->menu=array(
	array('label'=>'Create WorkTasks', 'url'=>array('create')),
	array('label'=>'Manage WorkTasks', 'url'=>array('admin')),
);
?>

<h1>Work Tasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
