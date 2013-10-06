<?php
/* @var $this UjianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ujians',
);

$this->menu=array( 
	array('label'=>'Create Ujian', 'url'=>array('create')),
	array('label'=>'Manage Ujian', 'url'=>array('admin')),
);
?>

<h1>Ujians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
