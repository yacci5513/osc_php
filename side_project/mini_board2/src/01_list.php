<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board2/src/");
	require_once(ROOT."lib/lib_db.php");

	$conn = null;
	$recent_list = 50; //최근 게시물 목록 수
	try {
		// ---------
		// DB 접속
		// ---------
		if (!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}

		$arr_param = [
			"recent_list" => $recent_list
		];

		$result = db_select_board2($conn, $arr_param);
		if(!$result) {
			throw new Exception("DB Error : SELECT board2 ERROR");
		}

	} catch (Exception $e) {
		echo $e->getMessage();
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
	<title>리스트 페이지</title>
	<link rel="stylesheet" href="/mini_board2/src/css/common.css">
</head>
<body>
	<div class="list_container">
		<div class="list_container_header"></div>
		<div class="list_container_top">
			<a href="./01_list.php">전체</a>
			<p class="list_container_top_center">ToDoList</p>
			<a href="#">#</a>
		</div>
		<div class="list_container_top2">
			<a class="list_container_top2_a" href="#">
				<p class="list_inline list_container_top2_a_p">1<br><span class="list_container_top2_a_span">Jan</span></p>
			</a>
			<a class="list_container_top2_a" href="#">
				<p class="list_inline list_container_top2_a_p">2<br><span class="list_container_top2_a_span">Feb</span></p>
			</a>
			<a class="list_container_top2_a" href="#">
				<p class="list_inline list_container_top2_a_p">3<br><span class="list_container_top2_a_span">Mar</span></p>
			</a>
			<a class="list_container_top2_a" href="#">
				<p class="list_inline list_container_top2_a_p">4<br><span class="list_container_top2_a_span">Apr</span></p>
			</a>
			<a class="list_container_top2_a" href="#">
				<p class="list_inline list_container_top2_a_p">js<br><span class="list_container_top2_a_span">May</span></p>
			</a>
		</div>
		<br><br>
		<p class= "list_container_top3 font_size_20">최근 게시물 (<?php echo $recent_list; ?>개)</p>
		<div class="list_container_middle">
			<?php
				foreach ($result as $item) {
			?>
			<div class="list_container_middle_list">
				<div class="list_container_middle_list_left float_left font_size_25">
					<?php echo $item["id"]; ?>
				</div>
				<div class="list_container_middle_list_center float_left">
					<p class="list_title"><?php echo $item["title"]; ?></p>
					<span class="list_date"><?php echo $item["create_at"]; ?></span>
				</div>
				<a class="list_container_middle_list_right float_right font_size_20" href="/mini_board2/src/03_detail.php/?id=<?php echo $item["id"]; ?>">
					>
				</a>
			</div>
			<?php
				}
			?>
		</div>
		<a class="list_container_bottom" href="./02_insert.php">+</a>
	</div>
	<script src="./js/01_list.js"></script>
</body>
</html>