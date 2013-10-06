<?php
/* @var $this JenispaketController */
/* @var $model Jenispaket */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jenispaket-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'namapaket'); ?>
		<?php echo $form->textField($model,'namapaket',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'namapaket'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'masaaktif'); ?>
		<?php echo $form->textField($model,'masaaktif'); ?> Dalam Hari
		<?php echo $form->error($model,'masaaktif'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya'); ?>
		Rp <?php echo $form->textField($model,'biaya'); ?>,00
		<?php echo $form->error($model,'biaya'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->