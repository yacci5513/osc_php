// 현재 시간을 화면에 표시
// 실시간으로 시간을 화면에 표시
// 멈춰 버튼을 누르면, 시간이 정지할 것
// 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
const DIVTEXT = document.createElement('div');
const BTN1 = document.getElementById('btn1');
const BTN2 = document.getElementById('btn2');

function btn1() {
	clearInterval(progressClock);
}

function btn2() {
	progressClock = setInterval( clock1, 1000 );
}

function add_str_zero(num) {
	return ( "0" + num ).slice(-2);
}

function ampm(num1) {
	return ( num1 <= 12 ? '오전 ' + num1.toString() : '오후 ' + (num1-12).toString());
}

function clock1() {
	let NOW = new Date();	// 현재 날짜 및 시간
	let NOWHOURS = ampm(NOW.getHours());
	let NOWMIN =add_str_zero(NOW.getMinutes());
	let NOWSEC =add_str_zero(NOW.getSeconds()); //한국 시간

	let WOR = new Date(NOW.getTime() + (NOW.getTimezoneOffset() * (60 * 1000)) + (-4 * (60 * 60 * 1000)));
	// let WOR = new Date();	// 현재 날짜 및 시간
	// WOR.setTime( NOW - ( 1000 * 60 * 60 *13));
	let WORHOURS = ampm(WOR.getHours());
	let WORMIN = add_str_zero(WOR.getMinutes());
	let WORSEC = add_str_zero(WOR.getSeconds()); //미국 시간

	let LON = new Date(NOW.getTime() + (NOW.getTimezoneOffset() * (60 * 1000)) + (1 * (60 * 60 * 1000)));
	let LONHOURS = ampm(LON.getHours());
	let LONMIN = add_str_zero(LON.getMinutes());
	let LONSEC = add_str_zero(LON.getSeconds()); //런던 시간
	
	DIVTEXT.innerHTML = '한국 ' + NOWHOURS + ':' + NOWMIN + ':' + NOWSEC + '<br>' +
			' 미국 ' + WORHOURS + ':' + WORMIN + ':' + WORSEC + '\n' + '<br>' +
			' 런던 ' + LONHOURS + ':' + LONMIN + ':' + LONSEC;
	document.body.insertBefore(DIVTEXT, BTN1);
}

let progressClock = setInterval( clock1, 1000 );
BTN1.addEventListener("click", btn1);
BTN2.addEventListener("click", btn2);