<?php
	class MantenimientoDAO {

		public static function getUser($login){
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();
			$sql = "SELECT * FROM mantenimiento WHERE login = '$login';";
			$result = $bbdd->consult($sql);
			$user = new User();

			if($bbdd->numRows($result) > 0){
				$row = $bbdd->fetch($result);
				$user->setLogin($row["login"]);
				$user->setName($row["name"]);
				$user->setSurname($row["surname"]);
				$user->setDepartment($row["department"]);
				$user->setRole($row["role"]);
				$user->setEmail($row["email"]);
			}

			return $user;
		}

		public static function getFactura(){
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();

			$sql = "SELECT * FROM mantenimiento;";

			$result = $bbdd->consult($sql);
			return $result;
		}

		public static function getBill($id){
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();

			$sql = "SELECT * FROM mantenimiento WHERE id = '$id';";

			$result = $bbdd->consult($sql);

			$row = $bbdd->fetch($result);

			return $row;
		}

		public function checkLogin(){
			$valid = false;
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();
			$sql = "SELECT * FROM users WHERE BINARY login = '" . $this->user->getLogin() . "' AND BINARY pass = '" . sha1($this->user->getPass()) . "';";
			$result = $bbdd->consult($sql);

			if($bbdd->numRows($result) > 0){
				$valid = true;
			}

			return $valid;
		}

		public function insertFactura($cif, $nombre, $direccion, $importe, $iva, $total, $cobro){
			$valid = false;
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();
			$sql = "INSERT INTO mantenimiento (cif, nombre, direccion, importe, iva, total, cobro) VALUES ('$cif', '$nombre', '$direccion', '$importe', '$iva', '$total', '$cobro')";

			$result = $bbdd->consult($sql);

			if($sql){
				$valid = true;
			}

			return $valid;
		}

		public function delete($id){
			$valid = false;
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();
			$sql = "DELETE FROM mantenimiento WHERE id = '$id'";

			$result = $bbdd->consult($sql);

			if($sql){
				$valid = true;
			}

			return $valid;
		}

		public function updateUser($login, $pass, $name, $surname, $department, $role, $email){
			$valid = false;
			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();
			$sql = "UPDATE users SET pass = '" . sha1($pass) . "', name = '$name', surname = '$surname', department = '$department', role = '$role', email = '$email' WHERE login = '$login';";

			$result = $bbdd->consult($sql);

			if($sql){
				$valid = true;
			}

			return $valid;
		}

		public function checkDuplicates($login, $email){
			$valids = array(false, false);

			$bbdd = DB::getInstance();
			$bbdd->stablishUTF8();
			$sql = "SELECT login FROM users WHERE login = '$login'";
			$sql2 = "SELECT email FROM users WHERE email = '$email'";

			$result = $bbdd->consult($sql);
			$result2 = $bbdd->consult($sql2);

			if($bbdd->numRows($result) > 0){
				$valids[0] = true;
			} elseif($bbdd->numRows($result2) > 0){
				$valids[1] = true;
			}

			return $valids;
		}
	}
?>
