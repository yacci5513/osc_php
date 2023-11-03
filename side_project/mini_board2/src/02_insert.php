<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board2/src/");
	require_once(ROOT."lib/lib_db.php");
	define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
	
	$arr_err_msg=[];
	$conn=null;
	$title="";
	$content="";
	//POST로 request가 왔을 때 처리
	$http_method = $_SERVER["REQUEST_METHOD"];
	if($http_method === "POST") {
		try {
			$title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
			$content = isset($_POST["content"]) ? trim($_POST["content"]) : "";

			if($title === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
			}
			if($content === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
			}
			if (count($arr_err_msg) ===0) {
				if (!db_conn($conn)) {
					throw new Exception( "DB Error : PDO instance");
				}
				$conn->beginTransaction();

				$arr_post=$_POST;
				//insert
				if(!db_insert_board2($conn, $arr_post)) {
					throw new Exception("DB Error : INSERT boards");
				}
				

				$conn->commit();
				header("Location: 01_list.php");
				exit;
			}

		} catch (Exception $e) {
			echo $e->getMessage();
			if($conn !== NULL) {
				$conn->rollBack();
			}
			exit;
		} finally {
			//DB파기
			db_destroy_conn($conn);
		}
	}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>삽입 페이지</title>
	<link rel="stylesheet" href="/mini_board2/src/css/common.css">
</head>
<body>
	<form action="./02_insert.php" method="post">
		<div class="list_container">
			<div class="list_container_header"></div>
			<div class="list_container_top">
				<a href="./01_list.php">전체</a>
				<p class="list_container_top_center">ToDoList</p>
				<button>확인</button>
			</div>
			<p class="insert_error">
				<?php $str_err_msg = implode('<br>', $arr_err_msg);
					echo $str_err_msg;
				?>
			</p>
			<br>
			<label for="title" class= "list_container_top3 font_size_20">제목</label>
			<br>
			<textarea name="title" id="title" class="insert_title" maxlength="80" placeholder="제목을 입력해주세요"><?php echo $title; ?></textarea>
			<br><br>
			<label for="content" class= "list_container_top3 font_size_20">내용</label>
			<br>
			<textarea name="content" id="content" class="insert_content" maxlength="600" placeholder="내용을 입력해주세요"><?php echo $content; ?></textarea>
		</div>
	</form>

	<script src="/mini_board2/src/js/01_list.js"></script>
</body>
</html>