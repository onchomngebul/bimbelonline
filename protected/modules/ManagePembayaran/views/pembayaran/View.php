<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal' => array('index'),
    $model->idpembayaran,
);

$this->menu = array(
    array('label' => 'Create New Pembayaran', 'url' => array('create')),
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idpembayaran',
        'user_id',
        array(
            'name' => 'Username',
            'value' => $model->r_user->username,
        ),
        'waktu',
        'jumlahpembayaran',
        array(
            'name' => 'Telah Dibayar',
            'value' => $model->telahdibayar == 1 ? "Sudah" : "Belum" ,
        ),
        'buktipembayaran',
    ),
));
?>
