<?php
/* @var $this JenispaketController */
/* @var $model Jenispaket */

$this->breadcrumbs=array(
	'Jenispakets'=>array('index'),
	$model->idjenispaket,
);

$this->menu=array(
	array('label'=>'List Jenispaket', 'url'=>array('index')),
	array('label'=>'Create Jenispaket', 'url'=>array('create')),
	array('label'=>'Update Jenispaket', 'url'=>array('update', 'id'=>$model->idjenispaket)),
	array('label'=>'Delete Jenispaket', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idjenispaket),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jenispaket', 'url'=>array('admin')),
);
?>

<h1>View Jenispaket #<?php echo $model->idjenispaket; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idjenispaket',
		'namapaket',
		'masaaktif',
		'biaya',
		'keterangan',
	),
)); ?>
