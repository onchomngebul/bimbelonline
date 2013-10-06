<?php
/* @var $this BimbinganController */

$this->breadcrumbs = array(
    'Bimbingan' => array('/bimbingan'),
    'Admin',
);


?>

<h1>Manage Bimbingan</h1>
<hr>

<p>
       You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
       or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'type' => 'striped bordered condensed',
	'template' => "{items}",
    'id' => 'bimbingan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idbimbingan',
        array(
            'name' => 'user_id',
            'value' => '$data->r_user->username',
        ),
        array(
            'name' => 'namaujian',
            'value'=>'$data->r_ujian->namaujian',
        ),
        'waktubimbingan',
        'nilai',
        'catatan',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array
                (
                'view' => array
                    ('url' => 'Yii::app()->createUrl("/ManageUjian/Bimbingan/view", 
                           array("id1"=> $data->idbimbingan,"id2"=> $data->ujian_idujian, "id3"=> $data->user_id))',),
                'update' => array
                    ('url' => 'Yii::app()->createUrl("/ManageUjian/Bimbingan/update", 
                           array("id1"=> $data->idbimbingan,"id2"=> $data->ujian_idujian, "id3"=> $data->user_id))',),
                'delete' => array
                    ('url' => 'Yii::app()->createUrl("/ManageUjian/Bimbingan/delete", 
                           array("id1"=> $data->idbimbingan,"id2"=> $data->ujian_idujian, "id3"=> $data->user_id))',),
            )
        ),
    ),
));
?>

