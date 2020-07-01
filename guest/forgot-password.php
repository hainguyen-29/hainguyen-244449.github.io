
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lấy lại mật khẩu</title>
	<link rel="stylesheet" href="../style/style-form.css">
</head>
<body>
	<div class="form-box">
		<h1>Lấy lại mật khẩu</h1>
		<form class="form-login" method="post" action="../submit-form/submit-forgot-password.php">
			
			<div class="input-box">
				<input type="text" name="user" value="" placeholder="Tên tài khoản" required>
			</div>

			<div class="input-box">
				<input type="text" name="phone" value="" placeholder="Số điện thoại đã đăng ký" required>	
			</div>

			<h2><a href="login.php">Đăng nhập</a></h2>

			<div class="submit">
				<a href="register.php">Tạo tài khoản mới</a>
					<input class="button-login" type="submit" name="sm-forgot-password" value="OK">
			</div>

		</form>
	</div>
</body>
</html>