let day, hour, min, sec;
let timer;


function clearTimer(t, text) {
	clearInterval(t);
	document.getElementById("display").innerText = text;
	document.getElementById("min").value = "";
	document.getElementById("sec").value = "";
  }

function startTimer() {
	min = document.getElementById("min").value; 
	if (min === "") {min = 0};
	sec = document.getElementById("sec").value; 
	if (sec === "") {sec = 0};
	timer = setInterval(countTimer, 1000);
  }

function countTimer() {
	if (sec != 0) {
	  document.getElementById("display").innerText =
	  	min + "분" + sec + "초 남았습니다.";
		sec--;
	} else {
	  if (min != 0) {
		document.getElementById("display").innerText =
		min + "분" + sec + "초 남았습니다.";
		min--;
		sec = 59;

	  } else {
		clearTimer(timer, "타이머 종료");
	  }
	}
  }
  
  function resetTimer() { // 리셋 버튼 연결
	clearTimer(timer, "리셋");
  }
