<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

?>

<h1>Update User <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_formUpdate', array('model'=>$model)); ?>