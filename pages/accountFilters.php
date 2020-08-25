<?php
	include_once "../common/base.php";
	$pageTitle = "Filters";
	include_once "common/basicHeader.php";
	if (isset($_session['LoggedIn']) && $_SESSION['LoggedIn'] == 1) {
		include_once "inc/class.user.inc.php";
		$user = new User($db);
		$filters = $user->fetchAccountFilters();
?>
<h1 class='title'>Update your account filters!</h1>
<div id='accountFiltWrapper'>
	<form method='POST' action='../db-interaction/filters.php' id='addAccountFilters'>
	</form>
	<div class='data' id='accountFilterData'><?php echo $filters; ?></div>
	<div class='data' id='userID'><?php echo $_SESSION['userID']; ?></div>
</div>
<?php include_once "../scripts/accFilters.php"; ?>
<script></script>
<?php
	} else {
		include_once "../pageComponents/loginMessage.php";
	}
	include_once "../common/footer.php";
?>
