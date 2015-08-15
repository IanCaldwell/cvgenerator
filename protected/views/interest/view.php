<?php
/* @var $this InterestController */
/* @var $model Interest */

$this->breadcrumbs=array(
	'Interests'=>array('index'),
	$model->interest_id,
);

$this->menu=array(
	array('label'=>'List Interest', 'url'=>array('index')),
	array('label'=>'Create Interest', 'url'=>array('create')),
	array('label'=>'Update Interest', 'url'=>array('update', 'id'=>$model->interest_id)),
	array('label'=>'Delete Interest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->interest_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Interest', 'url'=>array('admin')),
);
?>

<h1>View Interest #<?php echo $model->interest_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'interest_id',
		'interest_description',
		'interest_active',
	),
)); ?>
