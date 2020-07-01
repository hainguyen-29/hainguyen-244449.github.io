<?php 
	include('../database/connection-to-hainguyen.php');
	if(isset($_POST['sm-register'])){
		$user = $_POST['user'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$year = $_POST['year'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$hobbies = "";

		if(empty($_POST['hobby'])){
								$hobbies			= "None";
		}else{
				$hobby 				= 	$_POST['hobby'];
				foreach ($hobby as $value) {
					$hobbies			=		$value . " - ".$hobbies ;
				}
				$hobbies	=		chop($hobbies, " - ");
		}
		$query_sl = mysqli_query($connection,"SELECT * FROM user WHERE user = '$user'");
		$row_sl = mysqli_num_rows($query_sl);
		if($row_sl == 1){
			echo "<script>alert('Tài khoản đã tồn tại!');location.replace('../guest/register.php')</script>";
		}else{
			$query_is = mysqli_query($connection,"INSERT INTO user(user,password,phone,gender,year,address,hobby) VALUES ('$user','$password','$phone','$gender',$year,'$address','$hobbies')");
			if($query_is){
				echo "<script>alert('Đăng ký thành công! Mời đăng nhập');location.replace('../guest/login.php')</script>";
			}else
			echo "<script>alert('Đăng ký thất bại! Thử lại!');location.replace('../guest/register.php')</script>";
		}
	}
?>