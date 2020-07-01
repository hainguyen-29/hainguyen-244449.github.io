<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('login.php');
							</script>";
	}else{
		include('../avatar.php');
		$qr = mysqli_query($connection,"SELECT * FROM user WHERE user='$session'");
		$arr_u = mysqli_fetch_assoc($qr);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đổi thông tin</title>
	<link rel="stylesheet" type="text/css" href="../style/style-home.css">
</head>
<body>
	<div class="guest user">

		

		<?php 
			include('main/header.php');
			include('main/menu.php') ?>

		<div class="content if">

			<?php include('main/left.php') ?>

			<div class="content-guest-center">
				<div class="list-sp">
					<div class="info-one-user">
						<h1>Cập nhật thông tin cá nhân</h1>
						<form method="post" enctype="multipart/form-data" action="../submit-form/submit-update-info-user.php">
							<div id="f-ud">
								<div class="one-line-ud">
									<div class="left-ud">
										Tên tài khoản	:
									</div>
									<div class="left-ud">
										<?php echo $arr_u['user'] ?>
									</div>
								</div>

								<div class="one-line-ud">
									<div class="left-ud">
										Mật khẩu :
									</div>
									<div class="left-ud">
										******
									</div>
								</div>
								<div class="one-line-ud">
									<div class="left-ud">
										Số điện thoại :
									</div>
									<div class="left-ud">
										<input type="text" name="phone" value="<?php echo $arr_u['phone'] ?>">
									</div>
								</div>
								<div class="one-line-ud">
									<div class="left-ud">
										Giới tính	:
									</div>
									<div class="left-ud">
										<select name="gender">
											<option selected><?php echo $arr_u['gender'] ?></option>
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
								</div>
								<div class="one-line-ud">
									<div class="left-ud">
										Năm sinh	:
									</div>
									<div class="left-ud">
										<select name="year">
											<option selected><?php echo $arr_u['year'] ?></option>
											<?php for ($i=2020; $i >=1890 ; $i--) { 
										 ?>
											<option value="<?php echo $i ?>"><?php echo $i ?></option>
										<?php } ?>
										</select>	
									</div>
								</div>
								<div class="one-line-ud">
									<div class="left-ud">
										Địa chỉ	:
									</div>
									<div class="left-ud">
										<select name="address">
											<option selected><?php echo $arr_u['address'] ?></option>
											<?php 
											  $add_loai = $arr_u['address'];
												$sql_none = "SELECT * FROM address WHERE address!='$add_loai'";
												$query = mysqli_query($connection,$sql_none);
												while ($row = mysqli_fetch_assoc($query)) {
											 ?>
											<option value="<?php echo $row['address'] ?>"><?php echo $row['address'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="one-line-ud">
									<div class="left-ud">
										Sở thích	:
									</div>
									<div class="left-ud">
										<input type="checkbox" name="hb[]" value="Music">&nbsp;Music&emsp;
										<input type="checkbox" name="hb[]" value="Game">&nbsp;Game
									</div>
								</div>
								<div class="one-line-ud">
									<div class="left-ud">
										Ảnh nhận diện	:
									</div>
									<div class="left-ud">
										<input type="file" name="avatar">	
									</div>
								</div>
								
								<div class="btn-change-ud">
									<button type="submit" name="btn-update">Đồng ý</button>
								</div>
								
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