import { createStore } from 'vuex';
import axios from 'axios';


const store = createStore({
    // state() : data를 저장하는 영역
    state() {
        return {
            MusixMatchData: [],
            VibeData: [],
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        setMusixMatchDataList(state, data) {
            state.MusixMatchData = data;
        },
        setVibeDataList(state, data) {
            state.VibeData = data;
        },


    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
		actionGetMusixMatchDataList(context) {
            const url ='/api/chart/musixmatchchart';
            axios.get(url)
            .then(res => {
                context.commit('setMusixMatchDataList', res.data);
            })
            .catch(err => {
                console.log(err);
            })
        },

        actionGetVibeDataList(context) {
            const url ='/api/chart/vibechart';
            axios.get(url)
            .then(res => {
                console.log(res.data);
                context.commit('setVibeDataList', res.data);
            })
            .catch(err => {
                console.log(err);
            })
        },
	}
});

export default store;