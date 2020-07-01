<?php  
	include('../database/connection-to-hainguyen.php');
	$id = $_GET['id'];
	$query_delete = mysqli_query($connection,"DELETE FROM oder WHERE id='$id'");
	if($query_delete) echo "
	<script>
		alert('Xóa thành công!');
		location.replace('../guest/cart.php');
	</script>";
	else echo "
	<script>
		alert('Lỗi!');
		location.replace('../guest/cart.php');
	</script>";
?>