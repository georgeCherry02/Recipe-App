<?php
	include_once "scripts/tempFilters.php";
?>
<div class='invisible' id='tempFiltWrapper'>
	<a class='closeButton' onclick='showFilters()'>-</a>
	<form method='POST' action='session-interaction/tempFilters.php' id='tempFilter'>
		<div id='dietWrapper'></div>
		<div id='alrgWrapper'></div>
		<div id='adtAlrgWrapper'></div>
	</form>
	<div class='data' id='tempFilterData'><?php
		if (isset($_SESSION['filters'])) {
			echo $_SESSION['filters'];
		}
	?></div>
</div>
<script>
	populateTempFilter();
</script>
