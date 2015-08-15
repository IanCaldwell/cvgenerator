<?php
/* @var $this EducationController */
/* @var $model Education */

$this->breadcrumbs=array(
	'Educations'=>array('index'),
	$model->education_id,
);

$this->menu=array(
	array('label'=>'List Education', 'url'=>array('index')),
	array('label'=>'Create Education', 'url'=>array('create')),
	array('label'=>'Update Education', 'url'=>array('update', 'id'=>$model->education_id)),
	array('label'=>'Delete Education', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->education_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Education', 'url'=>array('admin')),
);
?>

<h1>View Education #<?php echo $model->education_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'education_id',
		'education_name',
		'education_description',
		'education_result',
		'education_type',
		'education_date_attended',
		'education_date_finished',
		'education_active',
	),
)); ?>
