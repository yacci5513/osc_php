<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
	require_once(ROOT."lib/lib_db.php");
	
	$conn = null; // DB connection 변수
	$list_cnt = 10; //한 페이지에 최대 표시 수
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
	<link rel="stylesheet" href="./common.css">
	<title>리스트 페이지</title>
</head>
<body class="listBody">
	<div class="listHeader">
		<div class="listHeaderLayout">
		<h2 class="listLogo">
			<a href="#" class="title">mini list</a>
		</h2>
		<ul class="gnb">
			<li>
				<a href="#" class="gnbMenu1">목록1</a>
			</li>
			<li>
				<a href="#" class="gnbMenu2">목록2</a>
			</li>
			<li>
				<a href="#" class="gnbMenu3">목록3</a>
			</li>
			<li>
				<a href="#" class="gnbMenu4">목록4</a>
			</li>
			<li>
				<a href="#" class="gnbMenu5">목록5</a>
			</li>
			<li>
				<a href="#" class="gnbMenu6">목록6</a>
			</li>
		</ul>
	</div>
	</div>

	<div class="listContainer">
		<div class="listLeftMenu">
			<div class="listBanner">
				<a href="#">
					<img src="/side_project/mini_test/ad.png">
				</a>
				<a href="#">
					<img src="/side_project/mini_test/ad2.png">
				</a>
				<a href="#">
					<img src="/side_project/mini_test/ad3.png">
				</a>
			</div>
			<div class="menuGroup">
				<h3 class="textMenuType1">리스트 소식</h3>
				<div class="menuItems">
					<ul>
						<li class=textMenuType2>
							<a href="#"><span class="hot">소식 게시판</span></a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ모집</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ행사</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ공모전</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="menuGroup">
				<h3 class="textMenuType1">커뮤니티</h3>
				<div class="menuItems">
					<ul>
						<li class=textMenuType2>
							<a href="#"><span class="hot">통합 게시판</span></a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ일반 게시판</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ질문답변 게시판</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ스탭 게시판</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ메모 게시판</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ출석부</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="menuGroup">
				<h3 class="textMenuType1">개발자 공간</h3>
				<div class="menuItems">
					<ul>
						<li class=textMenuType2>
							<a href="#"><span class="hot">개발자 게시판</span></a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ자유 게시판</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ질문과 답변</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴTip & 정보</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ파티모집</a>
						</li>
						<li class=textMenuType3>
							<a href="#">ㄴ개발기</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="listMain"></div>

		<div class="listinfo"></div>
	</div>
</body>
</html>