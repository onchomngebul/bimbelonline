<?php
/* @var $this KlasifikasiMateriController */
/* @var $model KlasifikasiMateri */

$this->breadcrumbs = array(
    'Managemen Pembayaran' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create New Order Pembayaran', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#soal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pembayaran</h1>
<hr>

<p>
       You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
       or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'type' => 'striped bordered condensed',
	'template' => "{items}",
    'id' => 'pembayaran-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idpembayaran',
        array(
            'name' => 'username',
            'value' => '$data->r_user->username',
        ),
        'waktu',
        array(
            'name' => 'jumlahpembayaran',
            'value' => '"Rp ".number_format($data->jumlahpembayaran,2,",",".")',
        ),
        array(
            'name' => 'telahdibayar',
            'value' => '$data->telahdibayar == 1 ? "Sudah" : "Belum" ',
        ),
        'buktipembayaran',
        'keterangan',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}    {delete}',
            'buttons' => array
                (
                'delete' => array
                    ('url' => 'Yii::app()->createUrl("/ManagePembayaran/pembayaran/delete", 
                           array("id"=> $data->idpembayaran,"id2"=> $data->user_id))',),
                'update' => array
                    ('url' => 'Yii::app()->createUrl("/ManagePembayaran/pembayaran/update", 
                           array("id"=> $data->idpembayaran,"id2"=> $data->user_id))',),
            )
        ),
    ),
));
?>
