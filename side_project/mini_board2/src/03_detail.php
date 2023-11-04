<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board2/src/");
	require_once(ROOT."lib/lib_db.php");

	$http_method = $_SERVER["REQUEST_METHOD"];
	$conn=null;

	try {
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}
		
		if($http_method === "GET") {
			$id = isset($_GET["id"]) ? $_GET["id"] : "";
			$arr_err_msg = [];

			if ($id === "") {
				$arr_err_msg[] = "Parameter ERROR : ID";
			}
			if(count($arr_err_msg) >=1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
			
			$arr_param = [
				"id" => $id
			];
			$result = db_select_board2_id($conn, $arr_param);
			if($result === FALSE) {
				throw new Exception("DB Error : PDO Select_id");
			} else if (!(count($result) === 1)) {
				throw new Exception("DB Error : PDO Select_id count =".count($result));
			}
			$item = $result[0];
		} else {
			$id = isset($_POST["id"]) ? $_POST["id"] : "";
			$arr_err_msg = [];

			if ($id === "") {
				$arr_err_msg[] = "Parameter ERROR : ID";
			}
			if(count($arr_err_msg) >=1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			$conn->beginTransaction();
			$arr_param = [
				"id" => $id
			];
			if(!db_delete_board2_id($conn, $arr_param)) {
				throw new Exception("DB Error : Delete Boards id");
			}
			$conn->commit();
			header("Location: 01_list.php");
			exit;
		}
	} catch (Exception $e) {
		if($http_method === "POST") {
			$conn->rollBack();
		}
		echo $e->getMessage();
		exit;
	} finally {
		db_destroy_conn($conn);
	}
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>상세</title>
	<link rel="stylesheet" href="/mini_board2/src/css/common.css">
</head>
<body>
	<div class="list_container">
		<div class="list_container_header"></div>
		<div class="list_container_top mb-10">
			<a href="/mini_board2/src/01_list.php">전체</a>
			<p class="list_container_top_center">ToDoList</p>
			<a href="/mini_board2/src/04_update.php?id=<?php echo $id;?>">수정하기</a>
		</div>
			<form action="/mini_board2/src/03_detail.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<p class= "detail_text_p font_size_20">상세</p><button class="a_button_bg" onclick="return delete_list()">삭제하기</button>
			</form>
			<div class="detail_list mb-10">
				<div class="list_container_middle_list_left float_left ">
					번호
				</div>
				<div class="detail_list_center float_left flex_text pl-10">
					<?php echo $item['id'];?>
				</div>
			</div>
			<div class="detail_list mb-10">
				<div class="list_container_middle_list_left float_left ">
					제목
				</div>
				<div class="detail_list_center float_left flex_text pl-10">
					<?php echo $item['title'];?>
				</div>
			</div>
			<div class="detail_list1 mb-10">
				<div class="detail_middle_list_left float_left">
					내용
				</div>
				<div class="detail_list_center_contents float_left pl-10">
					<?php echo $item['content']; ?>
				</div>
			</div>
			<div class="detail_list mb-10">
				<div class="list_container_middle_list_left float_left ">
					생성일
				</div>
				<div class="detail_list_center float_left flex_text pl-10">
					<?php echo $item['create_at'];?>
				</div>
			</div>
			<div class="detail_list mb-10">
				<div class="list_container_middle_list_left float_left ">
					수정일
				</div>
				<div class="detail_list_center float_left flex_text pl-10">
					<?php if($item['update_at'] === null) {
						echo "수정사항 없음";
					} else {
						echo $item['update_at'];
					} ?> 
				</div>
			</div>
		</div>
	</div>
	
	<script src="/mini_board2/src/js/01_list.js"></script>
</body>
</html>