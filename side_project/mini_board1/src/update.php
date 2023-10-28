<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
	require_once(ROOT."lib/lib_db.php");

	$conn=null;
	$http_method = $_SERVER["REQUEST_METHOD"];
	$arr_err_msg=[];

	try {
		// ---------
		// DB 접속
		// ---------
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}
		
		if($http_method === "GET") {
			// GET method의 경우
			// 게시글 데이터 조회를 위한 파라미터 셋팅
			$b_id = isset($_GET["b_id"]) ? $_GET["b_id"] : "";
			$page_num = isset($_GET["page"]) ? $_GET["page"] : "";

			if($b_id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "b_id");
			}
			if($page_num === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page_num");
			}
			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
		} else {
			// POST method의 경우

			$b_id = isset($_POST["b_id"]) ? $_POST["b_id"] : "";
			$page_num = isset($_POST["page"]) ? $_POST["page"] : "";
			$b_title = isset($_POST["b_title"]) ? $_POST["b_title"] : "";
			$b_content = isset($_POST["b_content"]) ? $_POST["b_content"] : "";

			$conn->beginTransaction();
			if($b_id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "b_id");
			}
			if($page_num === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
			}

			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
			if($b_title === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
			}
			if($b_content === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
			}	
			if(count($arr_err_msg) === 0) {

				// if(count($arr_err_msg) >= 1) {
				// 	throw new Exception(implode("<br>", $arr_err_msg));
				// }
				
				//게시글 수정을 위한 파라미터 셋팅
				$arr_param = [
					"b_id" => $b_id
					,"b_title" => $_POST["b_title"]
					,"b_content" => $_POST["b_content"]
				];

				//게시글 수정 처리
				if(!db_update_boards_id($conn, $arr_param)) {
					throw new Exception("DB Error : Update_Boards_id");
				}
				$conn->commit();
				// echo "<script> alert('수정 성공');  </script>";
				// echo "<script> document.location.href='detail.php/?b_id={$b_id}&page={$page_num}'; </script>"; 
				// exit;
				
				header("Location: /mini_board/src/detail.php/?b_id={$b_id}&page={$page_num}");
				exit;
			}
		}
		// 게시글 데이터 조회
		$arr_param = [
			"b_id" => $b_id
		];
		$result = db_select_boards_id($conn, $arr_param);
		
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
		// echo $e->getMessage(); 예외발생 메세지 출력 //v002del
		header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}");
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>수정 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<div class="item">
		<?php
			foreach($arr_err_msg as $val) {
		?>
				<p><?php echo $val ?></p>
		<?php
			}
		?>
		<form action="/mini_board/src/update.php" method="post">
			<table class="member_layout">
				<colgroup>
					<col width= "20%">
					<col width= "80%">
				</colgroup>
					<input type="hidden" name="b_id" value="<?php echo $b_id ?>">
					<input type="hidden" name="page" value="<?php echo $page_num ?>">
					<tbody class="member_tbody">
						<tr height="10%">
							<th class="bgc_f1f2fa border_black">번호</th>
							<td><?php echo $item['b_id']?></td>
						</tr>
						<tr height="10%">
							<th class="bgc_f1f2fa border_black">제목</th>
							<td><input type="text" name="b_title" value="<?php echo $item["b_title"]; ?>"></td>
						</tr>
						<tr height="80%">
							<th class="bgc_f1f2fa border_black">내용</th>
							<td><textarea name="b_content" id="b_content" cols="30" rows="10"><?php echo $item["b_content"]; ?></textarea></td>
						</tr>
					</tbody>
			</table>
			<div class="button_layout">
				<button class="button_item" type="submit">수정확인</button>
				<a class="button_item" href="/mini_board/src/detail.php/?b_id=<?php echo $b_id; ?>&page=<?php echo $page_num; ?>">수정취소</a>
			</div>
		</form>
	</div>
</body>
</html>