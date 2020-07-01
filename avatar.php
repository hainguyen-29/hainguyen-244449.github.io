<?php 
	$session = $_SESSION['user'];
	include('database/connection-to-hainguyen.php');
	$avt = mysqli_query($connection,"SELECT * FROM user WHERE user='$session'");
	$arr = mysqli_fetch_assoc($avt);
	$img_name = $arr['avatar'];

 ?>