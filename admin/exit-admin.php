<?php 
	session_start();
	if(isset($_SESSION['user'])){
		session_destroy();
		echo "<script>alert('Đăng xuất thành công!');
								location.replace('../guest/login.php');
			</script>";	
	} else header('location:../guest/login.php');
	
 ?>