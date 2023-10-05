<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	$err_msg = $_GET["err_msg"];
	
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>에러 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main>
		<div class="item">
			<div class="error_layout">
				<p> 요청하신 페이지를 찾을 수 없습니다. </p>
				<p>방문하시려는 페이지의 주소가 잘못 입력되었거나, </p>
				<p>페이지의 주소가 변경 혹은 삭제되어 요청하신 페이지를 찾을 수 없습니다. </p>
				<p><?php echo $err_msg ?></p>
				<div class="error_layout2">
					<a class="error_button" href="/mini_board/src/list.php">메인으로 이동</a>
				</div>
	</main>

</body>
</html>