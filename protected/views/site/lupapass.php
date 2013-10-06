


<div class="form">
       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'lupapass-form',
       ));
       ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'username'); ?>
              <?php echo $form->textField($model, 'username'); ?>
              <?php echo $form->error($model, 'username'); ?>
       </div>
       
       <div class="row">
              <?php echo $form->labelEx($model, 'email'); ?>
              <?php echo $form->textField($model, 'email'); ?>
              <?php echo $form->error($model, 'email'); ?>
       </div>

       <div class="row buttons">
              <?php echo CHtml::submitButton('reset password'); ?>
       </div>

       <?php $this->endWidget(); ?>
</div><!-- form -->
