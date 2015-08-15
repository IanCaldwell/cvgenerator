<?php
/* @var $this InterestController */
/* @var $model Interest */

$this->breadcrumbs=array(
	'Interests'=>array('index'),
	$model->interest_id=>array('view','id'=>$model->interest_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Interest', 'url'=>array('index')),
	array('label'=>'Create Interest', 'url'=>array('create')),
	array('label'=>'View Interest', 'url'=>array('view', 'id'=>$model->interest_id)),
	array('label'=>'Manage Interest', 'url'=>array('admin')),
);
?>

<h1>Update Interest <?php echo $model->interest_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>