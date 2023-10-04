<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	$page_num=$_GET["page"];

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
	<main>
		<!-- <form action="/mini_board/src/insert.php" method="post">
		<label for="title">제목</label>
		<input type="text" name="title" id="title" required>
		<br>
		<label for="content">내용</label>
		<textarea name="content" id="content" cols="30" rows="10" required placeholder="내용을 입력해주세요"></textarea>
		<button type="submit">작성</button>
		<a href="/mini_board/src/list.php">취소</a>
		</form> -->
		<table class="member_layout">
			<colgroup>
				<col width= "20%">
				<col width= "80%">
			</colgroup>
			<tbody>
				<form action="/mini_board/src/insert.php" method="post">
					<tr height="10%">
						<th class="bgc_f1f2fa border_black">
							<label for="title">제목</label>
						</th>
						<td>
							<input type="text" name="title" id="title" required>
						</td>
					</tr>
					<tr height="80%">
						<th class="bgc_f1f2fa border_black">
							<label for="content">내용</label>
						</th>
						<td>
							<textarea name="content" id="content" required></textarea>
						</td>
					</tr>
					<tr height="10%">
						<td class="border_none"></td>
						<td class="border_none">
							<button class="button_item" type="submit">작성</button>
							<a class="button_item none_txt_dec" href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">취소</a>
						</td>
					</tr>
				</form>
			</tbody>
		</table>
	</main>

</body>
</html>