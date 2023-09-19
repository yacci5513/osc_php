<?php
//    try {
//        echo "Try 실행";
//        throw new Exception("강제 예외 발생");
//        echo "Try 종료";
//    }
//    catch(Throwable $e) { //모든 에러를 잡아줄수 있다 php7버젼 이상
//        echo "catch 실행";
//    }
//    finally {
//        echo "finally 실행";
//    }

	try {
		echo "Try 실행";
		throw new Exception("강제 예외 발생");
		echo "Try 종료";
	}
	catch(Exception $e) { //php 7버젼 이하에서도 가능
		echo "catch 실행";
	}
	finally {
		echo "finally 실행";
	}
?>