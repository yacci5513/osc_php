import { createStore } from 'vuex';
import axios from 'axios';


const store = createStore({
    // state() : data를 저장하는 영역
    state() {
        return {
            boardData: [], // 게시글 저장용
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        setBoardList(state, data) {
            state.boardData = data;
        },
		

    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
		actionGetBoardList(context) {
            const url ='/api/boards';
            axios.get(url)
            .then(res => {
				console.log(res.data);
                context.commit('setBoardList', res.data);
            })
            .catch(err => {
                console.log(err);
            })
        },
	}
});

export default store;