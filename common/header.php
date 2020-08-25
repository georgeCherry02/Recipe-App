<!DOCTYPE html>
<html>
	<head>
		<title>Recipe Website</title>
		<!--Style sheets-->
		<link rel='stylesheet' href='css/main.css' type='text/css'/>
		<link rel='stylesheet' href='css/recipeCard.css' type='text/css'/>
		<!--Favicon-->
		<link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'/>
		<!--Include JS constants-->
		<?php include_once "scripts/jsConstants.php"; ?>
	</head>
	<body>
		<div id='pageWrap'>
			<div id='header'>
				<?php include_once "scripts/navbar.php"; ?>
				<a onclick="showSidebar()" class='button more'></a>
				<a onclick="showFilters()" class='button filter'></a>
				<form method='POST' action='search.php'>
					<select name='searchType' class='dropDown'>
						<option value='name'>Recipe Name</option>
						<option value='ingredient'>Ingredient</option>
					</select>
					<input type='text' name='search' class='searchBar'>
					<input type='submit' class='button search'>
				</form>
				<?php if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == 1) { ?>
				<a onclick='toggleFavourites()' class='button favourite'></a>
				<?php } else { ?>
				<a href='pages/login.php' class='button logIn'></a>
				<?php } ?>
			</div>
