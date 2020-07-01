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
	<title>Tạo tài khoản</title>
	<link rel="stylesheet" href="../style/style-form.css">
</head>
<body>
	<div class="form-box" id="form-register">
		<h1>Đăng ký tài khoản</h1>
		<form class="form-login" method="POST" action="../submit-form/submit-register.php">

			<div class="input-box">
				<input type="text" name="user" placeholder="Tên tài khoản" required>
			</div>

			<div class="input-box">
				<input type="text" name="password" placeholder="Mật khẩu" required>	
			</div>

			<div class="input-box">
					<input type="text" name="phone" placeholder="Số điện thoại" required>
			</div>
			<div class="line-text">
				Năm sinh:
						<select name="year" class="year" required>
							<option selected>Chọn</option>
							<?php 
								for ($i=1910; $i<=2020; $i++) { 
							echo "<option value=".$i.">".$i."</option>";							
						} ?>
						</select>
			</div>
			<div class="line-text">
				Địa chỉ:
						<select name="address">
							<option selected>Chọn</option>
							<?php 
								include('../database/connection-to-hainguyen.php');
								$query = mysqli_query($connection,"SELECT * FROM address");
								while ($row = mysqli_fetch_assoc($query)) {
							 ?>
							<option value="<?php echo $row['address'] ?>"><?php echo $row['address'] ?></option>
							<?php } ?>
						</select>
			</div>
			<div class="line-text">
				Giới tính: 
						<font class="two"><input type="radio" name="gender" value="Nam" required><font id="text">Nam</font>&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="Nữ" required><font id="text">Nữ</font></font>
			</div>
			<div class="line-text">
				Sở thích:
						<font class="two">&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="Music"><font id="text">Music</font>
						&nbsp;<input type="checkbox" name="hobby[]" value="Game"><font id="text">Game</font></font>
			</div>

			<h2><a href="forgot-password.php">Bạn quên mật khẩu?</a></h2>

			<div class="submit">
				<a href="login.php">Đăng nhập</a>
					<input class="button-login" type="submit" name="sm-register" value="Đăng ký">
			</div>

		</form>
	</div>
</body>
</html>
<?php	}
	// }else echo "<script>alert('Đã đăng nhập rồi vô đây làm gì');
	// 								location.replace('load-info-user.php');
	// 			</script>";
 ?>