
// const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
const BTN1 = document.querySelector('#btn1');
const BTN2 = document.querySelector('#btn2');

BTN1.addEventListener('click', my_fetch);
BTN2.addEventListener('click', my_remove);


function my_remove() {
	const MAINDIV = document.querySelector('#main_div');
	MAINDIV.replaceChildren();
}

function my_fetch() {
	const INPUT_URL = document.querySelector('#input_url');

	fetch(INPUT_URL.value.trim())
	.then( response => {
		if( response.status >= 200 && response.status < 300 ){
			return response.json();
		} else {
			throw new Error('에러에러');
		}
	} )
	.then( data => imgAll(data) )
	.catch( error => console.log(error) );
}

function imgAll(data) {
	data.forEach(item => {
		const NEWDIV = document.createElement('div');
		const NEWP = document.createElement('p');
		const NEWIMG = document.createElement('img');
		const DIVIMG = document.querySelector('#main_div');
		NEWDIV.className = 'div_11';
		NEWP.className = 'main_p';
		NEWP.innerHTML = item.id;
		NEWIMG.className = 'main_img';
		NEWIMG.setAttribute('src', item.download_url);
		DIVIMG.appendChild(NEWDIV).appendChild(NEWP);
		DIVIMG.appendChild(NEWDIV).appendChild(NEWIMG);
	});
}
