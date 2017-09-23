<?php
    class FacturaController {
        private $factura;
        private $mantenimiento;

        //DEFAULT CONSTRUCTOR
        public function __construct(){
            $this->factura = "";
            $this->mantenimiento = "";
        }

        //SETTERS
        public function setFactura($factura){
            $this->factura = $factura;
        }
        public function setMantenimiento($mantenimiento){
            $this->mantenimiento = $mantenimiento;
        }

        //GETTERS
        public function getFactura(){
            return $this->factura;
        }
        public function getMantenimiento(){
            return $this->mantenimiento;
        }

        //FUNCTIONS
        public function readComplete($cif, $nombre, $direccion, $importe, $iva, $total, $cobro){
			$this->factura->setCif($cif);
			$this->factura->setNombre($nombre);
			$this->factura->setDireccion($direccion);
			$this->factura->setImporte($iporte);
			$this->factura->setIva($iva);
			$this->factura->setTotal($total);
			$this->factura->setCobro($cobro);
		}
    }
?>
