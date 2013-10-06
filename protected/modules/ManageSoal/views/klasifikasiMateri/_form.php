<?php
/* @var $this KlasifikasiMateriController */
/* @var $model KlasifikasiMateri */
/* @var $form CActiveForm */
?>

<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'klasifikasi-materi-form',
           'enableAjaxValidation' => false,
       ));
       ?>
 
       <p class="note">Fields with <span class="required">*</span> are required.</p>

       <?php echo $form->errorSummary($model); ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'kelas'); ?>
              <?php echo $form->dropDownList($model, 'kelas', $listKelas); ?>
              <?php echo $form->error($model, 'kelas'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'matapelajaran'); ?>
              <?php echo $form->dropDownList($model, 'matapelajaran', $listMapel); ?>
              Ketik di sini jika tidak ada => <?php echo $form->textField($model, 'newmapel', array('size' => 20, 'maxlength' => 20)); ?>
              <?php echo $form->error($model, 'matapelajaran'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'bab'); ?>
              <?php echo $form->dropDownList($model, 'bab', $listBab); ?>
              Ketik di sini jika tidak ada => <?php echo $form->textField($model, 'newbab', array('size' => 20, 'maxlength' => 20)); ?>
              <?php echo $form->error($model, 'bab'); ?>
       </div>

       <div class="row buttons">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

       <?php $this->endWidget(); ?>

</div><!-- form -->