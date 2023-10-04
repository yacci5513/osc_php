<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	$b_id = isset($_GET["b_id"]) ? $_GET["b_id"] : $_POST["b_id"];
	$page_num=isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];
	$conn=null;
	$http_method = $_SERVER["REQUEST_METHOD"];
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
		} else {
			// POST method의 경우
			//게시글 수정을 위한 파라미터 셋팅
			$arr_param = [
				"b_id" => $b_id
				,"b_title" => $_POST["b_title"]
				,"b_content" => $_POST["b_content"]
			];
			
			//게시글 수정 처리
			$conn->beginTransaction();
			if(!db_update_boards_id($conn, $arr_param)) {
				throw new Exception("DB Error : Update_Boards_id");
			}
			$conn->commit();
			echo "<script> alert('수정 성공');  </script>";
			echo "<script> document.location.href='detail.php/?b_id={$b_id}&page={$page_num}'; </script>"; 
			exit;
			
			// header("Location: detail.php/?b_id={$b_id}&page={$page_num}");
			// exit;
		}
	} catch(Exception $e) {
		if ($http_method === "POST") {
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
	<title>수정 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<table class="member_layout">
		<colgroup>
			<col width= "20%">
			<col width= "80%">
		</colgroup>
		<form action="/mini_board/src/update.php" method="post">
			<input type="hidden" name="b_id" value="<?php echo $b_id ?>">
			<input type="hidden" name="page" value="<?php echo $page_num ?>">
			<tbody class="member_tbody">
				<tr height="10%">
					<th class="bgc_f1f2fa border_black">번호</th>
					<td><?php echo $item['b_id']?></td>
				</tr>
				<tr height="10%">
					<th class="bgc_f1f2fa border_black">제목</th>
					<td><input type="text" name="b_title" value="<?php echo $item["b_title"] ?>"></td>
				</tr>
				<tr height="70%">
					<th class="bgc_f1f2fa border_black">내용</th>
					<td><textarea name="b_content" id="b_content" cols="30" rows="10"><?php echo $item["b_content"] ?></textarea></td>
				</tr>
				<tr class="border_none" height="10%">
					<td class="border_none"></td>
					<td class="border_none">
						<button class="button_item" type="submit">수정확인</button>
						<a class="button_item" href="/mini_board/src/detail.php/?b_id=<?php echo $b_id; ?>&page=<?php echo $page_num; ?>">수정취소</a>
					</td>
			</tbody>
		</form>
	</table>
</body>
</html>