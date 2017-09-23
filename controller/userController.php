<?php
	class UserController {
		private $user;

		public function __construct($user){
			$this->user = $user;
		}

		public function leerDatosLogin($login, $pass){
			$this->usuario->setLogin($login);
			$this->usuario->setPass($pass);
		}

		public function leerDatosCompletos($nif, $nombre, $apellidos, $telefono, $direccion, $correo){
			$this->usuario->setNif($nif);
			$this->usuario->setNombre($nombre);
			$this->usuario->setApellidos($apellidos);
			$this->usuario->setTelefono($telefono);
			$this->usuario->setDireccion($direccion);
			$this->usuario->setCorreo($correo);
		}
	}
?>
