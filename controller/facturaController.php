<?php
    class FacturaController {
        private $factura;

        //DEFAULT CONSTRUCTOR
        public function __construct(){
            $this->factura = "";
        }

        //SETTERS
        public function setFactura($factura){
            $this->factura = $factura;
        }

        //GETTERS
        public function getFactura(){
            return $this->factura;
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
