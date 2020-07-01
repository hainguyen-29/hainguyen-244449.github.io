<div class="content-left" id="left-home">
	<div class="menu-cate">
		<h2>Danh mục</h2>
		<ul>
<?php
include('database/connection-to-hainguyen.php');

$load_cate = mysqli_query($connection,"SELECT * FROM category");
while ($row_cate  = mysqli_fetch_assoc($load_cate)) {
?>
<li><a href="product.php?danhmuc=<?php echo $row_cate['category']; ?>"><?php echo $row_cate['category'] ?></a></li>
<?php } ?>
		</ul>
	</div>
</div>