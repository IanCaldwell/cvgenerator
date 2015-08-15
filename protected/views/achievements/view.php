<?php
/* @var $this AchievementsController */
/* @var $model Achievements */

$this->breadcrumbs=array(
	'Achievements'=>array('index'),
	$model->achievement_id,
);

$this->menu=array(
	array('label'=>'List Achievements', 'url'=>array('index')),
	array('label'=>'Create Achievements', 'url'=>array('create')),
	array('label'=>'Update Achievements', 'url'=>array('update', 'id'=>$model->achievement_id)),
	array('label'=>'Delete Achievements', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->achievement_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Achievements', 'url'=>array('admin')),
);
?>

<h1>View Achievements #<?php echo $model->achievement_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'achievement_id',
		'achievement_name',
		'achievement_description',
		'achievement_type',
		'achievement_position',
		'acheievent_active',
	),
)); ?>
