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
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>