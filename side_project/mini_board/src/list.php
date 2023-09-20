<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;
	if (!my_db_conn($conn)) {
		echo "DB Error : PDO instance";
		exit;
	}

	$result = db_select_boards_paging($conn);
	if(!$result) {
		echo "DB Error : SELECT boards";
		exit;
	}

	db_destroy_conn($conn);
	
	var_dump($result);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>리스트 페이지</title>
	<link rel="stylesheet" href="./css/common.css">
</head>
<body>
	<header>
		<h2>mini Board</h2>
	</header>
	<main>
		<table>
				<colgroup>
					<col width= "20%">
					<col width= "50%">
					<col width= "30%">
				</colgroup>
				<thead>
					<tr>
						<th>번호</th>
						<th>제목</th>
						<th>작성일자</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>5</td>
						<td>5번게시글</td>
						<td>2023/09/20 14:50</td>
					</tr>
					<tr>
						<td>4</td>
						<td>4번게시글</td>
						<td>2023/09/19 13:50</td>
					</tr>
					<tr>
						<td>3</td>
						<td>3번게시글</td>
						<td>2023/09/17 12:50</td>
					</tr>
					<tr>
						<td>2</td>
						<td>2번게시글</td>
						<td>2023/09/14 10:50</td>
					</tr>
					<tr>
						<td>1</td>
						<td>1번게시글</td>
						<td>2023/09/11 09:50</td>
					</tr>
				</tbody>
		</table>
		<section>
			<a href="#"><<</a>
			<a href="#">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">>></a>
		</section>
	</main>
</body>
</html>