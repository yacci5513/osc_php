// -----------------
// DOM (Document of Model)
// -----------------

// 웹 문서를 제어하기 위해서 웹 문서를 객체화한것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일 등을 동적으로 조작 가능

// 2. 요소 선택
// 2-1 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');

const TITLE2 = document.getElementById('subtitle');
TITLE.style.color = 'blue';
TITLE2.style.backgroundColor= 'beige';
TITLE2.style.fontSize= '100px';


// 2-2 태그명으로 요소를 선택 (해당 요소들을 컬렉션 객체로 가져온다)
const H2 = document.getElementsByTagName('h2');
H2[0].style.color= 'red';

// 2-3 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none');
NONE[0].style.color= 'red';

// 2-4 css 선택자를 사용해 요소를 찾는 메서드
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none');
const S_NONE_ALL = document.querySelectorAll('.none');

// 3. 요소 조작
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
const DIV1 = document.querySelector('#div1');
DIV1.textContent = '111111111';

// innerHTML : 태그까지 포함해서 넣는 방법, 이전의 태그들은 모두 제거
DIV1.innerHTML = '<p>111111111234</p>';

// setAttribute('', '') : 요소에 속성을 추가
const INPUT1 = document.getElementById('intxt');
INPUT1.setAttribute('placeholder', '이름');
// 몇몇 속성들은 DOM 객체에서 바로 설정가능
// ex) INPUT1.placeholder = '111';

// removeAttribute('') : 요소에 속성을 제거
INPUT1.removeAttribute('placeholder');

// 4. 요소 스타일링

// 클래스로 스타일 추가 방법
TITLE.style.color = 'blue';
TITLE.classList.add('class1', 'bgc_1', 'class2');

// 클래스로 스타일 삭제 방법
TITLE.classList.remove('class1', 'bgc_1', 'class2');

// 5. 새로운 요소 생성
// 요소 만들기
const UL = document.getElementById('ul'); // 삽입할 부모 요소

// 요소를 마지막 위치에 삽입하는 방법 
UL.appendChild(LI); 
// 나는 반복문을 이용해 5개 만들었음.
for(let i=0; i<=5; i++){
	let LI = document.createElement('li'); //요소 만들기
	UL.appendChild(LI).innerHTML = '나는야 퉁퉁이'; 
}

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('li:nth-child(3)'); // css 선택자 다 넣을수 있음
let LI = document.createElement('li'); //요소 만들기
LI.innerHTML = "나는야 비실이";
UL.insertBefore(LI,SPACE);

// 요소를 지우는 방법
LI.remove();
// 나는야 비실이만 삭제

// --- 사과게임 위에 장기를 넣어주세요
let ul1 = document.getElementById('ul'); // 삽입할 부모 요소
const SPACE1 = document.querySelector('li:nth-child(3)'); // css 선택자 다 넣을수 있음
LI = document.createElement('li'); //요소 만들기
LI.innerHTML = '장기';
ul1.insertBefore(LI,SPACE1);

// ---어메이징에 베이지 배경색을 넣어주세요
const BGCBEIGE = document.querySelector('li:nth-child(9)'); // nth쓸때 데이터 변경 가능성 조심!  
BGCBEIGE.style.backgroundColor = 'beige';

// ---리스트에서 짝수는 빨간색글씨 홀수는 파란색 글씨로 만들어주세요.
const LISTEVENODD = document.getElementsByTagName('li');
let cnt = LISTEVENODD.length;

for(let i = 1; i <= cnt; i++){
	if ( i % 2 === 1) {
		LISTEVENODD[i-1].style.color = 'blue';
	} else if ( i % 2 === 0) {
		LISTEVENODD[i-1].style.color = 'red';
	} else {
		LISTEVENODD[i-1].style.color = 'black';
	}
}