<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'updklasfmat-form',
           'enableAjaxValidation' => false,
       ));
       ?>

       <p class="note">Fields with <span class="required">*</span> are required.</p>

       <?php echo $form->errorSummary($model1); ?>

       <div class="row">
              <?php echo $form->labelEx($model2, 'kelas'); ?>
              <?php echo $form->dropDownList($model2, 'kelas', $listKelas); ?>
              <?php echo $form->error($model2, 'kelas'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model2, 'matapelajaran'); ?>
              <?php echo $form->dropDownList($model2, 'matapelajaran', $listMapel); ?>
              <?php echo $form->error($model2, 'matapelajaran'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model2, 'bab'); ?>
              <?php echo $form->dropDownList($model2, 'bab', $listBab); ?>
              <?php echo $form->error($model2, 'bab'); ?>
       </div>

       <div class="row buttons">
              <?php echo CHtml::submitButton($model2->isNewRecord ? 'Create' : 'Save'); ?>
       </div>
       <?php $this->endWidget(); ?>

</div><!-- form -->


       <?php echo CHtml::Button('Cancel', array('submit' => array('/ManageUjian/ujian/update', 'id'=>$model1->ujian_idujian))); ?>
