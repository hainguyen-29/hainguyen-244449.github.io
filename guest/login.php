<?php 
	session_start();
	if(isset($_SESSION['user'])){
		header('location:../index.php');
	}else{
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Đăng nhập</title>
<link rel="stylesheet" href="../style/style-form.css">
</head>
<body>
<div class="form-box">
<h1>Đăng nhập</h1>
<form class="form-login" method="post" action="../submit-form/submit-login.php">
	
	<div class="input-box">
		<input type="text" name="user" value="" placeholder="Tên tài khoản" required>
	</div>

	<div class="input-box">
		<input type="text" name="password" value="" placeholder="Mật khẩu" required>	
	</div>

	<h2><a href="forgot-password.php">Bạn quên mật khẩu?</a></h2>

	<div class="submit">
		<a href="register.php">Tạo tài khoản mới</a>
			<input class="button-login" type="submit" name="sm-login" value="Đăng nhập">
	</div>

</form>
</div>
</body>
</html>
<?php	}
 ?>
