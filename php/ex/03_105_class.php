<?php
// class는 동종의 객체들이 모여있는 집합을 정의한 것
// 개발자들의 룰 클래스명은 첫자리 대문자 + 카멜로 많이 씀 (파스칼표기법)

	class ClassRoom {
		// 멤버 필드: 멤버 변수와 메소드가 정의되어있는 장소
		// 멤버 변수 : class 내에 있는 변수
		// 접근제어 지시자 : public, private, protected
		public $computer; //클래스 안에서든 밖에서든 접근 가능, 상속 가능
		private $book; // class 내에서 접근 가능
		protected $bag; // class와 자식 class에서 사용 가능

		//메소드(method) : class 내에 있는 함수
		public function classRoomSetValue() {
			$this->computer = "컴퓨터";
			$this->book = "책";
			$this->bag = "가방";
		}

		public function classRoomPrint() {
			$str = $this->computer."\n"
				.$this->book."\n"
				.$this->bag."\n";
			echo $str;
		}
	}

// class instance 생성
$objClassRoom = new ClassRoom();
$objClassRoom->classRoomSetValue();
$objClassRoom->classRoomPrint();

?>