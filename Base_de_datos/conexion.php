<?php
	$basededatos='itz';
	$mysqli = new mysqli('localhost','root','',$basededatos);
	if($mysqli->connect_errno){
	echo "error".$mysqli->connect_error;
	
	}else{ 
//	echo "conecto \n";
//	echo "";	
	}
?>
