<?php
	$root = true;
	include_once "common/base.php";
	include_once "common/header.php";
	include_once "pageComponents/tempFilters.php";
	include_once "common/sideBar.php";
	if (isset($_GET['filters']) && $_GET['filters'] == "applied") {
		$script = "<script>alert('Your filters have been updated')</script>";
		echo $script;
	}
?>
<noscript>How have you even managed to not have Java script???</noscript>
<div id='recipeCards'>
<?php
	include_once "inc/class.recipeFetch.inc.php";
	include_once "scripts/recipeCard.php";
	$worker = new recipeFetcher($db);
	$recipeInfo = $worker->fetchHomeRecipes();
	if ($recipeInfo == False) {
		echo "<h1 class='noResults'>No results!</h1>";
	}
	foreach ($recipeInfo as $row) {
		include "recipeCard/card.php";
	}
?>
</div>
<div id='backgroundBlur' class='invisible'></div>
<?php
	include_once "common/footer.php";
?>
