<?php
/* @var $this KlasifikasiMateriController */
/* @var $model KlasifikasiMateri */

$this->breadcrumbs = array(
    'Klasifikasi Materis' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage KlasifikasiMateri', 'url' => array('admin')),
);
?>

<h1>Create Klasifikasi Materi</h1>

<?php echo $this->renderPartial('_form', array(
    'model' => $model, 'listKelas' => $listKelass, 'listMapel' => $listMapel, 'listBab' => $listBab));
?>