<?php
		$page=1;//khởi tạo trang ban đầu
		$limit=8;//số bản ghi trên 1 trang
		
		$arrs_list = mysqli_query($connection,"SELECT id FROM oder WHERE status!=0");
		$total_record = mysqli_num_rows($arrs_list);

		$sum=ceil($total_record/$limit);
		
		//xem trang có vượt giới hạn không:
		if(isset($_GET["page"]))	$page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
		if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
		if($page>$sum) $page=$sum;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
		//tính start (vị trí bản ghi sẽ bắt đầu lấy):
		$start=($page-1)*$limit;
		$query_oder = mysqli_query($connection,"SELECT *,oder.id as id_oder
																												FROM user INNER JOIN oder 
																																	ON user.id=oder.id_user
																												INNER JOIN product 
																																	ON oder.id_product=product.id
																												ORDER BY id_oder desc limit $start,$limit
																												WHERE user.id=$id_user AND oder.status!=0");
?>