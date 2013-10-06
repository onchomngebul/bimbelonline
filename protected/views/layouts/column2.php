<?php /* @var $this Controller */ ?>
<?php if (Yii::app()->user->isGuest)
		$this->beginContent('//layouts/mainGuest'); 
	else
		$this->beginContent('//layouts/main');  ?>

	<?php echo $content; ?>
	
	<!-- content -->
<div id="sidebar">
	<?php if (!Yii::app()->user->isGuest && Yii::app()->user->getLevel() != 5){
	$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
	));
	$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
	));
	$this->endWidget();
	}
	?>
</div>
	<!-- sidebar -->
<?php $this->endContent(); ?>