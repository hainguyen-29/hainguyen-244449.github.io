<?php 
		include('../database/connection-to-hainguyen.php');

		if (isset($_POST['sm-forgot-password'])) {
			$user = $_POST['user'];
			$phone = $_POST['phone'];

			$query = "SELECT * FROM user WHERE user='$user'";
			$run   = mysqli_query($connection,$query);
			$row   = mysqli_num_rows($run);

			if($row == 1){
					$record = mysqli_fetch_assoc($run);

					if($record['phone'] == $phone){
						echo "<script>alert('Mật khẩu của bạn là:"." ".$record['password']."');
													location.replace('../guest/login.php');
									</script>";
					}else echo "<script>alert('Số điện thoại đã đăng ký không đúng!');
															location.replace('../guest/forgot-password.php');
										</script>";
			}else echo "<script>alert('Tài khoản chưa được đăng kí!')
													location.replace('../guest/forgot-password.php');
									</script>";
		}else echo "<script>
                        location.replace('../guest/login.php');
		            </script>";
 ?>