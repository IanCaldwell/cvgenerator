<?php
/* @var $this ActiveRecordLogController */
/* @var $model ActiveRecordLog */

$this->breadcrumbs=array(
	'Active Record Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ActiveRecordLog', 'url'=>array('index')),
	array('label'=>'Create ActiveRecordLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#active-record-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Active Record Logs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'active-record-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'log_id',
		'log_description',
		'log_action',
		'log_model',
		'log_idModel',
		'log_field',
		/*
		'log_creationdate',
		'log_userid',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
