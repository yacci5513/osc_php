// -----------------
// 배열
// -----------------

// let arr= [1,2,3,4,5];

// push() : 배열에 값을 추가
// arr.push(6);

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(2, 1); // 배열의 arr[2]를 삭제
// arr.splice(4,1);
// arr.splice(2, 0, 10); // 배열의 arr[2]에 값이 10인 인덱스를 추가
// arr.splice(2, 0, 10, 11, 12, 13);

// indexof() : 배열에서 특정 요소를 찾는데 사용
// arr.indexOf(2);

// lastindexOf() : 배열에서 특정 요소중 가장 마지막에 위치한 요소를 찾는데 사용
// arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];
// arr.lastIndexOf(6);

// pop() : 배열의 가장 마지막 요소를 삭제하고 삭제한 요소의 값을 리턴
// let arr= [1,2,3,4,5,1,2,3];
// let i_pop = arr.pop();
// console.log(arr);

// sort() : 배열을 정렬
// let arr= [5,4,6,7,22,32,3,2];
// 오름차순 정렬 1번 2번 동일
// let arr_sort = arr.sort( (a, b) => a - b); // 1번
// let arr_sort = arr.sort(function(a, b) {
// 	return a - b;
// }); // 2번

// 내림차순 정렬
// let arr_sort = arr.sort( (a, b) => b - a); // 1번
// let arr_sort = arr.sort(function(a, b) {
// 	return b - a;
// }); // 2번 

// -----------------
// 새로운 배열 생성할 때 !!
// -----------------
// Array.from() : 다른 메모리 주소를 가지는 배열 생성 방법(Value copy 방식)
// 자바스크립트는 주소 참조 방식임
// let arr= [5,4,6,7,22,32,3,2];
// let arr2 = Array.from(arr);

// includes() : 배열의 특정요소를 가지고 있는지 판별
// let arr= ['치킨', '육회비빔밥', '비엔나'];
// let boo = arr.includes('치킨');

// join() : 배열의 모든요소를 연결해서 하나의 문자열을 리턴
// let arr= ['치킨', '육회비빔밥', '비엔나'];
// arr.join(); // '치킨,육회비빔밥,비엔나'
// arr.join('-'); // '치킨-육회비빔밥-비엔나'

// map() : 배열의 모든 요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
arr= [1,2,3,4,5,6,7,8,9];
// 모든 요소의 값 * 2 의 결과를 배열로 얻고싶을 때
let arr_map = arr.map(num => num * 2); // [2, 4, 6, 8, 10, 12, 14, 16, 18]

// some() : 판별 함수를 통과하는 요소가 있는지 판별 (return=boolean)
// arr = [1,2,3,4,5,6,7,8,9];
// let boo_some = arr.some( num => num > 10 ); // false
// let boo_some = arr.some( num => num === 9 ); // true

// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 만족 안하면 false (return=boolean)
// arr = [1,2,3,4,5,6,7,8,9];
// let boo_every = arr.every( num => num > 10 ); // false
// let boo_every = arr.every( num => num === 9 ); // false

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
// arr = [1,2,3,4,5,6,7,8,9];
// let boo_filter = arr.filter( num => num % 3 === 0 ); // [3, 6, 9]