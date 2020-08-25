<div id='sidebar' class='invisible'>
	<div class='row'>
		<a onclick='showSidebar()' class='button back'></a>
	</div>
	<div class='sidebarWrapper'>
		<h2 class='sidebarTitle'>More...</h2>
		<ul class='textAlign vertAlign'>
			<ol><a href='pages/accountFilters.php'>Account Filters</a></ol>
			<ol><a href='pages/createRecipe.php'>Create your own recipe</a></ol>
			<ol style='display: none;'><a href='pages/settings.php'>Settings</a></ol>
			<?php if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == 1) { ?>
			<ol><a href='pages/account.php'>Account Details</a></ol>
			<ol><a href='pages/logout.php'>Log out</a></ol>
			<?php } else { ?>
			<ol><a href='pages/login.php'>Log in</a></ol>
			<ol><a href='pages/signup.php'>Sign up!</a></ol>
			<?php } ?>
			<ol><a href='pages/about.php'>About</a></ol>
			<ol style='display: none;'><a href='pages/contact.php'>Get in touch!</a></ol>
		</ul>
	</div>
</div>
