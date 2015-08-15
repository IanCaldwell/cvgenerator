<?php
/* @var $this AchievementsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Achievements',
);

$this->menu=array(
	array('label'=>'Create Achievements', 'url'=>array('create')),
	array('label'=>'Manage Achievements', 'url'=>array('admin')),
);
?>

<h1>Achievements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
