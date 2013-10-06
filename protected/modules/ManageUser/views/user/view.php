<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->username,
);

$this->menu = array(
    array('label' => 'Update User', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete User', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->username), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?> 
<style>
	.berhasil
	{
		text-align:center;
		float:left;
		margin-left:-300px;
		position:relative;
		background:#bbc0a6;
	}.berhasil span
	{
		font-style:italic
	}
	table.detail-view tr.odd
	{
		background:#e1e9a0
	}
</style>
<div class="berhasil">
<h4>Selamat <span><?php echo $model->username; ?></span>!</br>Kamu telah terdaftar</h4>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'username',
        'kelas',
        'email',
        'tanggalLahir',
        'avatar',
    ),
));
?>
</div>