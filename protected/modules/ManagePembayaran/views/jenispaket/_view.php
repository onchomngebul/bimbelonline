<?php
/* @var $this JenispaketController */
/* @var $data Jenispaket */
?>

<div class="view">

       <?php echo CHtml::Button('Beli Paket', array('submit' => array('PilihPaket', 'id' => $data->idjenispaket))); ?><br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('idjenispaket')); ?>:</b>
       <?php echo CHtml::encode($data->idjenispaket); ?>
       <br />
       
       <b><?php echo CHtml::encode($data->getAttributeLabel('namapaket')); ?>:</b>
       <?php echo CHtml::encode($data->namapaket); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('masaaktif')); ?>:</b>
       <?php echo CHtml::encode($data->masaaktif); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('biaya')); ?>:</b>
       <?php echo CHtml::encode($data->biaya); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
       <?php echo CHtml::encode($data->keterangan); ?>
       <br />


</div>