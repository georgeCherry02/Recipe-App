<?php
	class User {

		private $_db;

		public function __construct($db) {
			$this->_db = $db;
		}

		public function accountLogin() {
			$user = $_POST['username'];
			$password = sha1($_POST['password']);

			$sql = "SELECT Username "
				 . "FROM `users` "
				 . "WHERE Username=:user "
				 . "AND Password=:pass "
				 . "LIMIT 1";

			try {
				$stmt = $this->_db->prepare($sql);
				$stmt->bindParam(":user", $user, PDO::PARAM_STR);
				$stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
				$stmt->execute();
				if ($stmt->rowCount() === 1) {
					$_SESSION['LoggedIn'] = 1;
					return true;
				} else {
					return false;
				}
			} catch (PDOException $e) {
				return false;
			}
		}

		public function fetchAccountFilters() {
			$id = $_SESSION['userID'];

			$sql = "SELECT :column FROM `users`"
			     . "WHERE UserID=:id";

			try {
				$stmt = $this->_db->prepare($sql);
				$stmt->bindParam(":column", 'AccountFilters', PDO::PARAM_STR);
				$stmt->bindParam(":id", $id, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch();
				$stmt->closeCursor();
			} catch (PDOException $e) {
				return False;
			}

			return $result;
		}
	}
?>
