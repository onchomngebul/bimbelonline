<head>
	<style>
		label {
			display: inline;
			margin-bottom: 5px;
		}
		.onesoal {
			margin-bottom: 5px;
			border-bottom: 1px solid rgb(194, 194, 194);
		}
	</style>
</head>
<?php
/* @var $this UjianController */
/* @var $model Ujian */

$this->breadcrumbs = array(
    'Ujians' => array('index'),
    $model->ujian_idujian,
);

$this->menu = array(
    array('label' => 'List Ujian', 'url' => array('index')),
);
?>

<h3>Anda Sedang Mengikuti Bimbingan </br><?php echo $model->r_ujian->namaujian; ?></h3>

<h2> Waktu anda <?php
       $this->widget('ext.ecountdownaction.ECountdownAction', array(
           'seconds' => $model->r_ujian->waktu * 60, //waktu
           'action' => '{document.getElementById("Submit").click()}', //action code...
               )
       );
       ?> Detik </h2>



<?php
echo CHtml::beginForm($this->createUrl('SubmitJawaban', array(
            'id1' => $model->idbimbingan, 'id2' => $model->ujian_idujian, 'id3' => $model->user_id)));
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'bimbingan-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div id =" soals">
<?php
//       for ($no = 1; $no <= count($model->r_bimbnnsoal); $no++) {
$no = 1;
foreach ($soalss as $data) {
       $this->renderPartial('_formbimb', array('no' => $no, 'form' => $form, 'model' => $model, 'data' => $data));
       $no++;
}
?>
</div>

<?php
//$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
//    'contentSelector' => '#soals', // samakan dengan attribute sebelum foreach
//    'itemSelector' => 'div.onesoal', // sesuaikan dengan attribute pada _view
//    'loadingText' => 'Loading...', // nama loading
//    'donetext' => 'End...', // nama jika habis
//    'pages' => $pages,
//));
?>


<style>
.buttons
{
	margin-left:50%;
}
</style>

<div class="row buttons">
		<style>
			.btn-info
			{
				background-image:linear-gradient(to bottom, #02786e, #02786e);
			}
			
		</style>
       <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','ID' => "Submit",'type'=>'info', 'label'=>'| Submit','icon'=>'pencil')); ?>
       
</div>

<?php $this->endWidget(); ?>
<?php echo CHtml::endForm(); ?>

