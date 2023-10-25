// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5 ,100, 80, 40];
let arr = Array.from(ARR1);
arr.sort((a, b) => a - b);
console.log(ARR1);
console.log(arr);

// 짝수와 홀수를 분리해서 각각 새로운 배열을 만들어 주세요.(다하면 함수로도 만들어보세요)
// 방법 1
const ARR2 = [5, 7, 3, 4, 5, 1, 2];
let arr_even = ARR2.filter(num => num % 2 === 0);
let arr_odd = ARR2.filter(num => num % 2 === 1);
console.log(arr_even);
console.log(arr_odd);

//방법 2 함수로 만들기
function evenodd (array) {
	let even = array.filter(num => num % 2 === 0);
	let odd = array.filter(num => num % 2 === 1);
	// console.log(even);
	// console.log(odd);
	return [even, odd];
}
arr= evenodd(ARR2);
console.log(arr[0]);
console.log(arr[1]);

// 다음 문자열에서 구분문자를 .에서 ' '(공백)으로 변경해 주세요. (구글 검색 활용 추천)
//방법 1
function replace_all(string, search, replace) {
	return string.split(search).join(replace);
}

const STR1 = 'php504.meer.kat';
let arr_replace = replace_all(STR1, '.', ' ');
console.log(arr_replace);

//방법 2
let arr_replace2 = STR1.replace(/\./g, ' ');
console.log(arr_replace2);