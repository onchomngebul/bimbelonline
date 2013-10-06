<?php
	error_reporting(0);
?>
<?php // Yii::app()->bootstrap->register();  ?>
<?php /* @var $this Controller */ ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/form.css" />
    <title>Bimbingan Belajar Online</title>

    <!-- Bootstrap core CSS -->	
    <link href="css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.6.js" ></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	<!--Hide Show Function-->
	<script type="text/javascript">
	function hideshow(which){
		if (!document.getElementById)
			return
		if (which.style.display=="block")
			which.style.display="none"
		else
			which.style.display="block"
	}
	$(document).ready(function(){
	var a = document.URL;
	var b = a.charAt(a.length-1);
	if (!isNaN(b)){
		hideshow(document.getElementById('registerC'));
	}
});
	</script>
  </head>
    
<!-- NAVBAR
================================================== -->
  <body>
	
	<div class="atasbanget">
		<div class="container">
		<!--a href="#"><img src="images/guest/logo.png" class="img-responsive" alt="Responsive image"></a-->
		<a href="#"><img src="images/guest/bimbel.png" class=" img-responsive" alt="Responsive image"></a>
		</div>
		<div class="container">
			<form id="login" method="post">
			<?php				 
				$this->widget('UserLoginWidget',array('visible'=>Yii::app()->user->isGuest)); 		 
			?>	
			</form>
		</div>
	</div>
  
  
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
	

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <!--<li data-target="#myCarousel" data-slide-to="2"></li-->
      </ol>
      <div class="carousel-inner">
        <div class="item active">
         <img src="images/guest/img1.png"/>
          <div class="container">
            <div class="carousel-caption">
              <h1 class="hehe">Manage Klasifikasi Materi dan Bimbingan</h1>
            </div>
          </div>
        </div>
        <div class="item">
         <img src="images/guest/img2.png"/>
          <div class="container">
            <div class="carousel-caption">
              <h1><span class="hehe">Tampilkan Grafik Hasil Ujian</span></h1>
             </div>
          </div>
        </div>
       </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div><!-- /.carousel -->
	<!--Mulai Bimbel -->
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
			  <p><a class="btn daftar btn-default" href="javascript:hideshow(document.getElementById('registerC'))"></a></p>
			</div><!-- /.col-lg-4-->
		</div>
	</div>
	<div id="registerC">
		<div id="registerB">
		</div>
		<div class="register">
			<?php echo $content; ?>
			<a href="javascript:hideshow(document.getElementById('registerC'))">
			<div class="closereg">									
				<h1><div id="closing" >Bimbingan Belajar Online</div></h1>
			</div>
			</a>
		</div>	
	</div>
	<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <div class="img1"></div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
         <div class="img1"></div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="img1"></div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	  
      <!-- FOOTER -->
      <footer class="fo">
        <p>Copyright @ 2013 Chochobi Co.</p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
