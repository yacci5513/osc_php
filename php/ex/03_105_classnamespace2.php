<?php
// namespace: 클래스를 구분 해주기 위해 설정, 보통은 해당파일의 패스로 작성
namespace up;

class Class1{
    public function __construct(){
    // construct
    echo "first class";
    }
}
namespace down;

class Class1{
    public function __construct(){
   // construct
   echo "second class";

}
}
// namespace를 이용해서 객체를 지정
// $obj_class1 = new \down\Class1();
namespace test;
use \up\Class1;
$obj_class1 = new Class1();

?>
