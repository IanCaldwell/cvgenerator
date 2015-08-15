<?php
/* @var $this WorkExperienceController */
/* @var $model WorkExperience */

$this->breadcrumbs=array(
	'Work Experiences'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List WorkExperience', 'url'=>array('index')),
	array('label'=>'Create WorkExperience', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#work-experience-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Work Experiences</h1>

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
	'id'=>'work-experience-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'work_id',
		'work_name',
		'work_date_started',
		'work_date_finished',
		'work_status',
		'work_type',
		/*
		'work_active',
		'work_tasks',
		'work_achievement_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
