<?php
	$root = true;
	include_once "common/base.php";
	include_once "common/header.php";
	include_once "pageComponents/tempFilters.php";
	include_once "common/sidebar.php";
	$searchType = $_POST['searchType'];
	$search = $_POST['search'];
?>
<div id='recipeCards'>
<?php
	include_once "inc/class.recipeFetch.inc.php";
	include_once "scripts/recipeCard.php";
	$worker = new RecipeFetcher($db);
	$recipeInfo = $worker->fetchSearch($searchType, $search);
	if ($recipeInfo == False) {
		echo "<h1 class='noResults'>No Results!</h1>";
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
