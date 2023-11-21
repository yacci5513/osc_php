<template>
  <div class="nav">
    <a :style="data1" v-for="(item, i) in data" :key="i">{{ i + ':' + item }}</a>
  </div>
</template>
<script>
export default {
    name : 'Header',

    props: {
        data: Array,
        data1: String,
    }
}
</script>
<style>
    
</style>