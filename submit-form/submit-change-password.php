<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];
		include('../database/connection-to-hainguyen.php');

		if (isset($_POST['sm-change-password'])) {
			$old_pass = $_POST['password'];
			$new_pass = $_POST['new_pass'];
			$renew_pass = $_POST['renew_pass'];

			$query = "SELECT * FROM user WHERE user='$session'";
			$run   = mysqli_query($connection,$query);
			$record = mysqli_fetch_assoc($run);

			if($new_pass == $renew_pass){

					if($old_pass == $record['password']){

						$sql_change_pass = "UPDATE user SET password='$new_pass'";
						$run_change_pass = mysqli_query($connection, $sql_change_pass);

						if($run_change_pass){
							echo "<script> alert('Đổi mật khẩu thành công! Mời đăng nhập lại');
													 location.replace('../guest/exit.php');
									</script>";
						}else echo "<script>alert('Lỗi ở đâu đó!');</script>";
						
					}else echo "<script>alert('Mật khẩu cũ sai rồi! Thử lại đê')
															location.replace('../guest/change-password.php');
											</script>";

			}else echo "<script>alert('Xác nhận lại mật khẩu mới chưa khớp!')
													location.replace('../guest/change-password.php');
								</script>";
		}else echo "<script>
			                        location.replace('../guest/login.php');
					            </script>";
	}
 ?>