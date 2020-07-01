<?php 
	session_start();
	$id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chi tiết sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="style/style-home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/css-one-product.css">
</head>
<body>
	<div class="guest" id="home-guest">
	
		<?php include('main/header.php') ?>	
		
		<div class="content" id="content-home">

			<?php include('main/menu-cate.php') ?>
		
			<div class="content-guest-center" id="center-home">
				<div class="list-sp" id="list-sp-home">
					<h1>THÔNG TIN CHI TIẾT SẢN PHẨM </h1>

					<?php 
						$qr_put = mysqli_query($connection,"SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE product.id='$id'");
						$arr_one = mysqli_fetch_assoc($qr_put);
					?>

						<div id="one-sp">
							<div class="img"><img src="img/img-product/<?php echo $arr_one['img'] ?>" width="368" height="460"></div>
							<div id="text">
								<p>Tên sản phẩm: <?php echo $arr_one['name'] ?></p>
								<p>Mã sản phẩm: <?php echo $arr_one['code'] ?></p>
								<p>Loại hàng: <?php echo $arr_one['category'] ?></p>
								<p>Giá tiền: <?php echo number_format($arr_one['money']) ?> đồng</p>
								<p id="buy"><a href="submit-form/submit-oder.php?id=<?php echo $arr_one['id'] ?>">Thêm vào giỏ hàng</a></p>
							</div>
							<div id="description">
								<p>Mô tả:</p><br>
								<p> <?php echo $arr_one['description'] ?></p>
							</div>

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