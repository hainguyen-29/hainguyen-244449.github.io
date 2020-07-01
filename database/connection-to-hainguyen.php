<?php 
	$connection	=	mysqli_connect('localhost','root','','hainguyen');
	mysqli_query($connection,"SET CHARACTER SET 'utf8'");
	mysqli_query($connection,"SET SESSION collation_connection ='utf8_unicode_ci'");
 ?>