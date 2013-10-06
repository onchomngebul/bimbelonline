<?php
/* @var $this KlasifikasiMateriController */
/* @var $model KlasifikasiMateri */

$this->breadcrumbs = array(
    'Soal-Soal' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Soal', 'url' => array('index')),
    array('label' => 'Create New Soal', 'url' => array('create')),
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

<h1>Manage Soal</h1>
<hr>

<p>
       You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
       or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
       <?php
       $this->renderPartial('_search', array(
           'model' => $model,
       ));
       ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'type' => 'striped bordered condensed',
	'template' => "{items}",
    'id' => 'soal-grid',
    'dataProvider' => $model->searchbyiduser(),
    'filter' => $model,
    'columns' => array(
        'idsoal',
        'klasifikasiMateri_idmateri',
        'tipe',
        'pertanyaan',
        'pilihanjawaban',
        'jawaban',
        'bahasan',
        'confirmed',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array
                (
                'view' => array
                    ('url' => 'Yii::app()->createUrl("/ManageSoal/soal/view", 
                           array("id"=> $data->idsoal,"id2"=> $data->klasifikasiMateri_idmateri))',),
                'update' => array
                    ('url' => 'Yii::app()->createUrl("/ManageSoal/soal/update", 
                           array("id"=> $data->idsoal,"id2"=> $data->klasifikasiMateri_idmateri))',),
                'delete' => array
                    ('url' => 'Yii::app()->createUrl("/ManageSoal/soal/delete", 
                           array("id"=> $data->idsoal,"id2"=> $data->klasifikasiMateri_idmateri))',),
            )
        ),
    ),
));
?>
