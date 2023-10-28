<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	
	$b_id = "";
	$conn=null;
	$page_num=$_GET["page"];
	try {
		if (!isset($_GET["b_id"]) || $_GET["b_id"] === "") {
			throw new Exception("Parameter ERROR : No id"); // 강제 예외 발생
		}
		$b_id = $_GET["b_id"]; // id 셋팅

		// ---------
		// DB 접속
		// ---------
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}

		// 게시글 데이터 조회
		$arr_param = [
			"b_id" => $b_id
		];
		$result = db_select_boards_id($conn, $arr_param);
		
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
		// echo $e->getMessage(); 예외발생 메세지 출력 //v002del
		header("Location: error.php/?err_msg={$e->getMessage()}");
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
	<title>상세 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<div class="item">
		<table class="member_layout">
			<colgroup>
				<col width= "20%">
				<col width= "80%">
			</colgroup>
			<tbody class="detail_tbody">
				<tr height="10%">
					<th class="bgc_f1f2fa">번호</th>
					<td><?php echo $item['b_id']?></td>
				</tr>
				<tr height="10%">
					<th class="bgc_f1f2fa">제목</th>
					<td><?php echo $item['b_title']?></td>
				</tr>
				<tr height="70%">
					<th class="bgc_f1f2fa">내용</th>
					<td ><?php echo $item['b_content']?></td>
				</tr>
				<tr height="10%">
					<th class="bgc_f1f2fa">작성일자</th>
					<td><?php echo $item['b_create_at']?></td>
				</tr>
			</tbody>
		</table>
		<div class="button_layout">
			<a class="button_item" href="/mini_board/src/update.php/?b_id=<?php echo $b_id;?>&page=<?php echo $page_num; ?>">수정페이지로</a>
			<a class="button_item" href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">뒤로 가기</a>
			<a class="button_item" href="/mini_board/src/delete.php/?b_id=<?php echo $b_id;?>&page=<?php echo $page_num; ?>">삭제</a>
		</div>
	</div>
</body>
</html>