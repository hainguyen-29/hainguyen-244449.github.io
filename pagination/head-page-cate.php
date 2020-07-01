<?php
		
		$danhmuc = $_GET['danhmuc'];
		$page=1;//khởi tạo trang ban đầu
		$limit=12;//số bản ghi trên 1 trang
		
		$arrs_list = mysqli_query($connection,"SELECT product.*,category.category FROM product INNER JOIN category ON product.id_category=category.id_category WHERE category.category='$danhmuc'");
		$total_record = mysqli_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng sản phẩm theo loại

		$sum=ceil($total_record/$limit);
		
		//xem trang có vượt giới hạn không:
		if(isset($_GET["page"]))
			$page=$_GET["page"];	//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
		if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
		if($page>$sum) $page=$sum;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
		//tính start (vị trí bản ghi sẽ bắt đầu lấy)
		$start=($page-1)*$limit;
		
		
	?>
	