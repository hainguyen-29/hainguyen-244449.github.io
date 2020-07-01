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
	<title>Thêm sản phẩm</title>
	<link rel="stylesheet" href="../style/style-admin.css">
</head>
<body>
	<div class="container">
		
		<?php include('header.php') ?>
			
		
		<div class="fixed-nav">
			<?php include('left.php') ?>
		</div>

		<div class="content">

			<div class="body-content" id="add-product">
				<h2>THÊM MỚI SẢN PHẨM</h2>
				<div class="list">
					<form action="../submit-form/submit-admin-add-product.php" method="post" enctype="multipart/form-data">
							<div class="text-input">

								<input type="text" name="name" placeholder="Tên sản phẩm" required></div>
							<div class="text-input">

								<input type="text" name="code" placeholder="Mã sản phẩm" required></div>
							<div class="text-input" id="select-product">

								Loại hàng:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								<select name="category">
									<option selected>Chọn</option>
									<?php 
										include('../database/connection-to-hainguyen.php');

										$query = "SELECT * FROM category";
										$run 		= mysqli_query($connection,$query);

										while ($row = mysqli_fetch_assoc($run)) {
									 ?>
									<option value="<?php echo $row['id_category'] ?>"><?php echo $row['category'] ?></option>
								<?php } ?>
									
								</select>
							</div>
							<div class="text-input">
								<input type="text" name="monney" placeholder="Giá tiền" required></div>

							<div class="text-input" id="textarea">
								<textarea name="description" cols="40px" rows="3px" placeholder="Mô tả" class="text-description"></textarea></div>

							<div class="text-input" id="upload-image">
								<input type="file" name="img"></div>
								
							<div class="text-input" id="button">
								<button name="sm-product">Thêm mới</button></div>
					</form>
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