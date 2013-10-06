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
	<script type="text/javascript" src="js/jquery-1.6.js" ></script>
  </head>
  <body>
	<!-----Header----->
	<header>
		<div class="hdr">
			<div class="container">
			<a href="#"><img src="images/guest/bimbel1.png" /></a>
			</div>
			<div class="container">
				<form class="formlogin" method="post">
				<?php				 
					$this->widget('UserLoginWidget',array('visible'=>Yii::app()->user->isGuest)); 		 
				?>
				</form>
			</div>
		</div>
	</header>
	<!-----End Header----->
	
	<content>
		<div class="menu">
			<div class="container">
				<div class="navbar">
				  <div class="navbar-inner">
					<ul class="nav">
					  <li class="active"><a role="button" data-toggle="modal" href="#">Home</a></li>
					  <li><a role="button" data-toggle="modal" href="#about">About Us</a></li>
					  <li><a role="button" data-toggle="modal" href="#contact">Contact</a></li>
					</ul>
				  </div>
				</div>
			</div>
		</div>
		<div class="sld">
			<div id="myCarousel" class="carousel slide">
			  <!--<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			  </ol>-->
			  <!-- Carousel items -->
			  <div class="carousel-inner">
				<div class="active item"><img src="images/guest/img2.png"/></div>
				<div class="item"><img src="images/guest/img1.png"/></div>
			  </div>
			  <!-- Carousel nav -->
			  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>					
		</div>
		<div class="daftar">
			<div class="container ">
					<?php $this->widget('bootstrap.widgets.TbButton', array(
						'label'=>'Mulai Bimbel',
						'type'=>'primary',
						'size'=>'large', // null, 'large', 'small' or 'mini'
						'htmlOptions'=>array(
							'data-toggle'=>'modal',
							'data-target'=>'#myModal',
						),
					)); 
					?>
			</div>
		</div>
		<div class="iklan">
			<div class="container">
				<ul class="thumbnails">
				  <li class="span3">
					<div class="thumbnail">
					  <img src="images/guest/img1.png" alt="">
					  <h3>Manage Klasifikasi Materi dan Ujian </h3>
					  <p>Dapat mengatur klasifikasi mater dan ujian sesuai yang diinginkan</p>
					</div>
				  </li>
				   <li class="span3">
					<div class="thumbnail">
					  <img src="images/guest/img2.png" alt="">
					  <h3>Grafik Hasil Ujian</h3>
					  <p>Siswa dapat melihat langsung grafik hasil ujian</p>
					</div>
				  </li>
				  <li class="span3">
					<div class="thumbnail">
					  <img src="images/guest/paket.png" alt="">
					  <h3>Tambah Paket Soal</h3>
					  <p>Disediakan paket soal berbayar dan gratis</p>
					</div>
				  </li>
				</ul>
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
	
<!-- Modal About & Contact -->
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

	
	
	
	
	
	<!--Modal Form Register-->
	<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h4>Form Pendaftaran</h4>
		</div>
		 
		<div class="modal-body">
			<?php echo $content; ?>
		</div>
		 
		<div class="modal-footer">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'label'=>'Close',
				'url'=>'#',
				'htmlOptions'=>array('data-dismiss'=>'modal'),
			)); ?>
		</div>
		 
		<?php $this->endWidget(); 
	?>
	<!--END Modal Form Register-->
  </body>
</html>
