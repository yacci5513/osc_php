// -----------------
// 변수 선언 (var, let, const)
// -----------------
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// 의도하지 않은 중복 선언 방지
// let u_name = "홍길동";
// console.log(u_name);
// let u_name = "갑순이";
// console.log(u_name);
// 중복 선언 불가능 - 에러

// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);
// 재할당 가능

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
// const AGE = 19;
// const AGE = 16;
// console.log(AGE);
// 중복 선언 불가능 - 에러
// const AGE = 19;
// AGE = 16;
// console.log(AGE);
// 재할당 불가능 - 에러