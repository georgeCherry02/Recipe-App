<?php $id = $row['ID']; ?>
<div class='recipeCard' id='recipeCard<?php echo $id ?>'>
	<?php
		include "recipeCard/initialCard.php";
		include "recipeCard/data.php";
		include "recipeCard/fullCard.php";
	?>
</div>
