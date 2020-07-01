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
	<title>Giỏ hàng</title>
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
					<h2>Giỏ hàng</h2>

					<div class="an-item" id="title">
						<div class="text stt right">STT</div>
						<div class="text name right">Tên sản phẩm</div>
						<div class="text img right">Hình ảnh</div>
						<div class="text a-money right">Đơn giá</div>
						<div class="text amount right">Số lượng</div>
						<div class="text money right">Thành tiền</div>
						<div class="text update right">Cập nhật</div>
						<div class="text delete">Xóa</div>
					</div>
					
					<?php  
						include('../model/md-cart.php');
						$arr_user = select('user','user',$_SESSION['user']);
						$id_user = $arr_user['id'];
						
						$query_oder = mysqli_query($connection,"SELECT *,oder.id as id_oder 
																												FROM user INNER JOIN oder 
																																	ON user.id=oder.id_user
																												INNER JOIN product 
																																	ON oder.id_product=product.id
																												WHERE user.id=$id_user AND oder.status=0");
						$i=1;
						$sum = 0;
						$total_product = 0;
						$arr_id = array();
						while($arr_cart = mysqli_fetch_assoc($query_oder)){
							$id_oder = $arr_cart['id_oder'];
							
					?>
					<div class="an-item" id="one-row">
						<div class="text a right"><?php echo $i ?></div>
						<div class="text name a right"><?php echo $arr_cart['name'] ?></div>
						<div class="text img a right"><img src="../img/img-product/<?php echo $arr_cart['img'] ?>" width="80" height="80"></div>
						<div class="text a-money a right"><?php echo number_format($arr_cart['money']) ?></div>
						<div class="text amount a right"><input type="text" name="" value="<?php echo $arr_cart['amount'];$total_product+=$arr_cart['amount'] ?>"></div>
						<div class="text money a right"><?php 
																		$total = $arr_cart['money']*$arr_cart['amount']; 
																		echo number_format($total); 
																		$sum+=$total; ?>
						</div>
						<div class="text update a right"><div><a href="#">Cập nhật</a></div></div>
						<div class="text delete a"><div><a href="../submit-form/delete-cart.php?id=<?php echo $id_oder ?>">Xóa</a></div></div>
					</div>
				<?php $i++;
						array_push($arr_id,$arr_cart['id_oder']);
				 } 
				 		
				 ?>
					<div class="an-item total" id="title">
						<div class="text stt right"><b>Tổng số tiền</b></div>
						<div class="text img right"><?php echo number_format($sum) ?> đồng</div>
						<div class="text money right"><b>Số lượng</b></div>
						<div class="text amount"><?php echo $total_product ?></div>
						
						<div class="text buy"><div><a href="../submit-form/submit-buy.php?id=
							<?php 
								$str = "";
								foreach ($arr_id as $key => $value) {
				 				$str .= $value."-";
				 			}echo chop($str,'-') ?>
				 		"><img src="../img/icon/muahang.JPG" width="200" height="50"></a></div></div>
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