<?php
	class RecipeFetcher {

		private $_db;

		public function __construct($db) {
			$this->_db = $db;
		}

		public function fetchHomeRecipes() {

			//Create basic search
			
			$sql = "SELECT * FROM `recipes` "
			     . "WHERE ID IS NOT NULL ";

			// Add filters

			$sql = $this->addFiltersToStmt($sql);

			// Limit search and order results

			$sql .= "ORDER BY Rating "
			      . "DESC "
			      . "LIMIT 10";

			// Execute search

			try {
				$stmt = $this->_db->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchAll();
				$stmt->closeCursor();
				return $result;
			} catch (PDOException $e) {
				return False;
			}
		}

		public function fetchSearch($type, $search) {

			// Create the basic search

			$nSearch = "%".$search."%";

			switch($type) {
			case "name":
				$sql = "SELECT * FROM `recipes` "
				     . "WHERE Name LIKE :search ";
				break;
			case "ingredient":
				$sql = "SELECT * FROM `recipes` "
				     . "WHERE Ingredients LIKE :search ";
				break;
			}

			// Add filters
			
			$sql = $this->addFiltersToStmt($sql);

			// Limit search
			
			$sql .= "LIMIT 10";

			// Execute search

			try {
				$stmt = $this->_db->prepare($sql);
				$stmt->bindParam(":search", $nSearch, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll();
				$stmt->closeCursor();
				return $result;
			} catch (PDOException $e) {
				return False;
			}
		}

		private function addFiltersToStmt($sql) {

			// Add account filters

			if ($this->checkLogged()) {
				$accountFilters = $this->fetchAccountFilters($_SESSION['userID']);
				$sql = $this->addFilters($sql, $accountFilters);
			}

			// Add session filters

			if (isset($_SESSION['filters'])) {
				$tempFilters = $_SESSION['filters'];
				$fixedTempFilters = $this->jsonToArray($tempFilters);
				$sql = $this->addFilters($sql, $fixedTempFilters);
			}

			return $sql;
		}

		private function fetchAccountFilters($id) {

			$sql = "SELECT * FROM `users` "
			     . "WHERE UserID=:id";

			try {
				$stmt = $this->_db->prepare($sql);
				$stmt->bindParam(":id", $id, PDO::PARAM_STR);
				$stmt->execute();
				$filters = $stmt->fetch();
				$stmt->closeCursor();
			} catch (PDOException $e) {
				return False;
			}

			$filter = $filters['AccountFilters'];
			return $this->jsonToArray($filter);
		}

		private function addFilters($sql, $accountFilters) {
			if ($accountFilters[0]==1) {
				$sql .= "AND Vegetarian=0 ";
			}
			if ($accountFilters[1]==1) {
				$sql .= "AND Vegan=0 ";
			}
			$count = 0;
			foreach (ALRG_TYPES as $type) {
				$alrg = $accountFilters[2][$count];
				if ($alrg == 1) {
					$sql .= "AND FreeFrom LIKE '%" . $type . "%' ";
				}
				$count++;
			}
			return $sql;
		}

		private function checkLogged() {
			return (isset($_SESSION['UserID']) && $_SESSION['LoggedIn'] == 1);
		}

		private function jsonToArray($filters) {
			$decFilters = json_decode($filters);
			$vgt = $decFilters->{'vgt'};
			$vgn = $decFilters->{'vgn'};
			$alrgClass = $decFilters->{'alrg'};
			$alrg = array();
			foreach (ALRG_TYPES as $type) {
				$temp = $alrgClass->{$type};
				array_push($alrg, $temp);
			}
			return array($vgt, $vgn, $alrg);
		}
	}
?>
