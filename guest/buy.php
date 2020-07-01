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
	<title>Danh sách đơn hàng</title>
	<link rel="stylesheet" type="text/css" href="../style/style-home.css">
	<link rel="stylesheet" type="text/css" href="../style/style-cart.css">
</head>
<body>
	<div class="guest user">


		<?php 
			include('main/header.php');
			include('main/menu.php') ?>

		<div class="content if">

			<?php include('main/left.php') ?>

			<div class="content-guest-center user">
				<div id="main-cart">
					<h2>DANH SÁCH ĐƠN HÀNG</h2>

					<div class="an-item" id="title">
						<div class="text stt right">STT</div>
						<div class="text name right">Tên sản phẩm</div>
						<div class="text img right">Hình ảnh</div>
						<div class="text a-money right">Đơn giá</div>
						<div class="text amount right">Số lượng</div>
						<div class="text money right">Thành tiền</div>
						<div class="text update">Trạng thái</div>
					</div>
					
					<?php  
						include('../model/md-cart.php');
						$arr_user = select('user','user',$_SESSION['user']);
						$id_user = $arr_user['id'];
						$page=1;//khởi tạo trang ban đầu
						$limit=8;//số bản ghi trên 1 trang

						$arrs_list = mysqli_query($connection,"SELECT id FROM oder WHERE status!=0 AND id_user='$id_user'");
						$total_record = mysqli_num_rows($arrs_list);

						$sum=ceil($total_record/$limit);
						//xem trang có vượt giới hạn không:
						if(isset($_GET["page"]))	$page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
						if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
						if($page>$sum) $page=$sum;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
						//tính start (vị trí bản ghi sẽ bắt đầu lấy):
						$start=($page-1)*$limit;
						$query_oder = mysqli_query($connection,"SELECT *,oder.id as id_oder																					FROM user INNER JOIN oder ON user.id=oder.id_user
				INNER JOIN product ON oder.id_product=product.id
				WHERE user.id='$id_user' AND oder.status!=0
				ORDER BY id_oder desc limit $start,$limit");
						$i=1;
						while($arr_cart = mysqli_fetch_assoc($query_oder)){
							
					?>
					<div class="an-item" id="one-row">
						<div class="text a right"><?php echo $i ?></div>
						<div class="text name a right"><?php echo $arr_cart['name'] ?></div>
						<div class="text img a right"><img src="../img/img-product/<?php echo $arr_cart['img'] ?>" width="80" height="80"></div>
						<div class="text a-money a right"><?php echo number_format($arr_cart['money']) ?></div>
						<div class="text amount a right"><input type="text" name="" placeholder="<?php echo $arr_cart['amount'] ?>"></div>
						<div class="text money a right"><?php 
																		$total = $arr_cart['money']*$arr_cart['amount']; 
																		echo number_format($total); 
																						 ?>
						</div>
						<div class="text update a"><?php switch($arr_cart['status']) {
							case 1:
								echo "<i>Đang xử lý</i>";
								break;
							case 2:
								echo "<font color='blue' style='font-weight: bold;'>Thành công</font>";
								break;
							case -2:
								echo "<font color='red' style='font-weight: bold;'>Bị hủy</font>";
								break;
						} ?></div>
					</div>
				<?php $i++; } ?>
					
					<div class="head-page">
						<ul>
							<?php  
								for ($j=1; $j <= $sum ; $j++) { 
							?>
							<li><a href="buy.php?page=<?php echo $j ?>"><?php echo $j ?></a></li>
						<?php } ?>
						</ul>
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