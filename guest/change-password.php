<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đổi mật khẩu</title>
	<link rel="stylesheet" href="../style/style-form.css">
</head>
<body>
	<div class="form-box" id="change-password">
		<h1 id="title-change">Đổi mật khẩu</h1>
		<form class="form-login" method="post" action="../submit-form/submit-change-password.php">
			
			<div class="input-box">
				<input type="text" name="password" value="" placeholder="Mật khẩu cũ" required>
			</div>

			<div class="input-box">
				<input type="text" name="new_pass" value="" placeholder="Mật khẩu mới" required>	
			</div>

			<div class="input-box">
				<input type="text" name="renew_pass" value="" placeholder="Nhập lại mật khẩu mới" required>	
			</div>


			<div class="submit">
				<a href="load-info-user.php">Quay lại</a>
					<input class="button-login" type="submit" name="sm-change-password" value="OK">
			</div>

		</form>
	</div>
</body>
</html>
<?php } ?>