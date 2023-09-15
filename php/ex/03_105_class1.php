<?php
// class 는 동종의 객체들이 모여있는 집합을 정의한 것

class ClassRoom 
{
    // member fild
    // 
    // 접근 제어 지시자 : public, private
    // 멤버 변수
    public $computer;  //어디든지 접근 가능
    private $book; //class 내에서만 접근 가능
    protected $bag; // class와 나를 상속 받은 자식 class내에서만 접근 가능
    public $now;
    /////////////
    // 생성자(constructor) :
    //          -클래스를 이용하여 객체를 생성할  때 사용
    //          -생성자를 정의 하지 않을때는 디폴트 생성자가 선언 됨
    //          -클래스를 인스턴스 할 떄 자동으로 실행되ㅐ는 메소드

    public function __construct() {
            echo "컨스트럭트 실행";
            $this->now = date("Y-m-d H:i:s");
    }

    // 메소드(method) : class내에 있는 함수
    public function class_room_set_value() {
        $this->computer = "컴퓨터";
        $this->book = "책";
        $this->bag = "가방";

    }
    public function print_value() {
      $str = $this->computer."\n"
         .$this->book."\n"
        .$this->bag;
        echo $str;
    }

    // getter 메소드
    public function get_now() {
        return $this->now;
    }
    // setter 메소드
    public function set_now(){
        $this->now = "9999-01-01 00:00:00";
    }


    // static
    public static function static_test() {
        echo "스태틱 메소드";

    }
}




//  class instance 생성
// $obj_ClassRoom = new ClassRoom();
// $obj_ClassRoom->computer = "test";
// var_dump($obj_ClassRoom->computer);
// $obj_ClassRoom->class_room_set_value();
// $obj_ClassRoom->set_now();
// echo $obj_ClassRoom->now;
// $obj_ClassRoom->print_value();
// 스테틱 사용방법
ClassRoom::static_test();

?>



