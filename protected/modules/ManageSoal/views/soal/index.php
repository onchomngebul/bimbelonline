<?php
/* @var $this SoalController */

$this->breadcrumbs = array(
    'Soal',
);

$this->menu = array(
    array('label' => 'Create New Soal', 'url' => array('create')),
    array('label' => 'Manage Soal', 'url' => array('admin')),
);

?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
//$this->widget('zii.widgets.CListView', array(
//    'dataProvider' => $dataProvider,
//    'itemView' => '_view',
//));
?>

<div id="posts">
    <?php foreach($dataProvider as $data): ?>
        <?php $this->renderPartial('_view',array('data'=>$data)); ?>
       <?php // echo "gantenggg"?>
    <?php endforeach; ?>
</div>
 
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts', // samakan dengan attribute sebelum foreach
    'itemSelector' => 'div.view', // sesuaikan dengan attribute pada _view
    'loadingText' => 'Loading...', // nama loading
    'donetext' => 'End...', // nama jika habis
    'pages' => $pages,
)); ?>