<?php
// 인덱스 배열
/* $arr = array(0, 'a', 2); //멀티 타입 배열
$arr2 = [0, "a", 2]
$arr = ["배열", $arr[1], $arr2[1]];
var_dump($arr); */
//연상배열
/*$arr4 = ["name" => "cat", 
"age" => 3
,"gender" => "여자"];

echo $arr4["name"];*/
//다차원 배열
/*$arr5 = [
    [11, 12, 13]
    ,[21, 22, 23]
    ,[31, 32, 33]
];

var_dump($arr5[1][1]);*/
$arr6 = [
    "msg" => "OK"
    ,"info" => [
        "name" => "묘짱"
        ,"age" =>23
    ]
    ];

    var_dump($arr6["msg"]);
?>