<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal' => array('index'),
    $model->idsoal,
);

$this->menu = array(
    array('label' => 'Create New Soal', 'url' => array('create')),
    array('label' => 'Update Soal', 'url' => array('update', 'id'=>$model->idsoal, 'id2'=>$model->klasifikasiMateri_idmateri)),
    array('label' => 'Manage Soal', 'url' => array('admin')),
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idsoal',
        'klasifikasiMateri_idmateri',
        'tipe',
        'pertanyaan',
        'pilihanjawaban',
        'jawaban',
        'bahasan',
        'idpj',
    ),
));
?>
