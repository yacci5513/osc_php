<template>
    <div>
        <h1>APP VUE 컴포넌트</h1>
        <h2>{{ $store.state.testStr }}</h2>
        <h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
        <h2>라라벨 데이터 id :{{ laravelData.id }}</h2>
        <ul>
            <li><a href="/">루트</a></li>
            <li><a href="/login">로그인</a></li>
            <li><a href="/board">보드</a></li>
            <!-- href할때 라우터 네임 받아야한다 -->
        </ul>
        <!-- href는 라라벨의 라우터로 
        router link는 뷰의 라우터로 찾아감 -->
        <router-link to="/login">라우터 로그인</router-link>
        <!--그래서 router link쓸 때 조심 보드에서 라우터링크로 이동했을 때 데이터는 바뀌지 않음
        데이터를 다시 받아오는게 아님 -->
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'AppComponent',
    props: {
        laravelData: Object,
    },
    beforeCreate() {
        this.$store.commit('setLaravelData', this.laravelData);
    }
}
</script>
<style>
    
</style>