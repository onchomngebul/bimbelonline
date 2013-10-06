<?php
/* @var $this BimbinganController */

$this->breadcrumbs = array(
    'User' => array('/user'),
    'listbimb',
);

?>

<h1>Log History Bimbingan</h1>

<p>
       You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
       or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'bimbingan-grid',
    'dataProvider' => $model->searchViaID(Yii::app()->user->id),
    'filter' => $model,
    'columns' => array(
        'idbimbingan',
        array(
            'name' => 'namaujian',
            'value' => '$data->r_ujian->namaujian',
        ),
        'waktubimbingan',
        'nilai',
        'catatan',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}',
            'buttons' => array
                (
                'view' => array
                    ('url' => 'Yii::app()->createUrl("ManageUjian/Bimbingan/view", 
                           array("id1"=> $data->idbimbingan,"id2"=> $data->ujian_idujian, "id3"=> $data->user_id))',),
            )
        ),
    ),
));
?>

<p class="hint">
       <?php echo CHtml::link('Lihat Grafik', array('user/lihatgrafik')); ?>
</p>