<?php
/* @var $this SoalController */

$this->breadcrumbs=array(
	'Soal'=>array('/soal'),
	'Delete',
);

$this->menu = array(
    array('label' => 'Create New Soal', 'url' => array('create')),
    array('label' => 'Update Soal', 'url' => array('update')),
    array('label' => 'Delete Soal', 'url' => array('delete')),
    array('label' => 'Masih kosong lahh'),
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
