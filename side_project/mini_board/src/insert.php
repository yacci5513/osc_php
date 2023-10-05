<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
	require_once(ROOT."lib/lib_db.php");

	$page_num = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];
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
				if(!db_insert_boards($conn, $arr_post)) {
					throw new Exception("DB Error : INSERT boards");
				}

				$conn->commit();
				//리스트 페이지로 이동 : header()
				header("Location: list.php");
				exit;
			}

		} catch (Exception $e) {
			// echo $e->getMessage(); 예외발생 메세지 출력 //v002del
			if($conn !== NULL) {
				$conn->rollBack();
			}
			header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}");
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
		<div class="item">
			<?php
				foreach($arr_err_msg as $val) {
			?>
					<p><?php echo $val ?></p>
			<?php
				}
			?>
			<form action="/mini_board/src/insert.php" method="post">
				<input type="hidden" name="page" value="<?php echo $page_num ?>">
				<table class="member_layout">
					<colgroup>
						<col width= "20%">
						<col width= "80%">
					</colgroup>
					<tbody>
							<tr height="10%">
								<th class="bgc_f1f2fa">
									<label for="title">제목</label>
								</th>
								<td>
									<input type="text" name="title" id="title" value="<?php echo $title ?>">
								</td>
							</tr>
							<tr height="90%">
								<th class="bgc_f1f2fa">
									<label for="content">내용</label>
								</th>
								<td>
									<textarea name="content" id="content"><?php echo $content ?></textarea>
								</td>
							</tr>
					</tbody>
				</table>
				<div class="button_layout">
					<button class="button_item" type="submit">작성</button>
					<a class="button_item none_txt_dec" href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">취소</a>
				</div>
			</form>
		</div>
	</main>

</body>
</html>