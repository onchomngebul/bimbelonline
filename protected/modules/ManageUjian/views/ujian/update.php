<?php
/* @var $this UjianController */
/* @var $model Ujian */

$this->breadcrumbs=array(
	'Ujians'=>array('index'),
	$model->idujian=>array('view','id'=>$model->idujian),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Ujian', 'url'=>array('admin')),
);
?>

<h1>Update Ujian <?php echo $model->idujian; ?></h1>

<?php echo $this->renderPartial('_formupdate', array('model'=>$model)); ?>

<?php
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
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}||||{delete}',
            'buttons' => array
                (
                'update' => array
                    ('url' => 'Yii::app()->createUrl("/ManageUjian/Ujian/UpdateKlasfmat", 
                           array("id1"=> $data->idmateri, "id2"=> '.$model->idujian.'))',),
                'delete' => array
                    ('url' => 'Yii::app()->createUrl("/ManageUjian/Ujian/DeleteKlasfmat", 
                           array("id1"=> $data->idmateri, "id2"=> '.$model->idujian.'))',),
            )
        ),
    ),
));
?>

<div class="row buttons">
       <?php echo CHtml::Button('Tambah Klasifikasi Materi', array('submit' => array('/ManageUjian/ujian/CreateKlasfmat', 'id'=>$model->idujian))); ?>
</div>