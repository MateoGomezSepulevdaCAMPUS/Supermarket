<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/db.php");
require_once("../Config/Conectar.php");

class Empleados extends Conectar{
    private $id_empleado;
    private $nombre;
    private $celular;
    private $direccion;
    private $imagen;

    public function __construct($id_empleado=0, $nombre="", $celular="", $direccion="", $imagen="", $dbCnx=""){
        $this->id_empleado = $id_empleado;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->imagen = $imagen;
        parent:: __construct($dbCnx);
    }

    public function setId($id_empleado){
        $this->id_empleado = $id_empleado;
    }
    public function getId(){
        return $this->id_empleado;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setCelular($celular){
        $this->celular = $celular;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
    public function getImagen(){
        return $this->imagen;
    }

    public function insertData(){
        try {
            $stm  = $this -> dbCnx ->prepare("INSERT INTO Empleados(nombre,celular, direccion, imagen) VALUES (?,?,?,?)");
            $stm -> execute([$this->nombre, $this->celular, $this->direccion, $this->imagen]);
            return $stm ->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx ->prepare("SELECT * FROM Empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(){
        try {
            $stm = $this-> dbCnx ->prepare("DELETE FROM Empleados WHERE id_empleado=?");
            $stm -> execute([$this->id_empleado]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro Eliminado');document.location='Empleados.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    


}
?>