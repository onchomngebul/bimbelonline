<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

?>

<h1>Update User <?php echo $model->username; ?></h1>

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
              <?php echo $form->labelEx($model, 'password'); ?>
              <?php echo $form->passwordField($model, 'password', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'password'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'passworden'); ?>
              <?php echo $form->passwordField($model, 'passworden', array('size' => 45, 'maxlength' => 45)); ?>
              <?php echo $form->error($model, 'passworden'); ?>
       </div>

       <div class="row buttons">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

       <?php $this->endWidget(); ?>

</div>
<!-- form -->
