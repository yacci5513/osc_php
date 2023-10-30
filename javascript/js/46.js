// async & await 란?
// 비동기처리를 좀 더 가독성 좋고 편하게 쓰기위해 promise를 사용했는데
// promise 또한 체이닝이 계속 될 경으 코드가 난잡해 질 수 있어 async & await가 도입되었습니다.
// async & await는 promise를 기반으로 동작합니다.

function PRO3(str, ms) {
    return new Promise (function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

// async function test() {
// 	await PRO3('A', 3000);
// 	await PRO3('B', 2000);
// 	await PRO3('C', 1000);
// }

// test();
// 병렬처리  3개 동시에 다 실행하는 거
// promise 객체에 all이라는 메소드 사용
// promise.all()

async function test2() {
	return Promise.all([PRO3('A',3000), PRO3('B',1000)])
		.then ( () => ('처리완료'));
}

test2.then(data => console.log(data));