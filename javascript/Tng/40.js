// 1(하) 버튼을 클릭시 아래 내용의 알레트가 나옵니다.
// "안녕하세요."
// "숨어있는 div를 찾아보세요"
// 2-1(중하) 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
// "두근두근"
// 2-2(상)들어간 상태에서는 알러트가 안나옵니다.
// 3(중하) 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
// ""들켰다!"
// 4(상) 3번의 상태에서 다시 한번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 블랙으로 바뀌어 안보이게 됩니다.
// "다시 숨는다."

const BTN1= document.getElementById("btn1");
const DIV0= document.getElementById("div0");
const DIV1 = document.getElementById("div1");

function getRandom(min, max)
{
	return Math.floor(Math.random() * (max - min + 1) + min) + 'px';
} // div 랜덤 배치

function BTNCLICK () {
	alert("안녕하세요 \n숨어있는 div를 찾아보세요");
	DIV0.style.top = getRandom(0, 700);
	DIV0.style.left = getRandom(0, 1500);
	BTN1.removeEventListener("click", BTNCLICK);
	DIV0.addEventListener("mouseenter", DIVDU);
	DIV1.addEventListener("click", DIVDU1);
} // 버튼 클릭시 div 랜덤 배치 및 클릭 이벤트 삭제 + 두근두근 + 들켰다 이벤트 생성

function DIVDU () {
	alert("두근두근");
}

function DIVDU1 () {
	alert("들켰다!");
	DIV0.removeEventListener("mouseenter", DIVDU);
	DIV1.removeEventListener("click", DIVDU1)
	DIV1.addEventListener("click", DIVDU2);
	DIV1.style.backgroundColor = "beige";
} // 들켰다 실행 및 두근두근 들켰다 이벤트 삭제 + 클릭이벤트 다시숨는다로 변경

function DIVDU2 () {
	alert("다시 숨는다");
	DIV1.removeEventListener("click", DIVDU2);
	DIV0.style.top = getRandom(0, 700);
	DIV0.style.left = getRandom(0, 1500);
	BTN1.addEventListener("click", BTNCLICK);
	DIV0.addEventListener("mouseenter", DIVDU);
	DIV1.addEventListener("click", DIVDU1);
	DIV1.style.backgroundColor = "white";
} // 다시숨는다 실행 및 다시숨는다 이벤트 삭제 + 버튼 이벤트 생성

BTN1.addEventListener("click", BTNCLICK);
// DIV0.addEventListener("mouseenter", DIVDU);
// DIV1.addEventListener("click", DIVDU1);
