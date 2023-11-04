const DIVHEADER = document.querySelector('.list_container_header');
const DIVCONTAINER = document.querySelector('.list_container');
const DIVTOP = document.querySelector('.list_container_top');

function add_str_zero(num) {
	return ( "0" + num ).slice(-2);
}

function timeprint() {
	let now = new Date();
	let hours = add_str_zero(now.getHours());
	let minutes = add_str_zero(now.getMinutes());
	let seconds = add_str_zero(now.getSeconds());
	DIVHEADER.innerHTML = hours + ":" + minutes + ":" + seconds;
	DIVCONTAINER.insertBefore(DIVHEADER,DIVTOP);
}
timeprint();
setInterval( timeprint, 1000 );


function delete_list() {
    if(confirm("삭제 할까요?")) {
        alert("삭제 완료");
        return true;
    } else {
        return false;
    }
}