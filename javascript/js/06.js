// -----------------
// 기본 데이터 타입
// -----------------

// 숫자(number)
let num = 1;

// 문자열(string)
let str = "string";

// 불리언(boolean)
let boo = true;

// null
let nu = null;

// undefined
var und;

// symbol
let symbol_1 = Symbol("symbol");
let symbol_2 = Symbol("symbol");
// 고유한 ID를 가진 데이터 타입
// symbol_1 == symbol_2 은 False로 나온다.

// -----------------
// 객체 타입
// -----------------
// 기본 데이터 타입을 제외한 모든 타입
// Array, Date, Math, Object 등

// Object
let obj = {
	food1: "탕수육"
	,food2: "짜장면"
	,food3: "라조기"
	,eat: function() {
		console.log("먹자");
	}
	,list: {
		list1: "리스트1"
		,list2: "리스트2"
	}
};

// Object
let myself = {
	name: "오성찬"
	,age: "27"
	,gender: "M"
};

//Array
let arr = [1, 2, 3];

