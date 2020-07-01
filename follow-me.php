<?php 
	session_start();
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Giới thiệu</title>
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
					<div class="follow-me">
						<p>Bạn thường đặt cho mình một mục tiêu rất cao nhưng lại lười biếng thực hiện hay cố trì hoãn vì một vài lí do nào đó. Đến khi không đạt được mục tiêu của mình, bạn sẽ cảm thấy lo lắng và không vui. Nhưng đôi khi, cần phải thừa nhận rằng chúng ta là người bình thường chứ không phải thánh nhân, nếu thất bại thì làm lại, chứ nếu là thánh nhân thì cần gì làm, cần gì phải cố gắng.<br><br>

						Chấp nhận sự không hoàn hảo của chính mình mà cố gắng là một loại khôn ngoan. Khoan dung với chính mình không phải để nuông chiều bản thân, không thỏa hiệp với cuộc sống bình thường, cũng không phải hạ thấp những đòi hỏi của bản thân, mà là một kiểu hòa giải với chính mình, để bạn bình tâm phân tích nguyên nhân thất bại và làm lại nó một cách hoàn hảo hơn . Khi chúng ta có một số ý kiến tiêu cực về bản thân, hãy coi bản thân mình như một người bạn, hiểu và chấp nhận bản thân để hoàn thiện chính mình</p>
						---yoomon---
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