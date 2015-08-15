<?php
/* @var $this InterestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Interests',
);

$this->menu=array(
	array('label'=>'Create Interest', 'url'=>array('create')),
	array('label'=>'Manage Interest', 'url'=>array('admin')),
);
?>

<h1>Interests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
