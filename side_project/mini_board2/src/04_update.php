
<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board2/src/");
	define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
	require_once(ROOT."lib/lib_db.php");

	$conn=null;
	$http_method = $_SERVER["REQUEST_METHOD"];
	$arr_err_msg=[];

	try {
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}
		
		if($http_method === "GET") {
			$id = isset($_GET["id"]) ? $_GET["id"] : "";

			if($id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
			}
			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
		} else {

			$id = isset($_POST["id"]) ? $_POST["id"] : "";
			$title = isset($_POST["title"]) ? $_POST["title"] : "";
			$content = isset($_POST["content"]) ? $_POST["content"] : "";

			$conn->beginTransaction();
			if($id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
			}

			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			if($title === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
			}
			if($content === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
			}	
			
			if(count($arr_err_msg) === 0) {
				$arr_param = [
					"id" => $id
					,"title" => $title
					,"content" => $content
				];

				//게시글 수정 처리
				if(!db_update_board2_id($conn, $arr_param)) {
					throw new Exception("DB Error : Update_Boards_id");
				}
				$conn->commit();
				echo "<script> alert('수정 완료');  </script>";
				echo "<script> document.location.href='03_detail.php/?id={$id}'; </script>"; 
				exit;
			}
		}
		// 게시글 데이터 조회
		$arr_param = [
			"id" => $id
		];
		$result = db_select_board2_id($conn, $arr_param);
		
		// 게시글 조회 예외 처리
		if($result === FALSE) {
			throw new Exception("DB Error : PDO Select_id");
		} else if (!(count($result) === 1)) {
			throw new Exception("DB Error : PDO Select_id count =".count($result));
		}
		$item = $result[0];
		
	} catch(Exception $e) {
		if ($http_method === "POST") {
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
	<title>수정</title>
	<link rel="stylesheet" href="/mini_board2/src/css/common.css">
</head>
<body>
	<form action="/mini_board2/src/04_update.php" method="post">
		<div class="list_container">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="list_container_header"></div>
			<div class="list_container_top mb-10">
				<a href="/mini_board2/src/03_detail.php?id=<?php echo $id;?>">뒤로</a>
				<p class="list_container_top_center">ToDoList</p>
				<button>수정완료</button>
			</div>
			<p class="insert_error">
					<?php $str_err_msg = implode('<br>', $arr_err_msg);
						echo $str_err_msg;
					?>
				</p>
				<br>
				<label for="title" class= "list_container_top3 font_size_20">제목</label>
				<br>
				<textarea name="title" id="title" class="insert_title" maxlength="80"><?php echo $item["title"]; ?></textarea>
				<br><br>
				<label for="content" class= "list_container_top3 font_size_20">내용</label>
				<br>
				<textarea name="content" id="content" class="insert_content" maxlength="600"><?php echo $item["content"]; ?></textarea>
			</div>
		</div>
	</form>
	<script src="/mini_board2/src/js/01_list.js"></script>
</body>
</html>