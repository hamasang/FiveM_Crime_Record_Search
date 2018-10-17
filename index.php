<html language="ko">
<head>
	<meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>범죄기록 데이터베이스</title>
	<link href="./cssframework/css/bootstrap.min.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#login").click(function() {
				var action = $("#form1").attr('action');
				var form_data = {
					uid: $("#uid").val(),
				};
				$.ajax({
					type: "GET",
					url: action,
					data: form_data,
					success: function(response) {
						if(response != '') {
							$("#result").html("<p style='color:green;font-weight:bold'>"+response+"</p>");
						}
						else {
							$("#result").html("<p style='color:red'>해당 고유번호의 결과가 없습니다.</p>"+response);	
						}
					}
				});
				return false;
			});
		});
	</script>
</head>
<body>
	<div class="card">
		<div class="card-body">
			<center><h2>전과기록 검색기</h2></center>
		</div>
	</div>
	<div class="center" style="position: absolute;top:50%;width: 100%;">
		<form id="form1" action="./include/procces.php" method="get">		
			<div class="input-group mb-3">
				<input type="number" id="uid" class="form-control" placeholder="고유번호" aria-label="고유번호" aria-describedby="button-addon2">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="number" id="login">입력</button>
				</div>
			</div>
		</form>
		<p id="result"></p>
	</div>
	<footer class="footer" style="position: absolute;bottom: 0;width: 100%;height: 30px;line-height: 30px;background-color: #f5f5f5;">
		<div class="container">
			<span class="text-muted">ⓒ 2018. Hamasang(@cxa9809) all rights reserved.</span>
		</div>
	</footer>
	<script src="./cssframework/js/bootstrap.min.js"></script>
</body>
</html>