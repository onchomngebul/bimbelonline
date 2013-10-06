<?php
/* @var $this BimbinganController */

$this->breadcrumbs = array(
    'Bimbingan' => array('/bimbingan'),
    'Update',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'bimbingan-form',
           'enableAjaxValidation' => false,
       ));
       ?>

       <p class="note">Fields with <span class="required">*</span> are required. </p>

       <?php echo $form->errorSummary($model); ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'nilai'); ?>
              <?php echo $form->textField($model, 'nilai'); ?>
              <?php echo $form->error($model, 'nilai'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'catatan'); ?>
              <?php echo $form->textArea($model, 'catatan'); ?>
              <?php echo $form->error($model, 'catatan'); ?>
       </div>

       <div class="row">
              <?php
              foreach ($model2 as $persoal) {
                     echo "No Soal : ".$persoal->nosoal."_______________________";
                     $this->widget('zii.widgets.CDetailView', array(
                         'data' => $persoal,
                         'attributes' => array(
                             'bimbingan_idbimbingan',
                             'soal_idsoal',
                             array(
                                 'name' => 'Pertanyaan',
                                 'value' => $persoal->r_soal->pertanyaan,
                             ),
                             'dijawabbenar',
                             'jawabansiswa',
                         ),
                     ));
              }
              ?>
       </div>

       <div class="row buttons">
              <?php echo CHtml::submitButton('Save'); ?>
       </div>

       <?php $this->endWidget(); ?>

</div><!-- form -->