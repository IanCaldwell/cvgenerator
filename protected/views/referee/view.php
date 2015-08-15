<?php
/* @var $this RefereeController */
/* @var $model Referee */

$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->referee_id,
);

$this->menu=array(
	array('label'=>'List Referee', 'url'=>array('index')),
	array('label'=>'Create Referee', 'url'=>array('create')),
	array('label'=>'Update Referee', 'url'=>array('update', 'id'=>$model->referee_id)),
	array('label'=>'Delete Referee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->referee_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Referee', 'url'=>array('admin')),
);
?>

<h1>View Referee #<?php echo $model->referee_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'referee_id',
		'referee_name',
		'referee_position',
		'referee_phone_number',
		'referee_active',
	),
)); ?>
