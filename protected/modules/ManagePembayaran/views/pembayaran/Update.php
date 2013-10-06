<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal' => array('/soal'),
    $model->idpembayaran => array('view', 'id' => $model->idpembayaran),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage Pembayaran', 'url' => array('admin')),
);
?>

<h1>Update Pembayaran dg ID <?php echo $model->idpembayaran; ?> dan Username <?php echo $model->r_user->username ?> </h1>


<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'pembayaran-form',
           'enableAjaxValidation' => false,
       ));
       ?>

       <p class="note">Fields with <span class="required">*</span> are required.</p>

       <?php
       echo $form->errorSummary($model);
       $listpembayaran = array(
           "5000" => "Rp 5.000,00", "10000" => "Rp 10.000,00", "25000" => "Rp 25.000,00",
           "50000" => "Rp 50.000,00", "100000" => "Rp 100.000,00", "300000" => "Rp 300.000,00"
       );
       ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'jumlahpembayaran'); ?>
              <?php echo $form->dropDownList($model, 'jumlahpembayaran', $listpembayaran); ?>
              <?php echo $form->error($model, 'jumlahpembayaran'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'telahdibayar'); ?>
              <?php echo $form->radioButtonList($model, 'telahdibayar', array('1' => 'Sudah', '0' => 'Belum'), array('labelOptions' => array('style' => 'display:inline'), 'separator' => ' '));
              ?>
              <?php echo $form->error($model, 'telahdibayar'); ?>
       </div>

       <div class="row">
              <?php echo CHtml::submitButton('Save'); ?>
       </div>

       <?php $this->endWidget(); ?>
</div>
