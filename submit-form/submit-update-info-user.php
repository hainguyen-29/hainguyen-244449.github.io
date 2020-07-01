<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];
		include('../database/connection-to-hainguyen.php');

				if(isset($_POST['btn-update'])){

					$phone = $_POST['phone'];
					$year = $_POST['year'];
					$address = $_POST['address'];
					$gender = $_POST['gender'];
					$hobbies	= "";

						if($year == "Chọn"){
							$year			= "None";
						}else{
							$year = $_POST['year'];
						}

						if($address == "Chọn"){
							$address			= "None";
						}else{
							$address = $_POST['address'];
						}

						if(empty($_POST['hb'])){
							$hobbies			= "None";
						}else{

							$hobby 				= 	$_POST['hb'];
							foreach ($hobby as $value) {
								$hobbies			=		$value . " - ".$hobbies ;
								}	
							$hobbies	=		chop($hobbies, " - ");
						}

						$tmp_name = $_FILES['avatar']['tmp_name'];
			      $file_name =$_FILES['avatar']['name'];
			      move_uploaded_file($tmp_name,"../img/avatar/".$file_name);

							$query	=	"UPDATE `user` SET `phone`='$phone',`gender`='$gender',`address`='$address',`hobby`='$hobbies',`avatar`='$file_name',`year`=$year WHERE user='$session'";
							$run		=	mysqli_query($connection, $query);

							if ($run) {

								echo "<script>alert('Đổi thông tin thành công!');
															location.replace('../guest/load-info-user.php');
											</script>";

							}else echo "<script>alert('Đổi thông tin thất bại! Kiểm tra lại')
																	location.replace('../guest/update-info.php');
													</script>";
						
					}else echo "<script>
			                        location.replace('../guest/login.php');
					            </script>";
	}
 ?>