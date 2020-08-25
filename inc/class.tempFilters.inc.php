<?php
	class FilterManager {

		public function applyTempFilters() {
			
			// Gather posted data

			$vgt = 0;
			$vgn = 0;

			if (isset($_POST['vgt'])) {
				$vgt = 1;
			}
			if (isset($_POST['vgn'])) {
				$vgn = 1;
			}

			$alrg = array();
			foreach(ALRG_TYPES as $type) {
				$temp = 0;
				if (isset($_POST[$type])) {
					$temp = 1;
				}
				array_push($alrg, $temp);
			}

			// Create JSON reflecting this data

			$json  = "{\"vgt\" : \"" . $vgt . "\", ";
			$json .= "\"vgn\" : \"" . $vgn . "\", ";
			$json .= "\"alrg\" : {";
			for ($i = 0; $i < sizeof(ALRG_TYPES); $i++) {
				$json .= "\"" . ALRG_TYPES[$i] . "\" : ";
				$json .= "\"" . $alrg[$i] . "\"";
				if ($i != sizeof(ALRG_TYPES)-1) {
					$json .= ", ";
				} else {
					$json .= "}}";
				}
			}

			// Update $_SESSION

			$_SESSION['filters'] = $json;
			if (isset($_SESSION['filters'])) {
				return True;
			} else {
				return False;
			}
		}
	}
?>
