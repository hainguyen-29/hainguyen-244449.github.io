<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];
		include('../database/connection-to-hainguyen.php');

		if (isset($_POST['sm-adduser'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];

			if (empty($user) || empty($pass)) {
				echo "<script>alert('Nhập đầy đủ thông tin!')
											location.replace('../admin/add-user.php');
							</script>";
				
			}else{
				$query = "SELECT * FROM user WHERE user='$user'";
				$run = mysqli_query($connection,$query);
				$row = mysqli_num_rows($run);

				if($row == 1){
					echo "<script>alert('Tài khoản đã tồn tại!');
													location.replace('../admin/add-user.php');
									</script>";
				}else{
					$query_add = "INSERT INTO `user`(`user`, `password`) VALUES ('$user','$pass')";
					$run_query_add = mysqli_query($connection, $query_add);

					if($run){
						echo "<script>alert('Thêm mới thành công!');
													location.replace('../admin/add-user.php');
									</script>";
					}
				}
			}
			
		}else echo "<script>
			                        location.replace('../guest/login.php');
					            </script>";
	}

?>