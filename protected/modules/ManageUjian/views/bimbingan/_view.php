<style>
	.btn-info
	{
		background-image:linear-gradient(to bottom, #02786e, #02786e);
	}
	.view {
		border: 2px solid rgb(163, 163, 163);
		width: 300;
		padding: 10;
		margin-bottom: 25px;
	}
	
	.view_button {
		border-top: 1px solid rgb(95, 95, 95);
		padding-top: 5;		
		text-align: center;
	}
</style>

<div class="view">              

       <b><?php echo CHtml::encode($data->getAttributeLabel('namaujian')); ?>:</b>
       <?php echo CHtml::encode($data->namaujian); ?>
       <br />


       <b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
       <?php echo CHtml::encode($data->kelas); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('jumlahsoal')); ?>:</b>
       <?php echo CHtml::encode($data->jumlahsoal); ?>
       <br />

       <b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
       <?php echo CHtml::encode($data->waktu); ?>
       <br />	
	   <div class="view_button">
			<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'info', 'label'=>'Mulai bimbingan', 'url' => array('Create', 'idujian' => $data->idujian))); ?><br />
		</div>
</div>