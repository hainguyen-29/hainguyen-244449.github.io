<?php  
	include('../database/connection-to-hainguyen.php');
	$id = $_GET['id'];
	$update_status = mysqli_query($connection,"UPDATE `oder` SET `status`=2 WHERE id='$id'");
	if($update_status){
	echo "<script>
					alert('Xác nhận bán thành công!');
					location.replace('../admin/list-cart.php');
				</script>";
	}else echo "<script>alert('Lỗi')</script>";
?>