<?php
/* @var $this UjianController */
/* @var $data Ujian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idujian')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idujian), array('view', 'id'=>$data->idujian)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaujian')); ?>:</b>
	<?php echo CHtml::encode($data->namaujian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
	<?php echo CHtml::encode($data->kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlahsoal')); ?>:</b>
	<?php echo CHtml::encode($data->jumlahsoal); ?>
	<br />


</div>