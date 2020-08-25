<script>
	function revealIngredients(recID) {
		var card = document.getElementById('recipeCard' + recID);
		var ingDataLoc = document.getElementById('ingredientsData' + recID);
		var ingData = JSON.parse(ingDataLoc.innerHTML);
		populateIngredients(recID, ingData);
		showIngredients(recID);
	}	

	function revealRecipe(recID) {
		var card = document.getElementById('fullCard' + recID);
		var infoTypes = ['utensils', 'steps', 'alrg'];
		var recipeData = gatherRecipeData(recID, infoTypes);
		if (!card.classList.contains('informed')) {
			fillOutRecipeCard(recID, infoTypes, recipeData);
		}
		card.classList.toggle('invisible');
		fixContinuity(recID);
	}

	function populateIngredients(recID, ingredientsList) {
		var ingDisp = document.getElementById('ingredientsDisplay' + recID);
		var recList = "<h2>Ingredients:</h2><ul class='ingredientsList'>";
		for (i = 0; i < ingredientsList.length; i++) {
			recList += "<ol>" + ingredientsList[i] + "</ol>";
		}
		recList += "</ul>";
		ingDisp.innerHTML = recList;
	}

	function showIngredients(recID) {
		var card = document.getElementById('initialCard' + recID);
		var cc = card.childNodes;
		for (i = 1; i < cc.length; i += 2) {
			cc[i].classList.toggle("invisible");
			if (i == 7 || i == 9 || i == 11) {
				cc[i].classList.toggle("container");
			}
		}
		card.classList.toggle("textAlign");
	}

	function gatherRecipeData(recID, infoTypes) {
		var data = [];
		for (i = 0; i < infoTypes.length; i++) {
			var temp = infoTypes[i] + "Data" + recID;
			var tempData = document.getElementById(temp);
			var jsonData = JSON.parse(tempData.innerHTML);
			data.push(jsonData);
		}
		return data;
	}

	function fillOutRecipeCard(recID, infoTypes, data) {
		for (i = 0; i < infoTypes.length; i++) {
			var type = infoTypes[i];
			var id = type + "Display" + recID;
			var elem = document.getElementById(id);
			var initHTML = elem.innerHTML;
			var html = initHTML + "<ul class='" + type + "List'>";
			if (type != 'alrg') {
				for (j = 0; j < data[i].length; j++) {
					html += "<ol>" + data[i][j] + "</ol>";
				}
			} else {
				var alrgCount = 0;
				for (j = 0; j < data[i].length; j++) {
					var currentAlrg = data[i][j];
					if (currentAlrg != "") {
						if (alrgCount == 4) {
							html += "</ul><ul class='" + type + "List'>";
						}
						html += "<ol>" + currentAlrg + "</ol>";
						alrgCount++;
					}
				}
			}
			html += "</ul>";
			elem.innerHTML = html;
		}
		var card = document.getElementById('fullCard' + recID);
		card.classList.toggle("informed");
	}

	function fixContinuity(id) {
		var topCard = document.getElementById('initialCard' + id);
		var cardBlur = document.getElementById('cardBlur' + id);
		topCard.classList.toggle('borderCont');
		cardBlur.classList.toggle('borderCont');
	}
</script>
