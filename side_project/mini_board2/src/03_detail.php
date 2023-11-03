<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board2/src/");
	require_once(ROOT."lib/lib_db.php");


	$conn=null;

	try {
		if (!isset($_GET["id"]) || $_GET["id"] === "") {
			throw new Exception("Parameter ERROR : No id"); // 강제 예외 발생
		}
		$id = $_GET["id"]; // id 셋팅

		// ---------
		// DB 접속
		// ---------
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}

		// 게시글 데이터 조회
		$arr_param = [
			"id" => $id
		];
		$result = db_select_board2_id($conn, $arr_param);
		
		// 게시글 조회 예외 처리
		// if (!(count($result) === 1)) {
		// 	throw new Exception("DB Error : PDO Select_id count,".count($result));
		// }
		if($result === FALSE) {
			throw new Exception("DB Error : PDO Select_id");
		} else if (!(count($result) === 1)) {
			throw new Exception("DB Error : PDO Select_id count =".count($result));
		}
		$item = $result[0];
	} catch(Exception $e) {
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
			<button>수정하기</button>
		</div>
			<p class= "detail_text_p font_size_20">상세</p>
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