<?php
	//namespace : 클래스를 구분해주기 위해 설정
	// 클래스명이 같을 경우 구분가능
	// 보통 해당파일일의 경로로 작성한다.
	namespace up;
	class Class1 {
		public $test1;
		public $test2;
		public $test3;
		
		public function __construct(){
			echo "up Class 생성자";
		}
	}

	namespace down;
	class Class1 {
		public $test1;
		public $test2;
		public $test3;
		
		public function __construct(){
			echo "down Class 생성자";
		}
	}

	// $obj_class1= new \up\Class1();
	// $obj_class2= new \down\Class1();

	//use로 사용하는 방법 use부분에 as써서 사용 가능함
	//namespace를 다시 설정해주는 이유는 다른 공간에서 사용해야하기 때문
	namespace test;
	use \up\class1;
	$obj_class1= new Class1();
?>