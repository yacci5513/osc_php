<template>
    <!-- 헤더 -->
    <div class="header">
      <ul>
        <li
          v-if="$store.state.flgTapUI !== 0"
          class="header-button header-button-left"
          @click="listGo()" >취소</li>
        <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
        <li 
          v-if="$store.state.flgTapUI === 1"
          @click="addBoard()"
          class="header-button header-button-right">작성</li>
      </ul>
    </div>
    <!-- 컨테이너 -->
    <ContainerComponent></ContainerComponent>

    <!-- 더보기 버튼 -->
    <button
      @click="moreList()"
      v-if = "$store.state.flgBtnMoreView && $store.state.flgTapUI === 0"
      >더보기</button>

    <!-- 푸터 -->
    <div class="footer">
      <div class="footer-button-store">
        <label for="file" class="label-store">+</label>
        <input @change="uploadGo" accept="image/*" type="file" id="file" class="input-file">
      </div>
    </div>
</template>
<script>
import ContainerComponent from './components/ContainerComponent.vue';
export default {
  name: 'App',
  created() {
    // store의 action 호출
    this.$store.dispatch('actionGetBoardList');
  },
  components: {
    ContainerComponent,
  },
  methods: {
    uploadGo(e) {
      const FILE = e.target.files;
      const IMGURL = URL.createObjectURL(FILE[0]);
      // 작성 영역에 이미지를 표시하기 위한 데이터 저장
      this.$store.commit('setImgURL', IMGURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', FILE[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUI', 1);
      e.target.value = '';
    },
    listGo() {
      this.$store.commit('setFlgTapUI', 0);
    },
    
    //글 작성 처리
    addBoard() {
      this.$store.dispatch('actionPostBoardAdd');
    },
    moreList(){
      this.$store.dispatch('actionGetBoardShow');
    }
  }
}
</script>
<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2C3E50;
  margin-top: 60px;
}
</style>