

<?php
//LOGIN
session_start();
	include('../database/connection-to-hainguyen.php');
	if(isset($_POST['sm-login'])){

		$user 						=			$_POST['user'];
		$password					=			$_POST['password'];
			$sql_check_user		=			"SELECT * FROM user WHERE user='$user'";
			$run_sql_check_user 		=		mysqli_query($connection,$sql_check_user);
			$row							=			mysqli_num_rows($run_sql_check_user);
			if($row == 1){
								
								$arr 		=			mysqli_fetch_assoc($run_sql_check_user);
								$pass 	=			$arr['password'];
								

								if($password == $pass) {
									$_SESSION['user'] = $user;
									if($_SESSION['user'] == 'admin'){
											echo "<script>alert('Đăng nhập thành công!');
																		location.assign('../admin/index.php');
														</script>";
									}else {
											echo "<script>alert('Đăng nhập thành công!');
																		location.assign('../index.php');
														</script>";
																	}
									}else echo "<script>alert('Sai mật khẩu rồi bạn ơi!')
																			location.assign('../guest/login.php')</script>";
			}else echo "<script>alert('Tài khoản chưa được đăng ký!');
													location.assign('../guest/login.php')</script>";
		
	}else echo "<script>
                        location.replace('../guest/login.php');
		            </script>";
 ?>