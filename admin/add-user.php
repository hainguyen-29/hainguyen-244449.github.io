<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		include('../avatar.php');
		if($session == 'admin'){
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang quản trị</title>
	<link rel="stylesheet" href="../style/style-admin.css">
</head>
<body>
	<div class="container" id="body-one-page">
		
		<?php include('header.php') ?>
		
		<div class="fixed-nav">
			<?php include('left.php') ?>
		</div>

		<div class="content" id="one-page">

			<div class="body-content" id="add-user">
				<h2>THÊM MỚI NGƯỜI DÙNG</h2>
				<div class="list">
					<div class="one-record" id="title">
						<div class="text" id="user">Tài khoản</div>
						<div class="text" id="pass">Mật khẩu</div>
					</div>

					<form method="post" action="../submit-form/submit-admin-adduser.php">
						<div class="one-record">
							<div class="text" id="user">
								<input type="text" name="user"></div>
							<div class="text" id="pass">
								<input type="text" name="pass"></div>
							<div class="text" id="edit">
								<button name="sm-adduser" class="sm-addur">Thêm</button></div>
						</div>
					</form>

				</div>
			</div>
		</div>


	</div>
</body>
</html>
<?php 
	}else echo "<script>alert('Chỉ admin được zô thôi nha trẻ con lượn đê!');
                      location.replace('../index.php');
	</script>";
} ?>