<?php
	@session_start();
	$product_name = $_GET['uid'];

	if(!is_numeric($product_name)) {
        echo "서버 접속 실패\n";
    } else {
		
		$servername = "localhost";
		$db_name = "vrpfx";
		$username = "root";
		$password = "";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try{
				$stmt = $conn->prepare("select * from vrp_user_identities join vrp_user_data ON vrp_user_identities.user_id=:uid WHERE vrp_user_data.user_id=:uid and vrp_user_data.dkey='vRP:police_records';");
				$stmt->execute(array(
					':uid' => $product_name
				  ));
				$article_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$stmt=null;
				if($conn == ""){
					echo "결과가 없습니다.";
				}else{
					foreach ($article_list as $row => $link) {
						echo "이름: ".$link['firstname']." ".$link['name'];
						echo "<br/>전화번호: ".$link['phone'];
						echo "<br/>기록: ".$link['dvalue'];
					}
				}
			} catch(Exception $i){
				echo "error";
				echo "insert failed: ".$i->getMessage();
			}
		}catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		
	}
?>
