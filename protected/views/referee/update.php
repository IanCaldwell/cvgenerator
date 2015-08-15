<?php
/* @var $this RefereeController */
/* @var $model Referee */

$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->referee_id=>array('view','id'=>$model->referee_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Referee', 'url'=>array('index')),
	array('label'=>'Create Referee', 'url'=>array('create')),
	array('label'=>'View Referee', 'url'=>array('view', 'id'=>$model->referee_id)),
	array('label'=>'Manage Referee', 'url'=>array('admin')),
);
?>

<h1>Update Referee <?php echo $model->referee_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>