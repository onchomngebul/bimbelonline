<?php
/* @var $this KlasifikasiMateriController */
/* @var $data KlasifikasiMateri */
?>

<div class="view">

       <b><?php echo CHtml::encode($data->getAttributeLabel('idsoal')); ?>:</b>
       <?php echo CHtml::link(CHtml::encode($data->idsoal), array('view', 'id' => $data->idsoal, 'id2' => $data->klasifikasiMateri_idmateri)); ?>
       <br />
       
       <b><?php echo CHtml::encode($data->getAttributeLabel('tipe')); ?>:</b>
       <?php echo CHtml::encode($data->tipe); ?>
       <br />
       
       <b><?php echo CHtml::encode($data->getAttributeLabel('pertanyaan')); ?>:</b>
       <?php echo CHtml::encode($data->pertanyaan); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('pilihanjawaban')); ?>:</b>
       <?php echo CHtml::encode($data->pilihanjawaban); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('jawaban')); ?>:</b>
       <?php echo CHtml::encode($data->jawaban); ?>
       <br />
       
       <b><?php echo CHtml::encode($data->getAttributeLabel('bahasan')); ?>:</b>
       <?php echo CHtml::encode($data->bahasan) ;   ?>
       <br />

       

</div>