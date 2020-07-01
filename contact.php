<?php 
	session_start();
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Liên hệ</title>
	<link rel="stylesheet" type="text/css" href="style/style-home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="guest" id="home-guest">
	
		<?php include('main/header.php') ?>	
		
		<div class="content" id="content-home">

				<?php include('main/menu-cate.php') ?>
					

			<div class="content-guest-center" id="center-home">
				<div class="list-sp" id="list-sp-home">
					<div class="contact">
						<p>TRANG WEB NÀY THUỘC QUYỀN SỞ HỮU CỦA HAINGUYEN</p><br>
						<p>Mọi thông tin chi tiết vui lòng liên hệ: 0373923766</p><br>
						<p>Hoặc email: id.hainguyen92@gmail.com</p>
					</div>
				</div>
			</div>

		</div>


		<div class="clear"></div>

		<div class="footer">
			<?php include('main/footer.php') ?>
		</div>
	</div>
	<div class="top-page">
		<a href="#home-guest" title=""><img src="img/icon/top.png" width="30" height="30"></a>
	</div>

</body>
</html>