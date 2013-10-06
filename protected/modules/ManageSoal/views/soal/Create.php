<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal' => array('/soal'),
    'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'id' => 'soal-form',
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
              <?php echo $form->labelEx($model, 'mapel'); ?>
              <?php echo $form->dropDownList($model, 'mapel', $listMapel); ?>
              <?php echo $form->error($model, 'mapel'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'bab'); ?>
              <?php echo $form->dropDownList($model, 'bab', $listBab); ?>
              <?php echo $form->error($model, 'bab'); ?>
       </div>

       <?php
       $listtipe = array(
           "free" => "Free",
           "premium" => "Premium",
       );       
       ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'tipe'); ?>
              <?php echo $form->dropDownList($model, 'tipe', $listtipe); ?>
              <?php echo $form->error($model, 'tipe'); ?>
       </div>

       <div class="row">
              <?php echo $form->labelEx($model, 'soalss'); ?>
              <?php
              $this->widget('application.extensions.cleditor.ECLEditor', array(
                  'model' => $model,
                  'attribute' => 'soalss',
                  'options' => array(
                      'width' => '700',
                      'height' => '300',
                      'useCSS' => true,
                  ),
                  'value' => $model->soalss,));
              ?>
              <?php echo $form->error($model, 'soalss'); ?>
       </div>

       <div class="row">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

       <?php $this->endWidget(); ?>
       aturan: pertanyaan###pilihan jawaban A-pilihan jawaban B-pilihan jawaban Cdst###jawaban###pembahasan
</div>
