<?php
	$idnya = $_GET["id"];
	$isi = $_GET["isi"];
	if($idnya==1 || $isi==11 || $isi==12|| $isi==13){
	 include 'submenu1.php';
	}
	if($idnya==2 || $isi==21 || $isi==22|| $isi==23){
	 include 'submenu2.php';
	}
	if($idnya==3 || $isi==31 || $isi==32|| $isi==33){
	 echo "menu3";
	}
?>