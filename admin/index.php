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
	<link rel="stylesheet" type="text/css" href="../style/admin-css-cart.css">
</head>
<body>
	<div class="container">

		<?php include('header.php') ?>
			
		<div class="fixed-nav">
			<?php include('left.php'); ?>
		</div>

		<div class="content">

			<div class="body-content">
				<h2>DANH SÁCH NGƯỜI DÙNG</h2>
				<div class="list">
					<div class="one-record" id="title">
						<div class="text" id="stt">STT</div>
						<div class="text" id="id">ID</div>
						<div class="text" id="user">Tài khoản</div>
						<div class="text" id="pass">Mật khẩu</div>
						<div class="text" id="phone">Số điện thoại</div>
						<div class="text" id="gt">Giới tính</div>
						<div class="text" id="ad">Địa chỉ</div>
					</div>
					<?php
						include('../database/connection-to-hainguyen.php');

						$query = "SELECT * FROM user";
						$run 	 = mysqli_query($connection,$query);
						$arr = array();

						while ($row = mysqli_fetch_assoc($run)) {
							$arr[] = $row;
						}
						$i = 1;

						foreach ($arr as $key => $value) {
							
					 ?>
					<div class="one-record table">
						<div class="text" id="stt"><?php echo $i; $i++ ?></div>
						<div class="text" id="id"><?php echo $value['id']; $id = $value['id'] ?></div>
						<div class="text" id="user"><?php echo $value['user'] ?></div>
						<div class="text" id="pass"><?php echo $value['password'] ?></div>
						<div class="text" id="phone"><?php echo $value['phone'] ?></div>
						<div class="text" id="gt"><?php echo $value['gender'] ?></div>
						<div class="text" id="ad"><?php echo $value['address'] ?></div>
						
						<div class="text" id="delete"><div class="hlink dele"><a href="../submit-form/admin-dele-user.php?id=<?php echo $value['id'] ?>">Xóa</a></div></div>

					</div>
				<?php } ?>
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