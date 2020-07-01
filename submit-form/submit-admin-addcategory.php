<?php 
	session_start();
	if(!isset($_SESSION['user'])){
			echo "<script>alert('Chưa đăng nhập không vô được đây bạn ơi!!');
											location.replace('../guest/login.php');
							</script>";
	}else{
		$session = $_SESSION['user'];
		include('../database/connection-to-hainguyen.php');

		if (isset($_POST['btn-category'])) {
			$category = $_POST['category'];

			
				$query = "SELECT * FROM category WHERE category='$category'";
				$run = mysqli_query($connection,$query);
				$row = mysqli_num_rows($run);

				if($row == 1){
					echo "<script>alert('Danh mục đã tồn tại!');
													location.replace('../admin/add-category.php');
									</script>";
				}else{
					$query_add = "INSERT INTO `category`(`category`) VALUES ('$category')";
					$run_query_add = mysqli_query($connection, $query_add);

					if($run){
						echo "<script>alert('Thêm mới thành công!');
													location.replace('../admin/add-category.php');
									</script>";
					}
				}
			}else echo "<script>
			                        location.replace('../guest/login.php');
					            </script>";
		}

?>