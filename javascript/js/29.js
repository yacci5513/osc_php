// -----------------
// Math
// -----------------

// random() : 0이상 1미만의 랜덤한 수를 리턴
Math.ceil((Math.random() * 10));


console.log('루프 시작');
for(let i = 0; i < 10000000; i++) {
	let ran = Math.ceil((Math.random() * 10));
	if(ran < 1 || ran > 10){
		console.log('이상한 숫자');
	}
}
console.log('루프 끝');

// floor() : 버림
// ceil() : 내림
// round() : 반올림

// min(), max() : 최대 최소
arr=[1,2,3,4,5];
maxValue = Math.max(...arr);
