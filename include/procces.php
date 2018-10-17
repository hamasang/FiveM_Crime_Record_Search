<?php
	@session_start();
	$product_name = $_GET['uid'];

	if(!is_numeric($product_name)) {
        echo "서버 접속 실패\n";
        // ... 오류를 적절히 기록
    } else {
		//DB접속 정보
		$DB_HOST="localhost";
		$DB_NAME="vrpfx";  //사용자의 DB이름
		$DB_USER="root";  //사용자의 DB id
		$DB_PASS="";  //사용자의 DB비밀번호
		$DBcon = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$DBcon->query("set names utf8");
		date_default_timezone_set("Asia/Seoul");
		header("Content-Type: text/html; charset=UTF-8");
		
		if(isset($product_name)){
			$sql = "select * from vrp_user_identities join vrp_user_data ON vrp_user_identities.user_id='$product_name' WHERE vrp_user_data.user_id='$product_name' and vrp_user_data.dkey='vRP:police_records';";
			$result = $DBcon->query($sql);
			$row = $result->fetch_object();
			if($row == ""){
				echo "결과가 없습니다.";
			}else{
				echo "이름: ".$row->firstname." ".$row->name;
				echo "<br/>전화번호: ".$row->phone;
				echo "<br/>기록: ".$row->dvalue;
			}
		}
	}
?>