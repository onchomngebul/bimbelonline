<?php // Yii::app()->bootstrap->register();  ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
       <head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <meta name="language" content="en" />

              <!-- blueprint CSS framework -->
              <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
              <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
              <!--[if lt IE 8]>
              <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
              <![endif]-->

              <!-- Tampilan -->              
              <link rel="stylesheet" type="text/css" href="css/form.css" />
              
              <link rel="stylesheet" type="text/css" href="css/text.css" />
			  <link rel="stylesheet" type="text/css" href="css/style2.css" />
              <link rel="stylesheet" type="text/css" href="css/main2.css" />
              <link rel="stylesheet" type="text/css" href="css/userTool.css" />
              <link rel="stylesheet" type="text/css" href="css/menu.css" />
              <link rel="stylesheet" type="text/css" href="css/smoothness/ui.css" />  
              <!-- End Tampilan -->

              <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
       </head>

       <body>                           
              <!--LOGO-->
              <div id="headerV">
                     <div class="containerHeader">
                            <div id="mainMbMenu">
								<?php 
									if (Yii::app()->user->getLevel() == 5){
										$this->widget('application.extensions.mbmenu.MbMenu',array( 
										'items'=>array(										
											array('label'=>'Home', 'url'=>array('/site/index'), 
											  'items'=>array( 
												array('label' => 'Grafik', 'url' => array('/ManageUser/user/lihatgrafik', 'id' => Yii::app()->user->id)),
												array('label' => 'Data Bimbingan', 'url' => array('/ManageUser/user/listbimb', 'id' => Yii::app()->user->id)),
												),
											),
											array('label'=>'Fitur', 
											  'items'=>array( 
												array('label' => 'Simulasi Ujian', 'url' => array('/ManageUjian/bimbingan')),	
												array('label' => 'Beli Paket Bimbel', 'url' => array('/ManagePembayaran/jenispaket')),
												array('label' => 'Order', 'url' => array('/ManagePembayaran/pembayaran/create')),
											  ), 
											), 
											array('label'=>'Setting', 
											  'items'=>array( 
												array('label' => 'Update Profile', 'url' => array('/ManageUser/user/update', 'id' => Yii::app()->user->id)),
												array('label' => 'Ganti Password (coming soon)'),												
											  ), 
											),
											array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
										),
										));
									}
									elseif (Yii::app()->user->getLevel() == 0){
										$this->widget('application.extensions.mbmenu.MbMenu',array( 
											'items'=>array( 										
												array('label'=>'User', 'url'=>array('/ManageUser/user/admin')),
												array('label'=>'Soal', 'url'=>array('/ManageUjian/ujian/admin'),
												  'items'=>array( 
													array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin')),
													array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin')),
													), 
												),
												array('label'=>'Ujian', 
												  'items'=>array( 
													array('label' => 'Ujian', 'url' => array('/ManageUjian/ujian/admin')),
													array('label' => 'Bimbingan', 'url' => array('/ManageUjian/bimbingan/admin')),													
												  ), 
												), 
												array('label'=>'Pembayaran', 
												  'items'=>array( 
													array('label' => 'Pembayaran', 'url' => array('/ManagePembayaran/pembayaran/admin')),
													array('label' => 'Jenis Paket', 'url' => array('/ManagePembayaran/jenispaket/admin')),
												  ), 
												), 
												array('label'=>'Setting', 
												  'items'=>array( 													
													array('label' => 'Ganti Password (coming soon)'),
													array('label' => 'Register', 'url' => array('/ManageUser/user/create')),
												  ), 
												), 
												array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
											), 
										));
									}
									elseif (Yii::app()->user->getLevel() == 1){
										$this->widget('application.extensions.mbmenu.MbMenu',array( 
										'items'=>array( 										
												array('label'=>'Ujian', 
												  'items'=>array( 
													array('label' => 'Ujian', 'url' => array('/ManageUjian/ujian/admin')),
													array('label' => 'Bimbingan', 'url' => array('/ManageUjian/bimbingan/admin')),													
												  ), 
												), 
												array('label'=>'Soal',
												  'items'=>array( 
													array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin')),
													array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin')),
													), 
												),
												array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
											), 
										));
									}
									elseif (Yii::app()->user->getLevel() == 2){
										$this->widget('application.extensions.mbmenu.MbMenu',array( 
										'items'=>array( 	
												array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin')),
												array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin')),												
												array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
											), 
										));
									}
									elseif (Yii::app()->user->getLevel() == 3){
										$this->widget('application.extensions.mbmenu.MbMenu',array( 
										'items'=>array( 	
												array('label' => 'Pembayaran', 'url' => array('/ManagePembayaran/pembayaran/admin')),
												array('label' => 'Jenis Paket', 'url' => array('/ManagePembayaran/jenispaket/admin')),
												array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
											), 
										));
									};
									?> 
							</div>
                     </div>
              </div>
              <!-- CONTENT START -->
              <div id="contentV" >
                     <div class="containerContent">
                            <?php echo $content; ?>
                            <!-- END CONTENT-->    
                     </div>
              </div>
              <div class="clear"> </div>              
              <!-- FOOTER START -->
              <div id="footerV">
				<div class="containerFooter">
                     <div class="row-top">
						<div class="row-padding">
						  <div class="wrapper">
							<div class="col-1">
							  <h4>Address:</h4>
							  <dl class="address">
								<dt><span>Country:</span>Indonesia</dt>
								<dt><span>City:</span>Jakarta</dd>
								<dt><span>Address:</span>Jl. Telekomunikasi</dd>
								<dt><span>Email:</span><a href="mailto:chochobibimbel@gmail.com">chochobibimbel@gmail.com</a></dd>
							  </dl>
							</div>
							<div class="col-2">
							  <h4>Follow Us:</h4>
							  <ul class="list-services">
								<li class="item-1"><a href="https://www.facebook.com/chochobibimbel">Facebook</a></li>
								<li class="item-2"><a href="https://twitter.com/chochobibimbel">Twitter</a></li>
							  </ul>
							</div>
							<div class="col-3">
							  <div class="indent3"> <strong class="footer-logo"><strong></strong></strong> <strong class="phone"><strong>Phone:</strong> +62-8123-4567-890</strong></div>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="row-bot">
						<div class="aligncenter">
						  <p class="p0">Copyright &copy; <a href="index.php">ChoChobi Bimbel Online</a> All Rights Reserved</p>
						  <!-- {%FOOTER_LINK} -->
						</div>
					  </div>
              </div>
			  </div>
              <!-- FOOTER END -->
       </body>
</html>
