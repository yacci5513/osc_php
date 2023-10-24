// -----------------
// 조건문(if, switch)
// -----------------

// if(조건) {
	
// } else if(조건) {
	
// } else {

// }

// let age = 30;
// switch(age) {
// 	case 20:
// 		console.log("20대");
// 		break;
// 	case 30:
// 		console.log("30대");
// 		break;
// 	default:
// 		console.log("모르겠다.");
// 		break;
// }

// -----------------
// 반복문(while, do-while, for, foreach, for...in, for...of )
// -----------------
// let arr = [1, 2, 3, 4];
// arr.forEach(function( val, key ) {
// 	console.log(`${key} : ${val}`); // `사용법
// 	console.log(key +' : ' + val); // +로 연결
// });


// let obj = {
// 	key1: 'val1'
// 	,key2: 'val2'
// }

// for... in : 모든 iterable 객체를 루프 가능, key에만 접근 가능
// for( let key in obj ){
// 	console.log(key);
// 	console.log(obj[key]);
// }

// for... of : 모든 iterable 객체를 루프 가능, value에만 접근 가능
// iterable : String, Array, Map, Set, TypeArray...
// for( let val of arr ){
// 	console.log(val);
// }

let sort_arr = [3, 5, 2, 10, 7];
let length = sort_arr.length;
let length_1 = sort_arr.length-1;
for(let a = 0; a < length; a++) {
	for(let b = 0; b < length_1 - a; b++) {
		if (sort_arr[b] > sort_arr[b+1]){
			let temp = sort_arr[b+1];
			sort_arr[b+1] = sort_arr[b];
			sort_arr[b] = temp; 
		}
	}
}
console.log(sort_arr);

sort_arr.sort((a, b) => a - b);
console.log(sort_arr);