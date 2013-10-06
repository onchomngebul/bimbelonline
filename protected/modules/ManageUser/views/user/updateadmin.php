<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->username; ?></h1>


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
              <?php echo $form->labelEx($model, 'username'); ?>
              <?php echo $form->textField($model, 'username', array('size' => 10, 'maxlength' => 10)); ?>
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
              <?php echo $form->labelEx($model, 'level'); ?>
              <?php
              echo $form->dropDownList($model, 'level', array(
                  '0' => "Admin", '1' => "Bimbel Manager",
                  '2' => "Question Suplier", '3' => "Manager Finansial", '5' => "Siswa"));
              ?>
              <?php echo $form->error($model, 'level'); ?>
       </div>


       <div class="row buttons">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

       <?php $this->endWidget(); ?>

</div>
<!-- form -->
