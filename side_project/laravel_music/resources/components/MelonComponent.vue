<template>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">1</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">1</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    1
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>제목</th>
                                <th>가수명</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item,key) in $store.state.MelonData.track" :key="item">
                                <td>{{ item.trackTitle }}</td>
                                <td>{{ item.artistName }}</td>
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
        name: 'MelonComponent',

        beforeCreate() {
            this.$store.dispatch('actionGetMelonDataList');
        },
    }

</script>
<style>
    
</style>