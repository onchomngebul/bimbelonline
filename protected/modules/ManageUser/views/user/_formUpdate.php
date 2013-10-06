<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'user-form',
           'enableAjaxValidation' => false,
           'htmlOptions' => array('enctype' => 'multipart/form-data'),
       ));
       ?>

       <p class="note">
              Fields with <span class="required">*</span> are required.
       </p>

       <?php // echo $form->errorSummary($model);  ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'kelas'); ?>
              <?php
              echo $form->dropDownList($model, 'kelas', array('1' => "1 SD", '2' => "2 SD", '3' => "3 SD",
                  '4' => "4 SD", '5' => "5 SD", '6' => "6 SD",
                  '7' => "1 SMP", '8' => "2 SMP", '9' => "3 SMP",
                  '10' => "1 SMA", '11' => "2 SMA", '12' => "3 SMA"));
              ?>
              <?php echo $form->error($model, 'kelas'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'email'); ?>
              <?php echo $form->textField($model, 'email', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'email'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'noHp'); ?>
              <?php echo $form->textField($model, 'noHp', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'noHp'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'alamat'); ?>
              <?php echo $form->textField($model, 'alamat', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'alamat'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'namaDepan'); ?>
              <?php echo $form->textField($model, 'namaDepan', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'namaDepan'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'namaBelakang'); ?>
              <?php echo $form->textField($model, 'namaBelakang', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'namaBelakang'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'jenisKelamin'); ?>
              <?php echo $form->radioButtonList($model, 'jenisKelamin', array('Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'), array('labelOptions' => array('style' => 'display:inline'), 'separator' => ' '));
              ?>
              <?php echo $form->error($model, 'jenisKelamin'); ?>
       </div>

       <?php
       for ($i = 1; $i <= 30; $i++) {
              $tanggal[$i] = $i;
       }
       $bulan = array(
           '1' => "Januari", '2' => "Februari", '3' => "Maret",
           '4' => "April", '5' => "Mei", '6' => "Juni",
           '7' => "Juli", '8' => "Agustus", '9' => "September",
           '10' => "Oktober", '11' => "November", '12' => "Desember",);

       for ($i = 1990; $i <= 2030; $i++) {
              $tahun[$i] = $i;
       }
       ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'tanggalLahir'); ?>
              <?php echo $form->dropDownList($model, 'tgllahir', $tanggal); ?>
              <?php echo $form->dropDownList($model, 'blnlahir', $bulan); ?>
              <?php echo $form->dropDownList($model, 'thnlahir', $tahun); ?>
              <?php echo $form->error($model, 'tanggalLahir'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'avatar'); ?>
              <?php echo $form->fileField($model, 'avatar'); ?>
              <?php echo $form->error($model, 'avatar'); ?>
       </div>



       <div class="row buttons">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('ID' => "Submit")); ?>
       </div>

       <?php $this->endWidget(); ?>

</div>
<!-- form -->