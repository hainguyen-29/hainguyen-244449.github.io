<?php if(isset($_SESSION['user'])){
	include('avatar.php'); ?>
		<div class="header-user">
			<div class="menu-login-user">
				<ul>
					<li><a href="guest/load-info-user.php"><img src="img/avatar/<?php echo $img_name ?>" width="30" height="30"></a></li>
					<li><a href="guest/exit.php">Đăng xuất</a></li>
				</ul>
			</div>
			
		</div>
	<?php }else{ ?>
	<div class="menu-login">
			<ul>
				<li><a href="guest/login.php">Đăng nhập</a></li>
				<li><a href="guest/register.php">Đăng ký</a></li>
				<li><a href="guest/forgot-password.php">Quên mật khẩu?</a></li>
			</ul>
		</div>
		
	<?php } ?>
	<div class="menu-home">
			<ul>
				<li id="home"><a href="index.php">TRANG CHỦ</a></li>
				<li><a href="contact.php">LIÊN HỆ</a></li>
				<li><a href="follow-me.php">GIỚI THIỆU</a></li>
				<div class="btn-search">
					<form action="#" method="post">
						<input type="search" name="search" placeholder="Tìm gì đó">
						<button type="submit" name="btn-search"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</ul>
			
		</div>