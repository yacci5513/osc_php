// const BTN_DETAIL = document.getElementById('btndetail');
// const BTN_MODAL_CLOSE = document.getElementById('btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.remove('displayNone');
// });

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
// });

// 상세 모달 제어
function openDetail(id) {
	const URL = '/board/detail?id='+id;
	console.log(URL);
	fetch(URL)
	.then(response => response.json())
	.then(data => {
		const TITLE = document.querySelector('#b_title');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const UPDATEAT = document.querySelector('#update_at');
		const CREATEAT = document.querySelector('#create_at');
		TITLE.innerHTML=data.data.b_title;
		CONTENT.innerHTML=data.data.b_content;
		CREATEAT.innerHTML='작성일 : ' + data.data.create_at;
		UPDATEAT.innerHTML='수정일 : ' + data.data.update_at;
		IMG.setAttribute("src", data.data.b_img);

		openModal();
	})
	.catch(error => console.log(error) )
}

function openModal() {
	const MODAL = document.querySelector('#modalDetail')
	MODAL.classList.add('show');
	MODAL.style = ('display: block; background-color: rgba(0, 0, 0, 0,7);');
}

function closeDetailModal() {
	const MODAL = document.querySelector('#modalDetail')
	MODAL.classList.remove('show');
	MODAL.style = ('display: none');
}