<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER",ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	$conn = null; // DB connection 변수
	$list_cnt = 5; //한 페이지에 최대 표시 수
	$page_num = 1; // 페이지 번호 초기화

	try{
		// ---------
		// DB 접속
		// ---------
		if (!db_conn($conn)) {
			throw new Exception("DB Error : PDO instance");
		}
		// ---------
		// 페이징 처리
		// ---------
		// 총 게시글 수 검색
		$boards_cnt = db_select_boards_cnt($conn);
		if ($boards_cnt === false){
			throw new Exception("DB Error : select COUNT ERROR");
		}

		// 유저가 보내온 페이지 세팅
		
		$max_page_num = ceil(db_select_boards_cnt($conn) / $list_cnt); // 최대 페이지 수
		if (isset($_GET["page"])) {
			$page_num = (int)$_GET["page"];
		};
		$offset = ($page_num - 1) * $list_cnt; // 오프셋 계산
	
		// 이전 버튼
		$prev_page_num = $page_num - 1;
		if ($prev_page_num === 0) {
			$prev_page_num = 1;
		}
	
		// 다음 버튼
		$next_page_num = $page_num + 1;
		if ($next_page_num > $max_page_num) {
			$next_page_num = $max_page_num;
		}
	
		// DB 조회시 사용할 데이터 배열
		$arr_param = [
			"list_cnt" => $list_cnt
			,"offset" => $offset
		];
		
		$result = db_select_boards_paging($conn, $arr_param);
		if(!$result) {
			throw new Exception("DB Error : SELECT boards");
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main>
		<table class="member">
				<colgroup>
					<col width= "20%">
					<col width= "50%">
					<col width= "30%">
				</colgroup>
				<thead class="member_thead">
					<tr>
						<th>번호</th>
						<th>제목</th>
						<th>작성일자</th>
					</tr>
				</thead>
				<tbody class="member_tbody">
					<?php
						//리스트 생성
						foreach ($result as $item) {
					?>
					<tr>
						<td><?php echo $item["b_id"]; ?></td>
						<td>
							<a href="/mini_board/src/detail.php/?b_id=<?php echo $item["b_id"]; ?>&page=<?php echo $page_num;?>">
								<?php echo $item["b_title"]; ?>
							</a>
						</td>
						<td><?php echo $item["b_create_at"]; ?></td>
					<tr>
					<?php
						}
					?>
				</tbody>
		</table>
		<div class="writing">
				<a href="/mini_board/src/insert.php">글 작성</a>
		</div>
		<section class="section_frame">
			<a class="hovor_bgc" href="/mini_board/src/list.php/?page=<?php echo $prev_page_num; ?>"><<</a>
			<!-- <?php


			for($i = 1; $i <= $max_page_num; $i++) {
				if ($page_num === $i) {
			?>
				<a class="bgc_black" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				} else {
			?>
					<a class="hovor_bgc" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			}
			?> -->

			<?php
			$block_num=(int)ceil($page_num/5); // 블럭 페이지
			$block_first_num=(5*$block_num)-4; // 블럭당 첫번째 값
			$present_num=$block_first_num-1;

			for($i = $block_first_num; $i <= $block_num*5; $i++) {
				$present_num+=1;
				
				if ($i > $max_page_num) {
					break;
				} //max page num 까지만 출력하는 if문
				
				// 현재 페이지에 hovor 주기위해서 다른 클래스 적용
				if ($page_num === $present_num) {
			?>
				<a class="bgc_black" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				} else {
			?>
				<a class="hovor_bgc" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			}
			?>
			
			<a class="hovor_bgc"  href="/mini_board/src/list.php/?page=<?php echo $next_page_num; ?>">>></a>
		</section>
	</main>
</body>
</html>