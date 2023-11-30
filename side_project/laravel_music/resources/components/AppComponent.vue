<template>
	<NavComponent></NavComponent>
	<div id="layoutSidenav">
		<SideComponent></SideComponent>
		<div id="layoutSidenav_content">
			<router-view></router-view>
			<FooterComponent></FooterComponent>
		</div>
	</div>
</template>
<script>
	import FooterComponent from './FooterComponent.vue';
	import NavComponent from './NavComponent.vue';
	import SideComponent from './SideComponent.vue';

	export default {
		
		name: 'AppComponent',
		props: {

		},
		components: {
			FooterComponent,
			NavComponent,
			SideComponent,
},

		data() {
			return {
				setting: '',
			}
		},
		
		mounted() {},

		methods: {

		}
	}
</script>
<style>
	@import url('/css/common.css');
</style>