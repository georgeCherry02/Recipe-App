<script>
	function populateTempFilter() {
		var tempFiltDataLoc = document.getElementById('tempFilterData');
		
		// Sort out diets
		
		var dietLoc = document.getElementById('dietWrapper');
		var tempFiltData = false;
		var vgt = 0;
		var vgn = 0;
		if (tempFiltDataLoc.innerHTML != "") {
			var tempFiltData = JSON.parse(tempFiltDataLoc.innerHTML);
			vgt = tempFiltData.vgt;
			vgn = tempFiltData.vgn;
		}
		var html = createDietHtml(vgt, vgn);
		dietLoc.innerHTML = html;

		// Sort out common allergies
		
		var alrgLoc = document.getElementById('alrgWrapper');
		html = createAlrgHtml(tempFiltData);
		alrgLoc.innerHTML = html;

		var form = document.getElementById('tempFilter');
		html = form.innerHTML + "<input type='submit' name='subTempFilt' id='subTempFilt'>";
		form.innerHTML = html;
	}

	function createDietHtml(vgt, vgn) {
		var html = "<h2>Diet:</h2>";
		for (i = 0; i <= 1; i++) {
			if (i == 0) {
				var type = 'vgt';
				var val = vgt;
			} else {
				var type = 'vgn';
				var val = vgn;
			}
			html += "<label for='" + type + "'>";
			switch (type) {
			case "vgt":
				html += "Vegetarian";
				break;
			case "vgn":
				html += "Vegan";
				break;
			}
			html += ": </label>";
			html += "<input type='checkbox' name='" + type + "' id = '" + type + "'";
			if (val == 1) {
				html += " checked";
			}
			html += ">";
		}
		return html;
	}

	function createAlrgHtml(data) {
		var html = "<h2>Allergies You Have:</h2>";
		var alrgData = data['alrg'];
		types.forEach( function(type) {
			if (type == "Soy" || type == "Lactose") {
				html += "<div class='alrgWrapper'>";
			}
			html += "<label for'" + type + "Check'>" + type + ": </label>";
			html += "<input type='checkbox' name='" + type + "' id='" + type + "Check'";
			if (data != false) {
				var val = alrgData[type];
				if (val == 1) {
					html += " checked";
				}
			}
			html += "><br>";
			if (type == "Nuts" || type == "Shellfish") {
				html += "</div>";
			}
		});
		return html;
	}
</script>
