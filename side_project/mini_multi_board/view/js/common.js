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
// php js 값 넘겨줄때
// 1. (id)로 넣는방법
// 2. input이나 span으로 값 넘겨 받아서 하는 방법
function openDetail(id) {
	const URL = '/board/detail?id='+id;
	const TITLE = document.querySelector('#b_title');
	const CONTENT = document.querySelector('#b_content');
	const CREATEID = document.querySelector('#create_id');
	const IMG = document.querySelector('#b_img');
	const UPDATEAT = document.querySelector('#update_at');
	const CREATEAT = document.querySelector('#create_at');
	const DELETEBTN = document.querySelector('#delete_btn');
	fetch(URL)
	.then(response => response.json())
	.then(data => {
		DELETEBTN.setAttribute("onclick", "location.href='/board/delete?b_type="+data.data.b_type+"&id="+data.data.id+"\'");
		TITLE.innerHTML=data.data.b_title;
		CONTENT.innerHTML=data.data.b_content;
		CREATEAT.innerHTML='작성일 : ' + data.data.create_at;
		UPDATEAT.innerHTML='수정일 : ' + data.data.update_at;
		CREATEID.innerHTML='작성자 : ' + data.data.u_pk;
		IMG.setAttribute("src", data.data.b_img);
		if(data.s_id !== data.data.u_pk) {
			DELETEBTN.classList.add('d-none');
		} else {
			DELETEBTN.classList.remove('d-none');
		} //작성버튼 같은 아이디일때만 넣어주기
		openModal();
	})
	.catch(error => console.log(error) )
}

function openModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style = ('display: block; background-color: rgba(0, 0, 0, 0.7);');
}

function closeDetailModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = ('display: none');
}

function checkID() {
	const INPUTID = document.querySelector('#u_id');
	const CHKBTN = document.querySelector('#chkbutton');
	const UID = '/user/registidcheck?u_id='+INPUTID.value;
	const ERRORMSG = document.querySelector('#errormsg');

	fetch(UID)
	.then(response => response.json())
	.then(data => {
			if(data.val !== "") {
				ERRORMSG.innerHTML=data.val;
				ERRORMSG.classList="text-danger";
			} else {
				if(data.data >= 1){
					ERRORMSG.innerHTML="중복된 id입니다.";
					ERRORMSG.classList="text-danger";
				} else {
					ERRORMSG.innerHTML="사용가능한 아이디입니다.";
					ERRORMSG.classList="text-success";
					INPUTID.readOnly = true;
					CHKBTN.disabled = false;
					
				}
			}
		}
	)
	.catch(error => console.log(error) )
}