import { createStore } from 'vuex';
import axios from 'axios';


const store = createStore({
    // state() : data를 저장하는 영역
    state() {
        return {
            boardData: [], // 게시글 저장용
            flgTapUI: 0, // 탭 ui용 플래그
            imgURL: '', // 작성탭 표시용 이미지 URL 저장용
            postFileData: null, // 글 작성 파일 데이터 저장용
            lastBoardId: 0, // 가장 마지막 로드 된 게시글 번호 저장용
            flgBtnMoreView: true, // 더보기 버튼 활성 버튼 플래그
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        setBoardList(state, data) {
            state.boardData = data;
            state.lastBoardId = data[data.length - 1].id;
        },
        // TODO meerkat git 참고해서 lastBoardId 원래 어떤 방식으로 하는건지
        // 확인 하기 컨텍스트 커밋부분 수정해줘야 함
        setFlgTapUI(state, num) {
            state.flgTapUI = num;
        },

        setImgURL(state, url) {
            state.imgURL = url;
        },

        //글 작성 파일데이터 세팅용
        setPostFileData(state, file) {
            state.postFileData = file;
        },

        // 작성된 글 삽입용
        setUnshiftBoard(state, data) {
            state.boardData.unshift(data);
        },

        // 작성 후 초기화 처리
        setClearAddData(state) {
            state.imgURL = ''; // 작성탭 표시용 이미지 URL 저장용
            state.postFileData = null; // 글 작성 파일 데이터 저장용
        },

        // 작성된 데이터 추가
        setPushBoard(state, data) {
            state.boardData.push(data);
            state.lastBoardId = data.id;
        },
        
        // 더보기 버튼 활성화
        setFlgBtnMoreView(state, boo) {
            state.flgBtnMoreView = boo;
        }

    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
        // 초기 게시글 데이터 획득 ajax 처리
        actionGetBoardList(context) {
            const url = '/api/boards';
            const header = {
                headers: {
                    'Authorization': 'Bearer seongchan',
                }
            };
            axios.get(url, header)
            .then(res => {
                context.commit('setBoardList', res.data);
                context.commit('setClearAddData');
            })
            .catch(err => {
                console.log(err);
            })
        },

        //글 작성 처리
        actionPostBoardAdd(context) {
            const url = '/api/boards';
            const header = {
                headers: {
                    'Authorization': 'Bearer seongchan',
                    'Content-Type': 'multipart/form-data',
                }
            };
            //통신할때 form-data이기 때문에 data가 아니라 form-data를 넘겨줘야 한다.
            const formData = new FormData();
            formData.append('name', '오성찬');
            formData.append('img', context.state.postFileData);
            formData.append('content', document.getElementById('content').value);

            // const data = {
            //     name: '오성찬',
            //     img: context.state.postFileData,
            //     content: document.getElementById('content').value,
            // };


            axios.post(url, formData, header)
            .then(res => {
                // 작성글 데이터 저장
                context.commit('setUnshiftBoard', res.data);

                // 리스트 UI로 전환
                context.commit('setFlgTapUI', 0);
            })
            .catch(err => {
                console.log(err);
            })
        },
        actionGetBoardShow(context) {
            const LASTNUM = context.state.lastBoardId;
            const url = '/api/boards/' + LASTNUM;
            const header = {
                headers: {
                    'Authorization': 'Bearer seongchan',
                }
            };
            axios.get(url, header)
            .then(res => {
                if(res.data) {
                    // 데이터 있을 경우
                    context.commit('setPushBoard', res.data);
                } else {
                    //데이터 없을 경우
                    context.commit('setFlgBtnMoreView', false);
                }
            })
            .catch(err => {
                console.log(err.response.data);
            })
        },
    }

});

export default store;