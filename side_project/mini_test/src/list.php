<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
	require_once(ROOT."lib_db.php");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=/mini_test/src/common.css>
	<title>리스트 페이지</title>
</head>
<body class="listBody">
	<div class="listHeader">
		<div class="listHeaderLayout">
			<h2 class="listLogo">
				<a href="/mini_test/src/list.php" class="title">mini list</a>
			</h2>
			<ul class="gnb">
				<li>
					<a href="#" class="gnbMenu1">글쓰기</a>
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
					<img src="/mini_test/src/ad.png">
				</a>
				<a href="#">
					<img src="/mini_test/src/ad2.png">
				</a>
				<a href="#">
					<img src="/mini_test/src/ad3.png">
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
		<div class="listMain">
			<div class="MainTitle">
				<h3 class="MainTopText">자유 게시판</h3>
			</div>
			<div class="MainCategory">
				자유게시판만 구현!
			</div>
			<div class="MainTop">
				<a class= "MainWrite" href="/mini_test/src/insert.php">
					<img src="/mini_test/src/write.gif">
				</a>
			</div>
		</div>



		<div class="listinfo"></div>
	</div>
</body>
</html>