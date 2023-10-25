// -----------------
// Date
// -----------------

let now = new Date();
let sDate = new Date('2023-09-30 19:20:10');

// 00시 기준
let date = Math.floor((now.getTime()-sDate.getTime()));
let now2 = new Date(2023, 8, 30,0,0,0,0);
let aaaa =((sDate.getTime()-now2.getTime())/ (1000*60*60*24));

// let now = new Date();
// let sDate = new Date('2023-09-30');
console.log(now);

// getFullYear() : 년도만 가져오는 메소드
console.log(now.getFullYear());

// getMonth() : 월만 가져오는 메소드 (+1을 해줘야 현재 월과 같음)
console.log(now.getMonth() + 1);

// getDate() : 일만 가져오는 메소드
console.log(now.getDate());

// getDay() : 요일을 가져오는 메소드 (0(일요일) ~ 6(토요일))
console.log(now.getDay());

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// getSeconds() : 초을 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 밀리초을 가져오는 메소드
console.log(now.getMilliseconds());

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초로 가져온다.
