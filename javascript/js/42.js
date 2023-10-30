function my_setTimeout(callback,ms) {
    const NOW = new Date();
    let loof1 = new Date();
    while(loof1 - NOW <= ms) {
        loof1 = new Date();
    }
    callback();
} 

// 동기처리 방식
console.log('A');
console.log('A');
console.log('A');

// 비동기 처리
my_setTimeout(() => console.log('a'), 600);
my_setTimeout(() => console.log('b'), 700);
my_setTimeout(() => console.log('c'), 1000);


//차이
console.log('A');
setTimeout(()=> {console.log('B');},1000);
console.log('C');
//console에는 ACB가 찍힌다.
// console 은 CallStack영역에서 처리 setTimeout은 Web API단 큐에서 처리

// FILO = 콜스택 메모리 처리
// FIFO = 큐스택 메모리 처리

// 콜백 지옥 ( callback hell)
// 비동기 처리를 동기 처리로 구현
setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C')
        },1000)
    }, 2000)
}, 3000);