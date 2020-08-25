<script>
	function showSidebar() {
		toggleInvis('sidebar');
		toggleInvis('backgroundBlur');
	}
	function showFilters() {
		toggleInvis('tempFiltWrapper');
		toggleInvis('backgroundBlur');
	}
	function toggleInvis(id) {
		var temp = document.getElementById(id);
		temp.classList.toggle('invisible');
	}
</script>
