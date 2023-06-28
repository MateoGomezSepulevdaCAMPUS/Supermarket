<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/db.php");
require_once("../Config/Conectar.php");

class Factura extends Conectar{
    private $id_factura;
    private $id_empelado;
    private $id_cliente;
    private $fecha;

    public function __construct($id_factura=0, $id_empelado=0, $id_cliente=0, $fecha="", $dbCnx="" ){
        $this->id_factura = $id_factura;
        $this->id_empelado = $id_empelado;
        $this->descripccion = $descripccion;
        $this->imagen = $imagen;
        parent:: __construct($dbCnx);
    }

    public function setIdFactura($id_factura){
        $this->id_factura = $id_factura;
    }
    public function getId(){
        return $this->id_factura;
    }
    public function setIdEmpleado($id_empelado){
        $this->id_empelado = $id_empelado;
    }
    public function getEmpleado(){
        return $this->id_empelado;
    }
    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }
    public function getIdCliente(){
        return $this->id_cliente;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }


    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO Facturas (fecha) VALUES (?)");
            $stm -> execute([$this->fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx ->prepare("SELECT * FROM Facturas");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this-> dbCnx ->prepare("DELETE FROM Facturas WHERE id_factura=?");
            $stm -> execute([$this->id_factura]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro Eliminado');document.location='Facturas.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>