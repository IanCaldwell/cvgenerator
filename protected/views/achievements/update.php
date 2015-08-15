<?php
/* @var $this AchievementsController */
/* @var $model Achievements */

$this->breadcrumbs=array(
	'Achievements'=>array('index'),
	$model->achievement_id=>array('view','id'=>$model->achievement_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Achievements', 'url'=>array('index')),
	array('label'=>'Create Achievements', 'url'=>array('create')),
	array('label'=>'View Achievements', 'url'=>array('view', 'id'=>$model->achievement_id)),
	array('label'=>'Manage Achievements', 'url'=>array('admin')),
);
?>

<h1>Update Achievements <?php echo $model->achievement_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>