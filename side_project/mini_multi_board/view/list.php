<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $this->$titleBoardName; ?></title>
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
	<?php require_once("view/inc/header.php"); ?>
	<br><br><br><br><br><br>
	<div class="text-center ">
		<h1><?php echo $this->titleBoardName; ?></h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modalinsert" >
			<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
		  </svg>
	</div>
	<br><br>

	<main>
		<?php
			foreach($this->arrBoardInfo as $item) {
		?>

			<div class="card">
				<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지 없음">
				<div class="card-body">
				<h5 class="card-title"><?php echo $item['b_title']; ?></h5>
				<p class="card-text"><?php echo mb_strlen($item["b_content"]) >= 10 ? mb_substr($item["b_content"], 0, 10)."...": $item["b_content"]; ?></p>
				<button href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldetail">상세</button>
				</div>
			</div>
		<?php
			}
		?>
	</main>
	
	<!-- Modal -->
	<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">상세</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<p>dddddddddddddddddddddddddddddddd</p>
				<img src="./img/imgfile.png">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalinsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/board/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
					<div class="modal-header">
					<input type="text" class="form-control" name="b_title" placeholder="제목을 입력하세요">
					</div>
					<div class="modal-body">
					<textarea class="form-control" cols="30" rows="10" name="b_content" placeholder="내용을 입력하세요"></textarea>
					<br>
					<input type="file" accept="image/*" name="b_img">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer class="fixed-bottom bg-dark text-center text-light p-3">
		저작권
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>