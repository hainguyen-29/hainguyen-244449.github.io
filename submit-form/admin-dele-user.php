<?php 
 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];

		include('../database/connection-to-hainguyen.php');
		
			$id = $_GET['id'];
			$query_show = "SELECT * FROM user WHERE id=$id";
			$run_query_show = mysqli_query($connection,$query_show);
			$row = mysqli_fetch_assoc($run_query_show);

			
			if($row['user'] != $session){
				$query = "DELETE FROM user WHERE id=$id";
				$run 		= mysqli_query($connection,$query);
				if($run){
					echo "<script>alert('Xóa thành công!');
												location.replace('../admin/admin.php');
								</script>";
				} else echo "<script>
				alert('Người này đã đặt hàng không thể xóa!')
				location.replace('../admin/admin.php');</script>";
				
			}else echo "<script>alert('Không thể xóa admin!');
												location.replace('../admin/admin.php');
								</script>";
		
	}

?>