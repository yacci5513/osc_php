<template>
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<br>
					<router-link class="nav-link" to="/Vibe">
						Vibe Chart
					</router-link>
					<router-link class="nav-link" to="/Melon">
						Melon Chart
					</router-link>
					<router-link class="nav-link" to="/MusixMatch">
						MusixMatch Chart
					</router-link>

				</div>
			</div>
			<div class="sb-sidenav-footer">
				<div class="small">로그인</div>
				ohseongchan
			</div>
		</nav>
	</div>
</template>
<script>


    export default {
        name: 'SideComponent',

        created() {
        },
    }

</script>
<style>
    
</style>