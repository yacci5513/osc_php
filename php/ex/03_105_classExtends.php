<?php
// 상속 : 부모 클래스의 property를 자식 클래스가 상속받는 것
	class Parents {
		public function __construct(){

		}

		public function print_p(){
			echo "부모 클래스에서 출력";
		}

		public function print_r(){
			echo "부모 클래스에서 출력";
		}
	}

	class Child extends Parents {
// 메서드 오버 라이딩: 부모 클래스에서 정의한 property를 자식클래스에서 재정의
		public function print_p(){
			parant::print_p(); //부모꺼를 쓰고 싶을 때
			echo "자식 클래스에서 출력";
		}
		
		public function __construct(){
			
		}
	}

	$obj_class = new Child();
	$obj_class->print_p();
?>