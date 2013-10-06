<?php
/* @var $this UjianController */
/* @var $model Ujian */
/* @var $form CActiveForm */
?>

<style>
	.btn-info
	{
		background-image:linear-gradient(to bottom, #02786e, #02786e);
	}	
	
	.wide form {
		border: 2px solid rgb(163, 163, 163);
		width: 350;
		padding: 10;	
		background-color: rgb(248, 248, 248);		
	}
	
	.view_button {
		border-top: 1px solid rgb(95, 95, 95);
		padding-top: 5;		
		text-align: center;
	}
</style>

<div class="wide form">

       <?php
       $form = $this->beginWidget('CActiveForm', array(
           'action' => Yii::app()->createUrl($this->route),
           'method' => 'get',
       ));
       ?>

       <div class="row">
<?php echo $form->label($model, 'idujian'); ?>
<?php echo $form->textField($model, 'idujian'); ?>
       </div>

       <div class="row">
<?php echo $form->label($model, 'namaujian'); ?>
<?php echo $form->textField($model, 'namaujian', array('size' => 15, 'maxlength' => 15)); ?>
       </div>

       <div class="row">
<?php echo $form->label($model, 'kelas'); ?>
<?php echo $form->textField($model, 'kelas'); ?>
       </div>

       <div class="row">
<?php echo $form->label($model, 'jumlahsoal'); ?>
<?php echo $form->textField($model, 'jumlahsoal'); ?>
       </div>

       <div class="view_button">		
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'info', 'buttonType'=>'submit', 'label'=>'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->