<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	//POST로 request가 왔을 때 처리
	$http_method = $_SERVER["REQUEST_METHOD"];
	if($http_method === "POST") {
		try {
			$arr_post=$_POST;
			$conn=null;
			// DB접속
			if (!db_conn($conn)) {
				throw new Exception( "DB Error : PDO instance");
			}
			//insert
			if(!db_insert_boards($conn, $arr_post)) {
				throw new Exception("DB Error : INSERT boards");
			}

			$conn->commit();

			//리스트 페이지로 이동 : header()
			header("Location: list.php");
			exit;
		} catch (Exception $e) {
			echo $e->getMessage();
			$conn->rollback();
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>작성 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<form action="/mini_board/src/insert.php" method="post">
		<label for="title">제목</label>
		<input type="text" name="title" id="title" required>
		<br>
		<label for="content">내용</label>
		<textarea name="content" id="content" cols="30" rows="10" required placeholder="내용을 입력해주세요"></textarea>
		<button type="submit">작성</button>
		<a href="/mini_board/src/list.php">취소</a>
	</form>
</body>
</html>