<?php
/* @var $this UjianController */
/* @var $model Ujian */

$this->breadcrumbs=array(
	'Ujians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ujian', 'url'=>array('index')),
	array('label'=>'Manage Ujian', 'url'=>array('admin')),
);
?>

<h1>Create Ujian</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

