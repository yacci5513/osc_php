<template>
  <img alt="Vue logo" src="./assets/logo.png">
  
  <!-- 헤더 -->
  <Header :data="navList" :data1="sty_color_red"></Header>

  <!-- 할인 배너 -->
  <Discount></Discount>
  <!-- 컴포넌트로 이관
  <div class="discount">
    <p>지금 당장 구매하시면 99%할인</p>
  </div> -->


  <!-- 모달 -->
  <Transition name="modalAni">
    <Modal
      v-if="modalFlg"
      :data="modalProduct"
      @closeModal="modalClose"
      ></Modal>
  </transition>


    <!-- 상품 리스트-->
    <ProductList
      :data="products"
      @openModal="modalOpen"
      @plusOne="plusOne"
    ></ProductList>
    <!-- <div>
      <div v-for="(item, i) in products" :key="i">
        <br>
        <p @click="modalOpen(item)">{{ item.name }}</p>
        <p>{{ item.price }} 원</p>
        <button @click="$event => plusOne(i)">허위 매물 신고</button>
        <span>신고수 : {{ item.reportCnt }}</span>
      </div>
    </div> -->


  <!-- <div>
    <div>
      <h4 :style="sty_color_red">{{products[0]}}</h4>
      <p>{{ prices[0] }} 원</p>
    </div>
    <div>
      <h4>{{products[1]}}</h4>
      <p>{{prices[1]}} 원</p>
    </div>
    <div>
      <h4>{{products[2]}}</h4>
      <p>{{prices[2]}} 원</p>
    </div>
  </div> -->

</template>

<script>
import data from './assets/js/data.js';
import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import ProductList from './components/ProductList.vue';
export default {
  name: 'App',

  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  // 데이터 값이 변하면 화면쪽도 자동으로 리 렌더링을 해준다.
  // 퓨어 php로 하려면 눌렀을 때 온클릭 이벤트 줘야하고 변화되는 요소 가져와서 등등 처리해야 할 것들이
  // 데이터 바인딩을 하면 간단히 해결할 수 있다.
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      sty_color_red: 'color: blue',
      // products : ['양말', '티셔츠', '바지'], 
      // prices : [1500, 24000, 50000],   
      products: data,
      modalFlg: false,
      modalProduct: {},
    }
  },
  // methods : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalProduct = item;
    },
    modalClose() {
      this.modalFlg = false;
    },
  },
  
  // components : 컴포넌트를 등록하는 영역
  components: {
    Discount,
    Header,
    Modal,
    ProductList,
  },
}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* css파일로 이관
.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}

.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>