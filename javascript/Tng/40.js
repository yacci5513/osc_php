// 1(하) 버튼을 클릭시 아래 내용의 알레트가 나옵니다.
// "안녕하세요."
// "숨어있는 div를 찾아보세요"
const BTN1= document.getElementById("btn1");
function BTNCLICK () {
	alert("안녕하세요 \n숨어있는 div를 찾아보세요");
}
BTN1.addEventListener("click", BTNCLICK);

// 2-1(중하) 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
// "두근두근"
const DIV0= document.getElementById("div0");
function DIVDU () {
	alert("두근두근");
}
DIV0.addEventListener("mouseenter", DIVDU);
// 2-2(상)들어간 상태에서는 알러트가 안나옵니다.
// 3(중하) 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
// ""들켰다!"
const DIV1 = document.getElementById("div1");
function DIVDU1 () {
	alert("들켰다!");
	DIV0.removeEventListener("mouseenter", DIVDU);
	DIV1.removeEventListener("click", DIVDU1)
	DIV1.addEventListener("click", DIVDU2);
	DIV1.style.background = "beige";
}
DIV1.addEventListener("click", DIVDU1);

// 4(상) 3번의 상태에서 다시 한번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 블랙으로 바뀌어 안보이게 됩니다.
// "다시 숨는다."

function DIVDU2 () {
	alert("다시 숨는다");
	let str1 = Math.round(Math.random()*1000);
	let str2 = Math.round(Math.random()*1000);
	if(str1>700) {
		str1 = 700;
	}
	DIV0.style.top = str1 + "px";
	DIV0.style.left = str2 + "px";
	DIV1.removeEventListener("click", DIVDU2);
	DIV0.addEventListener("mouseenter", DIVDU);
	DIV1.addEventListener("click", DIVDU1);
	DIV1.style.background = "black";
}
