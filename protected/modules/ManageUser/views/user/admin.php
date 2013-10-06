<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create User', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User</h1>
<hr>

<p>
       You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
       <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
       beginning of each of your search values to specify how the comparison
       should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none">
       <?php
       $this->renderPartial('_search', array(
           'model' => $model,
       ));
       ?>
</div>
<!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'type' => 'striped bordered condensed',
	'template' => "{items}",
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'username',
        'level',
        'jenispaket_idjenispaket',
        'kelas',
        'tanggalDaftar',
        'tanggalLahir',
        'jenisKelamin',        
//          'avatar',         
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array
                (
                'update' => array
                    ('url' => 'Yii::app()->createUrl("/ManageUser/user/updateadmin", 
                           array("id"=> $data->id))',),
            )
        ),
    ),
));
?>

Keterangan User Level ==>  0 = Admin; 1 = M Bimbel; 2 = QS; 3 = M Pembayaran; 5 = Siswa