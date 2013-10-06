<?php
   $this->widget('zii.widgets.CMenu', array(
	   'items' => array(
		   array('label' => 'Lihat Grafik', 'url' => array('/ManageSiswa/siswa/lihatgrafik', 'id' => Yii::app()->user->id), 'visible' => Yii::app()->user->name != 'mimin'),		  
		   array('label' => 'Lihat Data Bimbingan', 'url' => array('/ManageSiswa/siswa/listbimb', 'id' => Yii::app()->user->id), 'visible' => Yii::app()->user->name != 'mimin'),		  
	   ),
   ));
   ?>	