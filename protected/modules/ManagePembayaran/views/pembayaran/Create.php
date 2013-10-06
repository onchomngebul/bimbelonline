<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal' => array('/soal'),
    'Create',
);

//$this->menu = array(
//    array('label' => 'Create New Soal', 'url' => array('create')),
//);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'pembayaran-form',
           'enableAjaxValidation' => false,
           'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
              <?php echo $form->labelEx($model, 'keterangan'); ?>
              <?php echo $form->textField($model, 'keterangan', array('size' => 500, 'maxlength' => 500)); ?>
              <?php echo $form->error($model, 'keterangan'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'image'); ?>
              <?php echo $form->fileField($model, 'image'); ?>
              <?php echo $form->error($model, 'image'); ?>
       </div>

       <div class="row">
              <?php echo CHtml::submitButton('Create'); ?>
       </div>

       <?php $this->endWidget(); ?>
</div>
