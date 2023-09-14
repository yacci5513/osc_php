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
		public $now;

		//생성자(construct) :
		// - 클래스를 이용하여 객체를 생성할 때 사용
		// - 생성자를 정의하지 않을때는 디폴트 생성자가 선언 됨
		// - 인스턴스가 만들어 질 때 초기값 등을 지정하는 역할을 한다.
		public function __construct() {
			echo "컨스트럭트 실행";
		}

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
		
		// getter 메소드
		public function getNow() {
			return $this->bag;
		}
		// setter 메소드
		public function setNow() {
			$this->bag = "가방";
		}

		//static : instance생성을 하지 않아도 호출할 수 있습니다.
		public static function static_test() {
			echo "스태틱 메소드";
		}
	}

// class instance 생성
$objClassRoom = new ClassRoom();
// $objClassRoom->classRoomSetValue();
$objClassRoom->setNow();
echo $objClassRoom->getNow();
// ClassRoom::static_test();
?>