<?php
	error_reporting(0);
?>
<?php // Yii::app()->bootstrap->register();  ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
       <head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <meta name="language" content="en" />

              <!-- blueprint CSS framework -->
              <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
              <!--[if lt IE 8]>
              <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
              <![endif]-->

              <!-- Tampilan -->              
              <link rel="stylesheet" type="text/css" href="css/form.css" />
              <link rel="stylesheet" type="text/css" href="css/reset.css" />
              <link rel="stylesheet" type="text/css" href="css/text.css" />
              <link rel="stylesheet" type="text/css" href="css/main2.css" />
              <link rel="stylesheet" type="text/css" href="css/userTool.css" />
              <link rel="stylesheet" type="text/css" href="css/menu.css" />
              <link rel="stylesheet" type="text/css" href="css/smoothness/ui.css" />  
              <!-- End Tampilan -->

              <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	  
       </head>

       <body >        			
              <!--LOGO-->
              <div id="headerV">
                     <div class="containerHeader">
                            <div class="logo">
                                   <img src='images/book-icon2.png'/>
                            </div>
                            <div id="mainmenuV">
                                   <!-- TABS START --> 
								   
                                <?php 
									if (Yii::app()->user->name != 'mimin'){
										include 'menu.php'; 
								?>         
                                   <!-- TABS END -->   
								  <div class="containerSub">
									   <?php include 'pilihan.php'; ?>
									</div> 
                            </div>
                     </div>
              </div>
              <!-- CONTENT START -->
              <div id="contentV" >
			  <div id="mainMbMenu">
			  <?php $this->widget('application.extensions.mbmenu.MbMenu',array( 
            'items'=>array( 
                array('label'=>'Home', 'url'=>array('/site/index')), 
                array('label'=>'Contact', 'url'=>array('/site/contact'), 
                  'items'=>array( 
                    array('label'=>'sub 1 contact'), 
                    array('label'=>'sub 2 contact'), 
                  ), 
                ), 
                array('label'=>'Test', 
                  'items'=>array( 
                    array('label'=>'Sub 1', 'url'=>array('/site/page','view'=>'sub1')), 
                    array('label'=>'Sub 2', 
                      'items'=>array( 
                        array('label'=>'Sub sub 1', 'url'=>array('/site/page','view'=>'subsub1')), 
                        array('label'=>'Sub sub 2', 'url'=>array('/site/page','view'=>'subsub2')), 
                      ), 
                    ), 
                  ), 
                ), 
            ), 
    )); ?> 
	</div>
                     <div class="containerContent">					 					  					 					 
					 <?php include 'isi.php'; ?>
                     <?php echo $content; ?>
                            <!-- END CONTENT-->    
                     </div>
					<?php 
						}
					 ?>
					 <?php
   $this->widget('zii.widgets.CMenu', array(
	   'items' => array(
		   array('label' => 'Home', 'url' => array('/site/index')),
		   array('label' => 'Siswa', 'url' => array('/ManageSiswa/siswa/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   array('label' => 'Klasifikasi Materi', 'url' => array('/ManageSoal/klasifikasiMateri/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   array('label' => 'Soal', 'url' => array('/ManageSoal/soal/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   array('label' => 'Ujian', 'url' => array('/ManageUjian/ujian/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   array('label' => 'Bimbingan', 'url' => array('/ManageUjian/bimbingan/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   array('label' => 'Pembayaran', 'url' => array('/ManagePembayaran/pembayaran/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   array('label' => 'Jenis Paket', 'url' => array('/ManagePembayaran/jenispaket/admin'), 'visible' => Yii::app()->user->name == 'mimin'),
		   
		   array('label' => 'Simulasi Ujian', 'url' => array('/ManageUjian/bimbingan'), 'visible' => !Yii::app()->user->isGuest),
		   array('label' => 'Beli Paket Bimbel', 'url' => array('/ManagePembayaran/jenispaket'), 'visible' => !Yii::app()->user->isGuest),
		   
		   array('label' => 'Lihat data bimb', 'url' => array('/ManageSiswa/siswa/listbimb', 'id' => Yii::app()->user->id), 'visible' => Yii::app()->user->name != 'mimin'),
		   array('label' => 'Update Profile', 'url' => array('/ManageSiswa/siswa/update', 'id' => Yii::app()->user->id), 'visible' => Yii::app()->user->name != 'mimin'),
		   array('label' => 'Create New Order', 'url' => array('/ManagePembayaran/pembayaran/create'), 'visible' => Yii::app()->user->name != 'mimin'),
		   array('label' => 'Register', 'url' => array('/ManageSiswa/siswa/create'), 'visible' => Yii::app()->user->isGuest),
		   array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
		   array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
	   ),
   ));
   ?>	
              </div>
              <div class="clear"> </div>              
              <!-- FOOTER START -->
              <div id="footerV">
                     <div class="containerFooter">
                            Copyright &copy; <?php echo date('Y'); ?> ChoChoBi Co.<br/>
                            All Rights Reserved.<br/>
                            <?php echo Yii::powered(); ?>
                     </div>
              </div>
              <!-- FOOTER END -->
       </body>
</html>
