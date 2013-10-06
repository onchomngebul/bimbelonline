<?php
/* @var $this JenispaketController */
/* @var $model Jenispaket */

$this->breadcrumbs=array(
	'Jenispakets'=>array('index'),
	$model->idjenispaket=>array('view','id'=>$model->idjenispaket),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jenispaket', 'url'=>array('index')),
	array('label'=>'Create Jenispaket', 'url'=>array('create')),
	array('label'=>'View Jenispaket', 'url'=>array('view', 'id'=>$model->idjenispaket)),
	array('label'=>'Manage Jenispaket', 'url'=>array('admin')),
);
?>

<h1>Update Jenispaket <?php echo $model->idjenispaket; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>