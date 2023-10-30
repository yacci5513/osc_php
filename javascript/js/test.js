// 두 수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.
function mySum( a, b ) {
	return a + b;
}

let a = ( a, b ) => a + b;

// 콜백함수
function myCallBack(fnc) {
	fnc();
}

myCallBack(function() {
	console.log('123');
});


// 함수를 3개 만들어주세요
// -1. php를 출력하는 함수
// -2. 504를 출력하는 함수
// -3. 풀스택을 출력하는 함수

// 1번 함수는 3초뒤에 출력
// 2번 함수는 5초뒤에 출력
// 3번 함수는 바로 출력

// function printphp() {
// 	return console.log('php');
// };

// function print504() {
// 	return console.log('504');
// };

// function printfullstack() {
// 	return console.log('fullstack');
// };

// setTimeout( printphp , 3000 );
// setTimeout( print504 , 5000 );
// printfullstack();

// // 현재 시간 구해주세요.
// let now = new Date();
// console.log(now);

// let yyyy =  now.getFullYear();
// let mm = (('0'+ (now.getMonth() + 1)).slice(-2));
// let dd = (('0'+ now.getDate()).slice(-2));
// let hh = (('0'+ now.getHours()).slice(-2));
// let mi = (('0'+ now.getMinutes()).slice(-2));
// let ss = (('0'+ now.getSeconds()).slice(-2));
// console.log(yyyy + '-' + mm + '-' + dd + ' ' + hh + ':' + mi + ':' + ss);

// 버튼을 하나 만들고 클릭하면 네이버로 이동시켜 주세요.
const BTN1 = document.getElementById('btn');
function locationNaver() {
	location.href = 'http:\/\/www.naver.com';
};
BTN1.addEventListener('click',locationNaver);