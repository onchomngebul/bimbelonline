<?php /* @var $this Controller */ ?>
<?php 
	if (Yii::app()->user->isGuest)
		$this->beginContent('//layouts/mainGuest'); 
	else
		$this->beginContent('//layouts/main'); 
?>
<div>
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>