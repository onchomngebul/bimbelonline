<?php
	error_reporting(0);
?>

<?php /* @var $this Controller */ ?>
<html lang="en">
  <head><?php Yii::app()->bootstrap->init();  ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/makebooster.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
    <title>Bimbingan Belajar Online</title>
	<style>
		.navbar {
		font-family:Cooper std;
		overflow: visible;
		margin-bottom: 20px;
		margin-right:242
		}.navbar .brand{
		font-family:Cooper std;
		color:#005e56
		}
	</style>
  </head>
  <body>
	<!-----Header----->
	<header>
		<div class="hdr">
			<div class="container">
			<a href="#"><img src="images/guest/bimbel1.png" /></a>
			<div class="profile">
				<div class="prof">
					<ul>
						<li>
							<h3><?php echo Yii::app()->user->name?></h3>
						</li>
						<li>
							<h4>Kelas</h4>
						</li>
					</ul>
				</div>
				<div class="foto">				
					<img src="avatar/<?php echo Yii::app()->user->id?>.JPG"/>
				</div>
			</div>
			</div>
			
		</div>
	</header>
	<!-----End Header----->
	
	<content>
		<div class="menu">
			<div class="container">
				<?php
							$this->widget(
						'bootstrap.widgets.TbNavbar',
						array(
							'type' => null, // null or 'inverse'
							'brand' => 'B',
							'brandUrl' => '#',
							'collapse' => true, // requires bootstrap-responsive.css
							'fixed' => false,
							'items' => array(
								array(
									'class' => 'bootstrap.widgets.TbMenu',
									'items' => array(
					'---',				
										//SISWA
											array('label'=>'Home', 'url'=>array('/site/index'), 
											  'items'=>array( 
												array('label' => 'Grafik', 'url' => array('/ManageUser/user/lihatgrafik', 'id' => Yii::app()->user->id)),
												array('label' => 'Data Bimbingan', 'url' => array('/ManageUser/user/listbimb', 'id' => Yii::app()->user->id)),
												),
												'visible' => Yii::app()->user->getLevel() == 5,
											),
											array('label'=>'Fitur', 
											  'items'=>array( 
												array('label' => 'Simulasi Ujian', 'url' => array('/ManageUjian/bimbingan')),	
												array('label' => 'Beli Paket Bimbel', 'url' => array('/ManagePembayaran/jenispaket')),
												array('label' => 'Order', 'url' => array('/ManagePembayaran/pembayaran/create')),
											  ), 
											  'visible' => Yii::app()->user->getLevel() == 5,
											), 
											
										//ADMIN
											array('label'=>'User', 'url'=>array('/ManageUser/user/admin'), 'visible' => Yii::app()->user->getLevel() == 0,),
											array('label'=>'Soal', 'url'=>array('/ManageUjian/ujian/admin'),
											  'items'=>array( 
												array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin')),
												array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin')),
												), 
												'visible' => Yii::app()->user->getLevel() == 0,
											),
											array('label'=>'Ujian', 
											  'items'=>array( 
												array('label' => 'Ujian', 'url' => array('/ManageUjian/ujian/admin')),
												array('label' => 'Bimbingan', 'url' => array('/ManageUjian/bimbingan/admin')),													
											  ), 
											  'visible' => Yii::app()->user->getLevel() == 0,
											), 
											array('label'=>'Pembayaran', 
											  'items'=>array( 
												array('label' => 'Pembayaran', 'url' => array('/ManagePembayaran/pembayaran/admin')),
												array('label' => 'Jenis Paket', 'url' => array('/ManagePembayaran/jenispaket/admin')),
											  ), 
											  'visible' => Yii::app()->user->getLevel() == 0,
											), 
																						
										//TUKANG UJIAN
											array('label'=>'Ujian', 
											  'items'=>array( 
												array('label' => 'Ujian', 'url' => array('/ManageUjian/ujian/admin')),
												array('label' => 'Bimbingan', 'url' => array('/ManageUjian/bimbingan/admin')),													
											  ), 
											  'visible' => Yii::app()->user->getLevel() == 1,
											), 
											array('label'=>'Soal',
											  'items'=>array( 
												array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin')),
												array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin')),
												), 
												'visible' => Yii::app()->user->getLevel() == 1,
											),
											
										//TUKANG SOAL
											array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin'), 'visible' => Yii::app()->user->getLevel() == 2),
											array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin'), 'visible' => Yii::app()->user->getLevel() == 2),												
											
										//TUKANG UANG
											array('label' => 'Pembayaran', 'url' => array('/ManagePembayaran/pembayaran/admin'), 'visible' => Yii::app()->user->getLevel() == 3),
											array('label' => 'Jenis Paket', 'url' => array('/ManagePembayaran/jenispaket/admin'), 'visible' => Yii::app()->user->getLevel() == 3),
																
									),
								),
								array(
								'class'=>'bootstrap.widgets.TbMenu',
								'htmlOptions'=>array('class'=>'pull-right'),
								'items'=>array(
									'---',
									array('label'=>'Options',
										  'items'=>array( 
											array('label' => 'Update Profil', 'url' => array('/ManageUser/user/update', 'id' => Yii::app()->user->id)),
											array('label' => 'Ganti password', 'url' => array('/ManageUser/user/gantipassword')),
											'---',
											array('label' => 'Logout', 'url' => array('/site/logout')),
											),	
									),              
								),
								),
							),
						)
					);
				?>
			</div>
		</div>
		<div class="container">
			<div class="isi">
				<!---Taro ISI disini--->
				<?php echo $content;?>
			</div>
		</div>
	</content>
	<footer>
		<div class="foot">
			<div class="container">
				<a href="#">Home |</a>
				<a role="button" data-toggle="modal" href="#about"> About | </a>
				<a role="button" data-toggle="modal" href="#contact"> Contact</a>
				<p style="font-family:Cooper std">Copyrights @ 2013 ChoChoBi Co.</p>
			</div>
		</div>
	</footer>
	
	
	<!-- Modal -->
<div id="about" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">About Us</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<div id="contact" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Contact Us</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
  </body>
</html>
