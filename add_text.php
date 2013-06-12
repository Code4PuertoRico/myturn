<?php
	$host= getenv('OPENSHIFT_HOMEDIR');	

	$phone = $_POST['phone'];
	$carrier = $_POST['carrier'];
	$turn = $_POST['turn'];
	
   	$file = fopen($host."app-root/repo/php/list.txt", "a+");
	fwrite ($file,"$phone $carrier $turn");
	fwrite($file,"\n");
	fclose($file);
	
	echo "<p> You will be Notified to : $phone </p> ";
?>

