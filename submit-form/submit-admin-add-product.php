<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];
		include('../database/connection-to-hainguyen.php');

		if (isset($_POST['sm-product'])) {
			$name = $_POST['name'];
			$code = $_POST['code'];
			
			$money = $_POST['monney'];
			$description = $_POST['description'];

			$tmp_name = $_FILES['img']['tmp_name'];
      $file_name =$_FILES['img']['name'];
      move_uploaded_file($tmp_name,"../img/img-product/".$file_name);

      $category = $_POST['category'];


			$query = "INSERT INTO `product`(`name`, `code`, `id_category`, `money`, `description`, `img`) VALUES ('$name','$code','$category',$money,'$description','$file_name')";
			$run = mysqli_query($connection,$query);

			if($run){
				echo "<script>alert('Thêm mới thành công!');
												location.replace('../admin/add-product.php');
								</script>";
			}else{
				echo "<script>alert('Thêm mới thất bại!');
												location.replace('../admin/add-product.php');
								</script>";
				}
			}else echo "<script>
			                        location.replace('../guest/login.php');
					            </script>";
		}

?>