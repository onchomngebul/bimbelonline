<?php
/* @var $this BimbinganController */

$this->breadcrumbs=array(
	'Bimbingan',
);
?>
<h1>Simulasi Ujian</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>