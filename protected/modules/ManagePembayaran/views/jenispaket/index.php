<?php
/* @var $this JenispaketController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenispakets',
);
$namapaket = 'Free member';

foreach($dataProvider->getData() as $record) {
    if ($record->idjenispaket == Yii::app()->user->getJenispaket())
       $namapaket = $record->namapaket;
  }
  
?>

<h1>Jenispaket</h1>
<h2>Saat ini anda berada pada paket <?php echo  $namapaket.'</br> id: ('.Yii::app()->user->getJenispaket().')'?> </h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

?>
