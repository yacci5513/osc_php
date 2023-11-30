<template>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">메인</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">main</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    미국에서 인기있는 Top 10
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>이름</th>
                                <th>아티스트 랭킹</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in $store.state.MusixMatchData.message.body.artist_list" :key="item">
                                <td>{{ item.artist.artist_name }}</td>
                                <td>{{ item.artist.artist_rating }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
    

    export default {
        name: 'VibeComponent',

        created() {
            this.$store.dispatch('actionGetVibeDataList');
        },
    }

</script>
<style>
    
</style>