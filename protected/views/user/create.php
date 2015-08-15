<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);


?>

<h1>Register for Free!</h1>

<?php $this->renderPartial('../user/_form', array('model'=>$model)); ?>