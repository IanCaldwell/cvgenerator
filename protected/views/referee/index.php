<?php
/* @var $this RefereeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Referees',
);

$this->menu=array(
	array('label'=>'Create Referee', 'url'=>array('create')),
	array('label'=>'Manage Referee', 'url'=>array('admin')),
);
?>

<h1>Referees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
