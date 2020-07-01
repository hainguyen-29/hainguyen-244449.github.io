<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('login.php');
							</script>";
	}else{
		include('../avatar.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang cá nhân</title>
	<link rel="stylesheet" type="text/css" href="../style/style-home.css">
</head>
<body>
	<div class="guest user">


		<?php 
			include('main/header.php');
			include('main/menu.php') ?>

		<div class="content if">

			<?php include('main/left.php') ?>

			<div class="content-guest-center user">
				<div class="list-sp">
					<div class="info-one-user">
						
						<h1>Thông tin cá nhân</h1>
						<?php 
							include('../database/connection-to-hainguyen.php');
							$query = "SELECT * FROM user WHERE user='$session'";
							$run   = mysqli_query($connection,$query);
							$record = mysqli_fetch_assoc($run);
						 ?>
						<form>
							<div class="one-row">
								<div class="text">Tên tài khoản</div>
								<div class="text"><?php echo $record['user']; ?></div>
							</div>
							<div class="one-row">
								<div class="text">Mật khẩu</div>
								<div class="text"><?php echo "******" ?></div>
							</div>
							<div class="one-row">
								<div class="text">Số điện thoại</div>
								<div class="text"><?php echo $record['phone']; ?></div>
							</div>
							<div class="one-row">
								<div class="text">Giới tính</div>
								<div class="text"><?php echo $record['gender']; ?></div>
							</div>
							<div class="one-row">
								<div class="text">Năm sinh</div>
								<div class="text"><?php echo $record['year']; ?></div>
							</div>
							<div class="one-row">
								<div class="text">Địa chỉ</div>
								<div class="text"><?php echo $record['address']; ?></div>
							</div>
							<div class="one-row">
								<div class="text">Sở thích</div>
								<div class="text"><?php echo $record['hobby']; ?></div>
							</div>
							<div class="one-row">
								<div class="text" id="text-img">Ảnh đại diện</div>
								<div class="text" id="img"><img src="../img/avatar/<?php echo $record['avatar'] ?>" width="80" height="80"></div>
							</div>
							<div class="nav-change">
								<a href="update-info.php">Đổi thông tin</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>

		</div>


		<div class="clear"></div>

		<div class="footer">

			<div class="content-footer">
					<div class="logo-yoomon">
						<img src="../img/logo-footer.png" width="200" height="200">
						
					</div>
					<div class="menu-footer">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<li><a href="#">Giới thiệu</a></li>
							<li><a href="#">Liên hệ</a></li>

						</ul>

						<span style="font-size: 15px;"><p class="line-text">Copyright © HAINGUYEN - Giấy phép MXH số 495/GP-BTTTT cấp ngày 09/02/2020</p>

						<p class="line-text">Cơ quan cấp phép: Bộ Thông tin và Truyền thông</p>

						<p class="line-text">Đơn vị chủ quản: Trường Cao đẳng Nghề Bách Khoa Hà Nội</p>

						<p class="line-text">Địa chỉ trụ sở: 92A Lê Thanh Nghị, P.Bách Khoa, Q.Hai Bà Trưng, TP.Hà Nội</p>

						<p class="line-text">Người chịu trách nhiệm: Nguyễn Văn Hải</p>

						<p class="line-text">Thư điện tử: id.hainguyen92@gmail.com</p></span>
					</div>
					<div class="title-footer">
						<div class="content-title">
							<p>1 sản phẩm của</p> <img src="../img/icon/logo-mon.JPG" width="50" height="50">
						</div>
					</div>
			</div>

		</div>

	</div>
</body>
</html>
<?php } ?>