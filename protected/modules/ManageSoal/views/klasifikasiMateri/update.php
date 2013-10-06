<?php
/* @var $this KlasifikasiMateriController */
/* @var $model KlasifikasiMateri */

$this->breadcrumbs=array(
	'Klasifikasi Materis'=>array('index'),
	$model->idmateri=>array('view','id'=>$model->idmateri),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage KlasifikasiMateri', 'url'=>array('admin')),
);
?>

<h1>Update KlasifikasiMateri <?php echo $model->idmateri; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model' => $model, 'listKelas' => $listKelass, 'listMapel' => $listMapel, 'listBab' => $listBab));
?>