<?php
	include('../database/connection-to-hainguyen.php');
	$ar = explode ( '-' , $_GET['id']);
	foreach ($ar as $key => $value) {
		$query_buy_cart = mysqli_query($connection,"UPDATE `oder` SET status=1 WHERE id='$value'");
	}
	echo "<script>
					alert('Mua thành công chờ xác nhận!');
					location.replace('../guest/buy.php');
				</script>";
?>