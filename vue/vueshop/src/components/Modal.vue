<template>
    <div class="bg_black">
      <div class="bg_white">
          <img :src="data.img" alt="이미지">
          <h4>{{data.name}}</h4>
          <p>{{data.content}}</p>
          <p>{{data.price}} 원</p>
          <input
            type="text"
            v-model="productCnt">
          <p>총 가격 : {{ productCnt * data.price }}</p>
          <p>신고수 : {{data.reportCnt}}</p>
          <button @click="$emit('closeModal')">닫기</button>
      </div>
    </div>
</template>
<script>

export default {
    name : 'Modal',
    data() {
        return {
            productCnt: 0,
        }
    },
    // watch : data를 감시하는 함수를 정의하는 영역
    watch: {
        // 유저가 입력한 값을 자동으로 파라미터로 넘겨받음
        // 함수명 감시하고 싶은 데이터바인딩명과 동일해야함
        productCnt(userinput) {
            if (userinput > 100) {
                alert("그거 못사 최대 100개야");
                this.productCnt = 100;
            } else if (userinput < 0) {
                alert("0보다 작은숫자는 못들어가");
                this.productCnt = 0;
            }
        }
    },
    props: {
        data: Object,
        closeModal: Function,
    },
}
</script>
<style>
    
</style>