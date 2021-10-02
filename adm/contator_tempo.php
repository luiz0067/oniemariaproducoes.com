<?php
	session_start();
	$agora= time();
	$minutos=$agora-$_SESSION["time"];
	$dez_minutos=10*60;
	$restantes=$dez_minutos-$minutos;
	if ($restantes<=0){
		session_destroy();
		echo "00:00";
	}
	else{
		echo date("i:s",$restantes);
	}
?>