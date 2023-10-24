// -----------------
// 변수 선언 (var, let, const)
// -----------------

// * var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);

// * let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// 의도하지 않은 중복 선언 방지
// let u_name = "홍길동";
// console.log(u_name);
// let u_name = "갑순이";
// console.log(u_name);
// 중복 선언 불가능 - 에러

// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);
// 재할당 가능

// * const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
// const AGE = 19;
// const AGE = 16;
// console.log(AGE);
// 중복 선언 불가능 - 에러
// const AGE = 19;
// AGE = 16;
// console.log(AGE);
// 재할당 불가능 - 에러

// -----------------
// 스코프
// -----------------
// * 전역 스코프
let gender = "M";

// * 함수레벨 스코프
function test() {
	var test_value = "test1";
	if(true) {
		var test_value = "test2";
	}
	console.log(test_value);
}
// test_value의 값은 test2  (함수레벨 스코프이기 때문)

// * 블록레벨 스코프
function test1() {
	let test_value = "test1";
	if(true) {
		let test_value = "test2";
	}
	console.log(test_value);
}
// test_value의 값은 test1  (중복 선언이 아님, 블록레벨 스코프이기 때문)

function test2() {
	let test_value = "test1";
	if(true) {
		test_value = "test2";
	}
	console.log(test_value);
}
// test_value의 값은 test2 (재할당을 해줬기 때문에 값은 test2로 변경된다.)

function test3() {
	let test_value = "test1";
	if(true) {
		let test_value = "test2";
		test_value = "test3";
		console.log(test_value);
	}
	console.log(test_value);
}
// test_value의 값은 test3, test1

// -----------------
// 호이스팅
// -----------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// (인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것


// 예제1
console.log(hvar); // undefined
console.log(hlet);  // Uncaught ReferenceError:
var hvar = "var로 선언";
let hlet = "let으로 선언";
console.log(hvar); // var로 선언
console.log(hlet);  // let으로 선언

// 예제2
console.log(htest()); // htest 함수입니다.
function htest() {
	return "htest 함수입니다.";
}