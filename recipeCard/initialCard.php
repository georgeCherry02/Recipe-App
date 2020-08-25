<div class="initialCard" id="initialCard<?php echo $id ?>">
	<div class="vgtSign <?php if ($row['Vegetarian'] == Null) { echo "permInvisible"; }?>"></div>
	<div class='vgnSign <?php if($row['Vegan'] == Null) { echo "permInvisible"; }?>'></div>
	<a onclick='revealIngredients(<?php echo $id ?>)' class='revealIngredientsButton'></a>
	<div class='recipeName container' onclick='revealRecipe(<?php echo $id ?>)'>
		<h2 class='actual'><?php echo $row['Name'] ?></h2>
	</div>
	<div class='time'>
		Time:<br>
<?php
	$time = $row['Time'];
	$jTime = json_decode($time);
	$amount = $jTime->{'amount'};
	$unit = $jTime->{'unit'};
	if ($amount > 1) {
		$unit .= "s";
	}
	$res = $amount . " " . $unit;
	echo $res;
?>
	</div>		
	<div class='servings'>
		Serves:<br>
		<?php echo $row['ServingSize']; ?>
	</div>
	<a onclick='revealIngredients(<?php echo $id ?>)' class='backButton invisible'></a>
	<div class='ingredientsDisplay invisible' id='ingredientsDisplay<?php echo $id ?>'></div>
	<div class='cardBlur invisible' id='cardBlur<?php echo $id ?>'></div>
</div>
