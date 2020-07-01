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
	<link rel="stylesheet" type="text/css" href="../style/list-cart-head.css">
</head>
<body>
	<div class="container">

		<?php include('header.php') ?>
			
		<div class="fixed-nav">
			<?php include('left.php'); ?>
		</div>

		<div class="content">

			<div class="body-content" id="list-cart">
				<h2>XÉT DUYỆT ĐƠN HÀNG</h2>
		
				<div class="list">

					<div class="one-record" id="title">
						<div class="text right stt">STT</div>
						<div class="text right user">User</div>
						<div class="text right name">Tên sản phẩm</div>
						<div class="text right img">Hình ảnh</div>
						<div class="text right amount">Số lượng</div>
						<div class="text right money">Thành tiền</div>
						<div class="text right confirm">Xác nhận</div>
						<div class="text cancel">Hủy</div>
					</div>

					<?php
						include('../model/md-cart.php');

						$page=1;//khởi tạo trang ban đầu
						$limit=7;//số bản ghi trên 1 trang

						$arrs_list = mysqli_query($connection,"SELECT id FROM oder WHERE status=1");
						$total_record = mysqli_num_rows($arrs_list);

						$sum=ceil($total_record/$limit);
						//xem trang có vượt giới hạn không:
						if(isset($_GET["page"]))	$page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
						if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
						if($page>$sum) $page=$sum;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
						//tính start (vị trí bản ghi sẽ bắt đầu lấy):
						$start=($page-1)*$limit;
						$query_oder = mysqli_query($connection,"SELECT *,oder.id as id_oder																					FROM user INNER JOIN oder ON user.id=oder.id_user
																INNER JOIN product ON oder.id_product=product.id WHERE oder.status=1
																ORDER BY id_oder desc limit $start,$limit");
			// 		$query_oder = mysqli_query($connection,"SELECT *,oder.id as id_oder
			// 												FROM user INNER JOIN oder ON user.id=oder.id_user
			// INNER JOIN product ON oder.id_product=product.id WHERE status=1");
						$i=1;
						while($arr_cart = mysqli_fetch_assoc($query_oder)){
					?>
					<div class="one-record list-record">
						<div class="text top right txt stt"><?php echo $i;$i++; ?></div>
						<div class="text top right txt user"><?php echo $arr_cart['user'] ?></div>
						<div class="text top right txt name"><?php echo $arr_cart['name'] ?></div>
						<div class="text top right img"><img src="../img/img-product/<?php echo $arr_cart['img'] ?>" width="60" height="60"></div>
						<div class="text top right txt amount"><?php echo $arr_cart['amount'] ?></div>
						<div class="text top right txt money"><?php 
																		$total = $arr_cart['money']*$arr_cart['amount']; 
																		echo number_format($total); 
																						 ?></div>
						<div class="text top right confirm"><div class="alink ok"><a href="../submit-form/confirm.php?id=<?php echo $arr_cart['id_oder'] ?>">Xác nhận</a></div></div>
						<div class="text top cancel"><div class="alink no"><a href="../submit-form/cancel.php?id=<?php echo $arr_cart['id_oder'] ?>">Hủy</a></div></div>
					</div>
					<?php } ?>
					
					<div class="head-page">
						<ul>
							<?php for ($j=1; $j <= $sum ; $j++) { 
							 ?>
							<li><a href="list-cart.php?page=<?php echo $j ?>"><?php echo $j ?></a></li>
						<?php } ?>
						</ul>
					</div>

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