

<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'ujian-form',
           'enableAjaxValidation' => false,
       ));
       ?>

       <p class="note">Fields with <span class="required">*</span> are required.</p>

       <?php echo $form->errorSummary($model); ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'namaujian'); ?>
              <?php echo $form->textField($model, 'namaujian', array('size' => 25, 'maxlength' => 25)); ?>
              <?php echo $form->error($model, 'namaujian'); ?>
       </div>

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
              <?php echo $form->labelEx($model, 'jumlahsoal'); ?>
              <?php echo $form->textField($model, 'jumlahsoal'); ?>
              <?php echo $form->error($model, 'jumlahsoal'); ?>
       </div>
       
       <div class="row">
              <?php echo $form->labelEx($model, 'waktu'); ?>
              <?php echo $form->textField($model, 'waktu'); ?>
              <?php echo $form->error($model, 'waktu'); ?>
       </div>

       <div class="row">
              <?php
              $this->widget('application.extensions.appendo.JAppendo', array(
                  'id' => 'repeateEnum',
                  'model' => $model,
                  'viewName' => 'addklasfmat',
                  'labelDel' => 'Remove Row',
                      // 'cssFile' => 'css/jquery.appendo2.css'
              ));
              ?>
       </div>

       <div class="row buttons">
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

<?php $this->endWidget(); ?>

</div><!-- form -->