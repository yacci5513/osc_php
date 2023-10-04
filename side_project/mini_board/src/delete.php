<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn=null;
	
	$http_method = $_SERVER["REQUEST_METHOD"];

	try {
		// ---------
		// DB 접속
		// ---------
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}
		
		//3. 메소드 체크
		if($http_method === "GET") {
			// 3-1. GET일 경우
			// 3-1-1. 파라미터에서 id 획득
			$b_id = isset($_GET["b_id"]) ? $_GET["b_id"] : "";
			$page_num = isset($_GET["page"]) ? $_GET["page"] : "";
			$arr_err_msg = [];
			if ($b_id === "") {
				$arr_err_msg[] = "Parameter ERROR : ID";
			}
			if ($page_num === "") {
				$arr_err_msg[] = "Parameter ERROR : page";
			}
			if(count($arr_err_msg) >=1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
			
			// 3-1-2. 게시글 정보 획득
			$arr_param = [
				"b_id" => $b_id
			];
			$result = db_select_boards_id($conn, $arr_param);

			// 3-1-3. 예외처리
			if($result === FALSE) {
				throw new Exception("DB Error : Select id");
			} else if (!(count($result) === 1)) {
				throw new Exception("DB Error : PDO Select_id count =".count($result));
			}
			$item = $result[0];

		} else {
			// 3-2. POST일 경우
			//3-2-1.파라미터에서 id 획득
			$b_id = isset($_POST["b_id"]) ? $_POST["b_id"] : "";
			$arr_err_msg = [];
			if ($b_id === "") {
				$arr_err_msg[] = "Parameter ERROR : ID";
			}
			if(count($arr_err_msg) >=1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
			
			//3-2-2 Transection 시작
			$conn->beginTransaction();

			//3-2-3 게시글 정보 삭제
			$arr_param = [
				"b_id" => $b_id
			];
			//3-2-4. 예외처리
			if(!db_delete_boards_id($conn, $arr_param)) {
				throw new Exception("DB Error : Delete Boards id");
			}

			$conn->commit();
			header("Location: list.php");
			exit;
		}

	} catch (Exception $e) {
		// POST일 경우에만 rollback
		if($http_method === "POST") {
			$conn->rollBack();
		}
		echo $e -> getMessage();
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
	<title>삭제 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main>
		<table class="member_layout">
			<colgroup>
				<col width= "20%">
				<col width= "80%">
			</colgroup>
			<caption class= "delete_cap">
				삭제하면 영구적으로 복구할 수 없습니다.
				<br>
				정말로 삭제하시겠습니까?
				<br><br>
			</caption>
			<tr height="10%">
				<th class="bgc_f1f2fa border_black">게시글 번호</th>
				<td><?php echo $item['b_id']?></td>
			</tr>
			<tr height="20%">
				<th class="bgc_f1f2fa border_black">작성일</th>
				<td><?php echo $item['b_create_at']?></td>
			</tr>
			<tr height="60%">
				<th class="bgc_f1f2fa border_black">제목</th>
				<td><?php echo $item['b_title']?></td>
			</tr>
			<tr height="10%">
				<th class="bgc_f1f2fa border_black">내용</th>
				<td><?php echo $item['b_content']?></td>
			</tr>
		</table>
	</main>
	<section>
		<form action="/mini_board/src/delete.php" method="post">
			<div class="button_layout">
				<button class="button_item" type="submit">동의</button>
				<input type="hidden" name="b_id" value="<?php echo $b_id ?>">
				<a class="button_item" href="/mini_board/src/detail.php/?b_id=<?php echo $b_id;?>&page=<?php echo $page_num; ?>">취소</a>
			</div>
		</form>
	</section>
</body>
</html>