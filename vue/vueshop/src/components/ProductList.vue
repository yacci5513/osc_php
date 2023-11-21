<template>
    <div>
      <div v-for="(item, i) in data" :key="i">
        <br>
        <p @click="$emit('openModal',item)">{{ item.name }}</p>
        <p>{{ item.price }} 원</p>
        <button @click="$event => $emit('plusOne',i)">허위 매물 신고</button>
        <span>신고수 : {{ item.reportCnt }}</span>
      </div>
    </div>
</template>
<script>
export default {
    name : 'ProductList',
    props: {
        data: Object,
        openModal: Function,
        plusOne: Function,
    },
}
</script>
<style>
    
</style>
