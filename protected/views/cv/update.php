<?php
/* @var $this CvController */
/* @var $model Cv */

$this->breadcrumbs=array(
	'Cvs'=>array('index'),
	$model->cv_id=>array('view','id'=>$model->cv_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cv', 'url'=>array('index')),
	array('label'=>'Create Cv', 'url'=>array('create')),
	array('label'=>'View Cv', 'url'=>array('view', 'id'=>$model->cv_id)),
	array('label'=>'Manage Cv', 'url'=>array('admin')),
);
?>

<h1>Update Cv <?php echo $model->cv_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>