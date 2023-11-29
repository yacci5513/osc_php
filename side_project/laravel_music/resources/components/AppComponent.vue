<template>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="index.html">VIBE</a>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<a class="nav-link" href="charts.html">
							<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Charts
						</a>
						<a class="nav-link" href="tables.html">
							<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
							Tables
						</a>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">로그인</div>
					Admin
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<!-- main 영역 -->
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">메인</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">main</li>
					</ol>
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table me-1"></i>
							음악 순위
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th>이름</th>
										<th>랭킹</th>
										<th>id</th>
										<th>4</th>
										<th>5</th>
										<th>6</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="item in $store.state.boardData.message.body.artist_list" :key="item">
										<td>{{ item.artist.artist_name }}</td>
										<td>{{ item.artist.artist_rating }}</td>
										<td>{{ item.artist.artist_id }}</td>
										<td>4</td>
										<td>5</td>
										<td>6</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>

			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2023</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</template>
<script>
export default {
	
	name: 'AppComponent',
	props: {

	},
	components: {

	},

	data() {
		return {
			setting: '',
		}
	},

	created() {
		this.$store.dispatch('actionGetBoardList');
	},

	mounted() {},

	methods: {

	}
}
</script>
<style>
	@import url('/css/common.css');
</style>