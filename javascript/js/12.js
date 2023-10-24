// -----------------
// 함수
// -----------------

// 함수 생성
// 1. 함수 선언식: 호이스팅 영향 받음
function fnc_sum(a, b) {
	return a + b;
}
// 2. 함수 표현식: 호이스팅 영향 안받음 => 위쪽에서 선언해줘야함
let fnc1 = function(a, b) {
	return a + b;
}

// 3. 익명함수: 이름이 없는 함수
let fnc2 = function(a, b) {
	return a + b;
}
// 4. 콜백함수: 다시 호출되는 함수
// 함수 내에서 다른 함수의 값을 받고 싶을때 사용한다.
function fnc_callBack( call ) {
	call();
}

fnc_callBack(function() {
	console.log('익명함수');
});

// Function 생성자 함수
let tt = Function('a', 'b', 'return a + b;');

// 화살표 함수(Arrow Function)
// 파라미터가 없는 경우
let f1 = function() {
	return "f1";
}

let f2 = () => "f2";

// 파라미터가 한개인 경우
let f3 = function(a) {
	return a + '입니다.';
}

let f4 = a =>  a + '입니다.';

// 파라미터가 두개 이상인 경우
let f5 = function(a, b) {
	return a + b;
}

let f6 = (a, b) =>  a + b;

// 함수의 처리가 많을 경우
let f7 = (a, b) => {
	if(a > b) {
		return 'a가 큼';
	} else {
		return 'b가 큼';
	}
}