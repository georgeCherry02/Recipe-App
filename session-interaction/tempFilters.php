<?php
	include_once "../inc/constants.inc.php";
	include_once "../common/base.php";
	include_once "../inc/class.tempFilters.inc.php";
	$filterManager = new FilterManager();

	if (!empty($_POST)) {
		$status = $filterManager->applyTempFilters() ? "applied" : "failed";
		header("Location: ../main.php?filters=$status");
	} else {
		exit;
	}
?>
