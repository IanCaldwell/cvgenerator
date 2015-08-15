<?php
/* @var $this InterestController */
/* @var $model Interest */

$this->breadcrumbs=array(
	'Interests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Interest', 'url'=>array('index')),
	array('label'=>'Manage Interest', 'url'=>array('admin')),
);
?>

<h1>Create Interest</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>