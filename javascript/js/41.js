// 타이머 함수

// 1. setTimeout( 콜백함수, 시간(ms)) : 일정시간이 흐른 후에 콜백함수를 실행
// setTimeout(() => console.log('시간'), 3000);

// 콘솔에 1초 뒤에 A, 2초 뒤에 B, 3초 뒤에 C를 찍어주세요

// (1)
// 콘솔에 1초 뒤에 A, 2초 뒤에 B, 3초 뒤에 C가 출력
// setTimeout(console.log('A'), 1000);
// setTimeout(console.log('B'), 2000);
// setTimeout(console.log('C'), 3000);

// (2)
// setTimeout(
//  () => {
//      console.log('A');
//      setTimeout(
//          () => {
//              console.log('B');
//              setTimeout(
//                  () => {
//                      console.log('C');
//                  }, 1000);
//          }, 1000);
//      }, 1000);

// (3)
// function Time(chr, ms) {
//  setTimeout(() => console.log(chr), ms);
// }
// Time('A', 1000);
// Time('B', 2000);
// Time('C', 3000);

// (4)
// for(let i =0; i<=2; i++) {
// 	a= ['A','B','C'];
// 	b= [1000,2000,3000];
// 	setTimeout(() => console.log(a[i]), b[i]);
// }

// 2. clearTimeout(해당 setTimeout()) : 타이머를 삭제

// let mySet = setTimeout(() => console.log('C'), 1000);
// 	clearTimeout(mySet);

// 3. setInterval(콜백함수, 시간(ms)) : 일정 시간마다 반복
// let myInter = setInterval(() => console.log('A'), 1000);
// clearInterval(myInter);

// 4. clearTimeout(해당 setInterval()) : 인터벌 삭제

// 화면을 로드하고 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요
function aaa() {
	let divtext = document.createElement('div');
	divtext.innerHTML = '두둥등장';
	document.body.appendChild(divtext);
}

setTimeout( aaa , 5000 );