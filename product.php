<?php 
	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $_GET['danhmuc'] ?></title>
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
					<h1>DANH SÁCH <?php echo mb_strtoupper($_GET['danhmuc']);?></h1>
					<?php 
						include('pagination/head-page-cate.php');
						$run = mysqli_query($connection,"SELECT product.*,category.category FROM product INNER JOIN category ON product.id_category=category.id_category WHERE category.category='$danhmuc' order by product.id desc limit $start,$limit");
						if(isset($_POST['btn-search'])){
							$search = $_POST['search'];
							$qr_search = "SELECT product.*,category.category FROM product INNER JOIN category ON product.id_category=category.id_category WHERE category.category='$danhmuc' AND name like '%$search%' order by product.id desc limit $start,$limit";
							$run = mysqli_query($connection,$qr_search);
						}
						$arr = array();

						while ($row = mysqli_fetch_assoc($run)) {
							
							$arr[] = $row;
						}
						if(empty($arr)){
								echo "Chưa có gì";
						}else{
							foreach ($arr as $key => $value) {
							
					?>
							<div class="info-sp">
								<div class="detail-sp">
									<img src="img/img-product/<?php echo $value['img'] ?>" alt="" class="img" align="bottom">
									<a href="info.php?id=<?php echo $value['id'] ?>"><p><?php echo $value['name'] ?></p></a>
								</div>
								<p id="price">Giá: <?php echo number_format($value['money']) ?>đ</p>
							</div>
				<?php 
							}
						} ?>

				</div>
			</div>

		</div>


		<div class="clear"></div>

		<div class="footer">

			<?php include('main/footer.php') ?>

			<div class="header-page">
				<ul>
					<?php for($i=1;$i<=$sum;$i++){ ?>
					<li><a href="product.php?danhmuc=
						<?php 
							echo $_GET['danhmuc']."&page=".$i;
						 ?>

					"><?php echo $i; ?></a></li>
				    <?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="top-page">
		<a href="#home-guest" title=""><img src="img/icon/top.png" width="30" height="30"></a>
	</div>

</body>
</html>