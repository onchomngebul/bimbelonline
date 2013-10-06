<?php
/* @var $this JenispaketController */
/* @var $model Jenispaket */

$this->breadcrumbs=array(
	'Jenispakets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jenispaket', 'url'=>array('index')),
	array('label'=>'Manage Jenispaket', 'url'=>array('admin')),
);
?>

<h1>Create Jenispaket</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>