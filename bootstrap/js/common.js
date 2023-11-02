const BTN_DETAIL = document.getElementById('btndetail');
const BTN_MODAL_CLOSE = document.getElementById('btnModalClose');

BTN_DETAIL.addEventListener('click', () => {
	const MODAL = document.querySelector('#modal');
	MODAL.classList.remove('displayNone');
});

BTN_MODAL_CLOSE.addEventListener('click', () => {
	const MODAL = document.querySelector('#modal');
	MODAL.classList.add('displayNone');
});