<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>



<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div style="margin-left:30px;" class="form">

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
              <?php echo $form->labelEx($model, 'username'); ?>
              <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20)); ?>
              <?php echo $form->error($model, 'username'); ?>
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
              <?php echo $form->labelEx($model, 'password'); ?>
              <?php echo $form->passwordField($model, 'password', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'password'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'passworden'); ?>
              <?php echo $form->passwordField($model, 'passworden', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'passworden'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'email'); ?>
              <?php echo $form->textField($model, 'email', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'email'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'avatar'); ?>
              <?php echo $form -> fileField($model, 'avatar');?>
              <?php echo $form->error($model, 'avatar'); ?>
       </div>


       <?php if (extension_loaded('gd')): ?>
              <div class="row">
                     <?php echo CHtml::activeLabelEx($model, 'verifyCode') ?>
                     <div>
                            <?php $this->widget('CCaptcha'); ?>
                            <br />
                            <?php echo CHtml::activeTextField($model, 'verifyCode'); ?>
                     </div>
                     <div class="hint">
                            Ketik tulisan yang ada pada gambar . <br />Tulisan tidak case
                            sensitive
                     </div>
                     <?php echo $form->error($model, 'verifyCode'); ?>
              </div>
       <?php endif; ?>

       <div class="row buttons">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

       <?php $this->endWidget(); ?>

</div>
<!-- form -->
