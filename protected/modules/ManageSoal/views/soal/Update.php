<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal' => array('/soal'),
    $model->idsoal => array('view', 'id' => $model->idsoal),
    'Update',
);

$this->menu = array(
    array('label' => 'Create New Soal', 'url' => array('create')),
    array('label' => 'Manage Soal', 'url' => array('admin')),
);
?>

<h1>Update Soal<?php echo $model->idsoal; ?></h1>


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
              <?php echo $form->labelEx($model, 'pertanyaan'); ?>
              <?php
              $this->widget('application.extensions.cleditor.ECLEditor', array(
                  'model' => $model,
                  'attribute' => 'pertanyaan',
                  'options' => array(
                      'width' => '700',
                      'height' => '200',
                      'useCSS' => true,
                  ),
                  'value' => $model->soalss,));
              ?>
              <?php echo $form->error($model, 'pertanyaan'); ?>
       </div>

       <?php
       $pil = array('a' => 'a', 'b' => 'b', 'c' => 'c', 'd'=>'d', 'e' =>'e');

       echo $form->labelEx($model, 'pilihanjawaban');
       for ($i = 0; $i < 5; $i++) {
              echo $form->textField($model, 'piljawa[' . $i . ']');
       }
       echo $form->radioButtonList($model, 'jawaban', $pil, 
               array('labelOptions' => array('style' => 'display:inline'), 'separator' => ' '));

       echo $form->error($model, 'pilihanjawaban');
       ?>

       <div class="row">
              <?php echo $form->labelEx($model, 'bahasan'); ?>
              <?php
              $this->widget('application.extensions.cleditor.ECLEditor', array(
                  'model' => $model,
                  'attribute' => 'bahasan',
                  'options' => array(
                      'width' => '700',
                      'height' => '200',
                      'useCSS' => true,
                  ),
                  'value' => $model->soalss,));
              ?>
              <?php echo $form->error($model, 'bahasan'); ?>
       </div>

       <div class="row">
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
       </div>

       <?php $this->endWidget(); ?>
</div>
