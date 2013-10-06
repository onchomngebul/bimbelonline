<?php
/* @var $this UjianController */
/* @var $model Ujian */

$this->breadcrumbs = array(
    'Ujians' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Ujian', 'url' => array('index')),
    array('label' => 'Create Ujian', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ujian-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ujian</h1>
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
    'id' => 'ujian-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idujian',
        'namaujian',
        'kelas',
        'jumlahsoal',
        'waktu',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
