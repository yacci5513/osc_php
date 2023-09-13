<?php
	mkdir("testdir", 777);

	//파일 열기
	$file = fopen("zz.txt", "a");
	if (!$file) {
		echo "파일 안열림";
	}

	//파일 쓰기
	$f_write = fwrite($file, "짜장면\n");
	//파일 닫기
	fclose($file);
	if (!$file) {
		echo "파일 안닫김";
	}
	//파일 삭제
	unlink ("zz.txt");

	// read 말고 fgets를 더 많이 사용 한다.
	
	?>