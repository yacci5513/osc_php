// 1. HTTP (Hypertext Trasfer Protocol) 란?
// 하이퍼 텍스트를 주고 받을지 규악한 프로토콜로
// 클라이언트가 서버에 데이터를 request 하고
// 서버가 해당 request에 따라 response를 클라이언트에 보내주는 방식
// Hypertext는 웹 사이트에서 이용되는 하이퍼링크나 리소스, 문서, 이미지 등을 모두 포함합니다.

 // 2. AJAX
	
 // 3. JSON

//  4. API 예제 사이트
//  https://picsum.photos/

//status 200번대 정상처리
//status 300번대 통신은 정상 서버에서 예외 처리
//status 400번대 통신이상

// const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
const BTN_API = document.querySelector('#btn_api');
const BTN1 = document.querySelector('#btn1');
const BTN2 = document.querySelector('#btn2');
BTN_API.addEventListener('click', my_fetch);
BTN1.addEventListener('click', my_remove);
BTN2.addEventListener('click', remove_children);

function my_remove() {
	const IMG1 = document.querySelector('#div_img');
	IMG1.replaceChildren();

	// const IMG1 = document.querySelectorAll('#div_img > img');
	// for( let key in IMG1 ){
	// 	IMG1[key].remove();
	// }
	// 이걸로 했다가 length를 지정해주지 않아 안에있는 모든 객체가 루프 되었음
	// 그래서 안에있는 img태그보다 루프가 더 많이 돌아감

	// => 그래서 할거면 for문으로 해야함
	// for (let i=0; i< IMG.length; i++) {
	// 	IMG[i].remove();
	// }
}

function remove_children() {
	// 부모 노드 선택
	const parent = document.getElementById('div_img');
  
	// 자식 노드 삭제
	while(parent.firstChild)  {
	  parent.removeChild(parent.firstChild);
	}
  }

// --------------------------------------
function my_fetch() {
	const INPUT_URL = document.querySelector('#input_url');

	fetch(INPUT_URL.value.trim())
	.then( response => response.json() )
	.then( data => imgAll(data) )
	.catch ( error => console.log(error) );
}

function imgAll(data) {
	data.forEach(item => {
		const NEWIMG = document.createElement('img');
		const DIVIMG = document.querySelector('#div_img');

		NEWIMG.setAttribute('src', item.download_url);
		NEWIMG.style.width = '200px';
		NEWIMG.style.height = '200px';
		DIVIMG.appendChild(NEWIMG);
	});
}
