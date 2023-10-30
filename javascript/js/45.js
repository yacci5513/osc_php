// promise 사용법
// 변수에 담아서 사용
// 재사용성, 가독성, 확장성을 이유로 현업에서는 아래와 같이 함수를 등록하고 사용
const PROMISE1 = new Promise( function (resolve, reject) {
	let flg = true;
	if(flg) {
		return resolve('성공'); //요청 성공 시 resolve()를 호출
	} else {
		return reject('실패'); //요청 실패 시 reject()를 호출
	}
});

PROMISE1
.then( data => console.log(data))
.catch (err => console.log(err))
.finally(() => console.log('finally 입니다.'));

//promise 함수 등록 
//보통은 함수에 담아서 사용하는 편
function PRO2() {
	return new Promise( function (resolve, reject) {
		let flg = true;
		if(flg) {
			return resolve('성공'); //요청 성공 시 resolve()를 호출
		} else {
			return reject('실패'); //요청 실패 시 reject()를 호출
		}
	});
} 




//콜백 지옥 1. 같은거
setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C')
        },1000)
    }, 2000)
}, 3000);


//콜백 지옥을 promise함수로 만들기! 2. 같은거
function PRO3(str, ms) {
    return new Promise (function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

PRO3('A', 3000)
.then(() => PRO3('B', 2000))
.then(() => PRO3('C', 1000));