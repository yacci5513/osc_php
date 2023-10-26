// -----------------
// Event
// -----------------

// 인라인 이벤트
// html 참조

// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
	location.href = 'http:\/\/www.google.com'
}

// addEventListener(eventType, function)
// 이벤트 생성
// 1. 팝업창 열기

const BTNDAUM = document.getElementById('btn_daum');
let winOpen;

function popOpen() {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');  
};

BTNDAUM.addEventListener('click', popOpen);
// 이벤트 삭제
// BTNDAUM.removeEventListener('click', popOpen);

// 2. 팝업창 닫기
const BTNCLOSE = document.getElementById('btn_close');

// const popClose = () => 	winOpen.close();
function popClose() {
	winOpen.close();
};

BTNCLOSE.addEventListener('click',popClose);

// BTNCLOSE.removeEventListener('click',popClose);

// 재귀함수와 콜백함수의 차이
// 재귀함수는 자기 자신의 함수를 함수내에서 실행
// 콜백함수는 파라미터로 받아서 함수내에서 파라미터의 함수를 실행

const DIV1 = document.querySelector('.div1');
let aaaaa;
function indiv () {
	DIV1.style.background="red";
	// alert("div에 들어옴");
}

function outdiv () {
	DIV1.style.background="blue";
	// alert("div에서 나감");
}
DIV1.addEventListener("mouseenter", indiv);
DIV1.addEventListener("mouseleave", outdiv);

