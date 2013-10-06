<?php
/* @var $this UjianController */
/* @var $model Ujian */

$this->breadcrumbs = array(
    'Ujians' => array('index'),
    $model->idujian,
);

$this->menu = array(
    array('label' => 'Create Ujian', 'url' => array('create')),
    array('label' => 'Manage Ujian', 'url' => array('admin')),
);
?>

<h1>View Ujian #<?php echo $model->namaujian; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idujian',
        'namaujian',
        'kelas',
        'jumlahsoal',
        'waktu',
    ),
));
echo "<br/><br/>";
echo "Dibawah merupakan list klasifikasi materi yg termasuk ke dalam Ujian ini";

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ujian-grid',
    'dataProvider' => $model2->searchViaID($model->r_klasfmat),
    'filter' => $model2,
    'columns' => array(
        'idmateri',
        'kelas',
        'matapelajaran',
        'bab',
    ),
));
?>


