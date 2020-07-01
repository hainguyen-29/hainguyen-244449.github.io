<?php 
	session_start();
	include('../model/md-cart.php');
	$array_u = select('user','user',$_SESSION['user']);
	$insert_cart = insert($array_u['id'],$_GET['id']);
	if($insert_cart) echo "<script>alert('Thêm vào giỏ thành công!');
																 location.replace('../guest/cart.php')			
												</script>";
	else echo "<script>alert('Lỗi hệ thống!');
																 location.replace('../info.php')			
												</script>";
?>