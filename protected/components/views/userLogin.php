<?php if(Yii::app()->user->isGuest) : ?>
 
<?php echo CHtml::beginForm(Yii::app()->homeUrl); ?>
 
<section>
	<div style="float:left;margin-right:5px;">
		<?php echo CHtml::activeLabel($form,'username'); ?>
		<?php echo CHtml::activeTextField($form,'username') ?>
	</div>
	<div style="float:left;">
		<?php echo CHtml::activeLabel($form,'password'); ?>
		<?php echo CHtml::activePasswordField($form,'password') ?>
	</div>
	<div style="float:left;margin-top:50px;margin-left:-62px">
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'info','buttonType'=>'submit', 'label'=>'Log in')); ?>
	</div>	<br style="clear:both;" />
</section>

<section>
	<div style="float:left;margin-right:5px;margin-top:-30">
		<?php echo CHtml::activeCheckBox($form,'rememberMe'); ?>
		<div style="float:left;margin-left:20px;margin-top:-17"><?php echo CHtml::activeLabel($form,'Ingat Saya'); ?></div>
	</div>
	<div style="float:left;margin-left:0">
		<a href="#">Lupa password</a>
	</div>	
</section>		
 
 <section>
	<div style="float:right;margin-right:5px;color:#F42438;">
		<?php echo CHtml::error($form,'password'); ?>
		<?php echo CHtml::error($form,'username'); ?>
	</div>
 </section>
<?php echo CHtml::endForm(); ?>

<?php endif; ?>